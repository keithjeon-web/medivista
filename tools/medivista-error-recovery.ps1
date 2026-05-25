param(
  [switch]$StartPreview,
  [switch]$RebuildWordPressZip,
  [switch]$PushDeploy,
  [string]$ReportPath = "docs/error-report-latest.md"
)

$ErrorActionPreference = "Continue"
$Root = Resolve-Path (Join-Path $PSScriptRoot "..")
$DeployRoot = Join-Path $Root ".deploy-medivista-github"
$ReportFullPath = Join-Path $Root $ReportPath
$PreviewUrl = "http://127.0.0.1:4173/index.html"
$PublicBaseUrl = "https://keithjeon-web.github.io/medivista/"
$WpZip = Join-Path $Root "dist/medivista-wp-theme-starter-20260511-wp.zip"
$WpShopZip = Join-Path $Root "dist/medivista-wp-theme-shop-20260522-wp.zip"
$WpNetworkThemesZip = Join-Path $Root "dist/medivista-wp-network-themes-20260525.zip"
$WpPagesXml = Join-Path $Root "dist/medivista-wp-pages-20260511.xml"
$GitExe = "C:\Program Files\Git\cmd\git.exe"

$results = New-Object System.Collections.Generic.List[object]

function Add-Result {
  param(
    [string]$Id,
    [string]$Name,
    [string]$Status,
    [string]$Finding,
    [string]$Action,
    [string]$Next
  )
  $results.Add([pscustomobject]@{
    Id = $Id
    Name = $Name
    Status = $Status
    Finding = $Finding
    Action = $Action
    Next = $Next
  }) | Out-Null
}

function Test-HttpOk {
  param([string]$Url)
  try {
    $response = Invoke-WebRequest -Uri $Url -UseBasicParsing -TimeoutSec 8
    return [pscustomobject]@{ Ok = ($response.StatusCode -ge 200 -and $response.StatusCode -lt 400); StatusCode = $response.StatusCode; Error = "" }
  }
  catch {
    return [pscustomobject]@{ Ok = $false; StatusCode = ""; Error = $_.Exception.Message }
  }
}

function Get-CacheBustToken {
  param([string]$HtmlPath)
  try {
    if (-not (Test-Path -LiteralPath $HtmlPath)) { return "" }
    $html = Get-Content -LiteralPath $HtmlPath -Raw
    $m = [regex]::Match($html, '\b(?:styles\.css|main\.js)\?v=([0-9]{8}[a-z])\b', 'IgnoreCase')
    if ($m.Success) { return $m.Groups[1].Value }
    return ""
  }
  catch {
    return ""
  }
}

function Test-ZipContains {
  param([string]$ZipPath, [string[]]$Required)
  if (-not (Test-Path -LiteralPath $ZipPath)) {
    return [pscustomobject]@{ Ok = $false; Missing = @("zip file missing") }
  }
  Add-Type -AssemblyName System.IO.Compression.FileSystem
  $zip = [System.IO.Compression.ZipFile]::OpenRead($ZipPath)
  try {
    $names = $zip.Entries | Select-Object -ExpandProperty FullName
  }
  finally {
    $zip.Dispose()
  }
  $missing = @()
  foreach ($requiredPath in $Required) {
    if ($names -notcontains $requiredPath) {
      $missing += $requiredPath
    }
  }
  return [pscustomobject]@{ Ok = ($missing.Count -eq 0); Missing = $missing }
}

function Rebuild-WordPressZip {
  $source = Resolve-Path (Join-Path $Root "wp-theme-starter")
  $dist = Join-Path $Root "dist"
  if (-not (Test-Path -LiteralPath $dist)) {
    New-Item -ItemType Directory -Path $dist | Out-Null
  }
  Add-Type -AssemblyName System.IO.Compression
  Add-Type -AssemblyName System.IO.Compression.FileSystem
  if (Test-Path -LiteralPath $WpZip) {
    Remove-Item -LiteralPath $WpZip -Force
  }
  $zip = [System.IO.Compression.ZipFile]::Open($WpZip, [System.IO.Compression.ZipArchiveMode]::Create)
  try {
    Get-ChildItem -LiteralPath $source -Recurse -File | ForEach-Object {
      $relative = $_.FullName.Substring($source.Path.Length + 1).Replace("\", "/")
      $entryName = "wp-theme-starter/" + $relative
      [System.IO.Compression.ZipFileExtensions]::CreateEntryFromFile($zip, $_.FullName, $entryName, [System.IO.Compression.CompressionLevel]::Optimal) | Out-Null
    }
  }
  finally {
    $zip.Dispose()
  }
}

function Rebuild-WordPressShopZip {
  $sourcePath = Join-Path $Root "wp-theme-shop"
  if (-not (Test-Path -LiteralPath $sourcePath)) {
    return
  }
  $source = Resolve-Path $sourcePath
  $dist = Join-Path $Root "dist"
  if (-not (Test-Path -LiteralPath $dist)) {
    New-Item -ItemType Directory -Path $dist | Out-Null
  }
  Add-Type -AssemblyName System.IO.Compression
  Add-Type -AssemblyName System.IO.Compression.FileSystem
  if (Test-Path -LiteralPath $WpShopZip) {
    Remove-Item -LiteralPath $WpShopZip -Force
  }
  $zip = [System.IO.Compression.ZipFile]::Open($WpShopZip, [System.IO.Compression.ZipArchiveMode]::Create)
  try {
    Get-ChildItem -LiteralPath $source -Recurse -File | ForEach-Object {
      $relative = $_.FullName.Substring($source.Path.Length + 1).Replace("\", "/")
      $entryName = "wp-theme-shop/" + $relative
      [System.IO.Compression.ZipFileExtensions]::CreateEntryFromFile($zip, $_.FullName, $entryName, [System.IO.Compression.CompressionLevel]::Optimal) | Out-Null
    }
  }
  finally {
    $zip.Dispose()
  }
}

function Add-ThemeFolderToZip {
  param(
    [System.IO.Compression.ZipArchive]$Zip,
    [string]$SourceFolder,
    [string]$ThemeFolderName
  )
  if (-not (Test-Path -LiteralPath $SourceFolder)) {
    return
  }
  $source = Resolve-Path $SourceFolder
  Get-ChildItem -LiteralPath $source -Recurse -File | ForEach-Object {
    $relative = $_.FullName.Substring($source.Path.Length + 1).Replace("\", "/")
    $entryName = "$ThemeFolderName/" + $relative
    [System.IO.Compression.ZipFileExtensions]::CreateEntryFromFile($Zip, $_.FullName, $entryName, [System.IO.Compression.CompressionLevel]::Optimal) | Out-Null
  }
}

function Rebuild-WordPressNetworkThemesZip {
  $dist = Join-Path $Root "dist"
  if (-not (Test-Path -LiteralPath $dist)) {
    New-Item -ItemType Directory -Path $dist | Out-Null
  }
  Add-Type -AssemblyName System.IO.Compression
  Add-Type -AssemblyName System.IO.Compression.FileSystem
  if (Test-Path -LiteralPath $WpNetworkThemesZip) {
    Remove-Item -LiteralPath $WpNetworkThemesZip -Force
  }
  $zip = [System.IO.Compression.ZipFile]::Open($WpNetworkThemesZip, [System.IO.Compression.ZipArchiveMode]::Create)
  try {
    Add-ThemeFolderToZip -Zip $zip -SourceFolder (Join-Path $Root "wp-theme-starter") -ThemeFolderName "wp-theme-starter"
    Add-ThemeFolderToZip -Zip $zip -SourceFolder (Join-Path $Root "wp-theme-shop") -ThemeFolderName "wp-theme-shop"
  }
  finally {
    $zip.Dispose()
  }
}

function Start-PreviewIfNeeded {
  $preview = Test-HttpOk $PreviewUrl
  if ($preview.Ok) {
    return [pscustomobject]@{ Started = $false; Ok = $true; Detail = "Preview already responding with HTTP $($preview.StatusCode)." }
  }

  if (-not $StartPreview) {
    return [pscustomobject]@{ Started = $false; Ok = $false; Detail = "Preview not responding. StartPreview was not requested. $($preview.Error)" }
  }

  $node = Get-Command node -ErrorAction SilentlyContinue
  if (-not $node) {
    return [pscustomobject]@{ Started = $false; Ok = $false; Detail = "Node is not available, so local preview server cannot be started." }
  }

  $outLog = Join-Path $Root "docs/preview-server.out.log"
  $errLog = Join-Path $Root "docs/preview-server.err.log"
  $serverScript = Join-Path $Root "tools/local-static-server.mjs"

  function Start-PreviewViaWmi {
    param([string]$WorkingDirectory, [string]$NodeExe, [string]$ScriptFile, [string]$StdoutFile, [string]$StderrFile)

    $escapedWorkDir = $WorkingDirectory.Replace('"', '""')
    $escapedNode = $NodeExe.Replace('"', '""')
    $escapedScript = $ScriptFile.Replace('"', '""')
    $escapedOut = $StdoutFile.Replace('"', '""')
    $escapedErr = $StderrFile.Replace('"', '""')

    # Use WMI to spawn a detached process without Start-Process (which can fail with duplicate PATH/Path keys).
    $cmd = "cmd.exe /d /s /c ""cd /d """"$escapedWorkDir"""" && """"$escapedNode"""" """"$escapedScript"""" 1>>""""$escapedOut"""" 2>>""""$escapedErr"""""""
    $processClass = Get-CimClass -ClassName Win32_Process -ErrorAction Stop
    $result = Invoke-CimMethod -CimClass $processClass -MethodName Create -Arguments @{ CommandLine = $cmd } -ErrorAction Stop
    if ($result.ReturnValue -ne 0) {
      throw "WMI process start failed with ReturnValue=$($result.ReturnValue)"
    }
    return [int]$result.ProcessId
  }
  try {
    $existingJob = Get-Job -Name "medivista-preview-server" -ErrorAction SilentlyContinue
    if ($existingJob) {
      if ($existingJob.State -eq "Running") {
        Start-Sleep -Seconds 1
        $stillRunning = Test-HttpOk $PreviewUrl
        if ($stillRunning.Ok) {
          return [pscustomobject]@{ Started = $false; Ok = $true; Detail = "Preview job already running and confirmed HTTP $($stillRunning.StatusCode)." }
        }
      }

      try {
        Remove-Job -Job $existingJob -Force -ErrorAction SilentlyContinue
      }
      catch {
        $_.Exception.Message | Out-File -FilePath $errLog -Append -Encoding utf8
      }
    }

    $startedMode = ""
    try {
      # Prefer a detached process so the preview can remain available after this script exits.
      # Fall back to WMI process creation because Start-Process can fail with duplicate PATH/Path keys in some environments.
      $pid = Start-PreviewViaWmi -WorkingDirectory $Root -NodeExe $node.Source -ScriptFile $serverScript -StdoutFile $outLog -StderrFile $errLog
      $pid | Out-File -FilePath (Join-Path $Root "docs/preview-server.pid") -Encoding ascii -Force
      $startedMode = "process:$pid"
    }
    catch {
      ("Preview persistent start failed: " + $_.Exception.Message) | Out-File -FilePath $errLog -Append -Encoding utf8
      # WMI process start can be blocked in some environments.
      # Fall back to a background job for an in-script HTTP availability check (it will not persist after this PowerShell process exits).
      Start-Job -Name "medivista-preview-server" -ScriptBlock {
        param($nodeExe, $workingDirectory, $scriptFile, $stdoutFile, $stderrFile)
        Set-Location $workingDirectory
        try {
          & $nodeExe $scriptFile 1>> $stdoutFile 2>> $stderrFile
        }
        catch {
          $_.Exception.Message | Out-File -FilePath $stderrFile -Append -Encoding utf8
        }
      } -ArgumentList $node.Source, $Root, $serverScript, $outLog, $errLog | Out-Null
      $startedMode = "job"
    }
  }
  catch {
    $_.Exception.Message | Out-File -FilePath $errLog -Append -Encoding utf8
  }
  Start-Sleep -Seconds 2
  $after = Test-HttpOk $PreviewUrl
  $prefix = if ($after.Ok) {
    if ($startedMode -eq "job") { "Started preview job and confirmed HTTP $($after.StatusCode) (note: job does not persist after this PowerShell process exits)." }
    else { "Started preview process ($startedMode) and confirmed HTTP $($after.StatusCode)." }
  } else {
    "Start attempted, but preview still failed. $($after.Error)"
  }
  return [pscustomobject]@{ Started = $true; Ok = $after.Ok; Detail = $prefix }
}

function Run-CommandCapture {
  param([string]$Command, [string[]]$Arguments, [string]$WorkingDirectory = $Root)
  try {
    $output = & $Command @Arguments 2>&1
    return [pscustomobject]@{ ExitCode = $LASTEXITCODE; Output = ($output -join "`n") }
  }
  catch {
    return [pscustomobject]@{ ExitCode = 1; Output = $_.Exception.Message }
  }
}

function Find-PhpExecutable {
  $pathPhp = Get-Command php -ErrorAction SilentlyContinue
  if ($pathPhp) {
    return $pathPhp.Source
  }

  $localPhp = Join-Path $Root "tools\php\php.exe"
  if (Test-Path -LiteralPath $localPhp) {
    return $localPhp
  }

  $portablePhp = Get-ChildItem -LiteralPath (Join-Path $Root "tools") -Recurse -File -Filter php.exe -ErrorAction SilentlyContinue |
    Select-Object -First 1
  if ($portablePhp) {
    return $portablePhp.FullName
  }

  return ""
}

function Test-PhpStructureFallback {
  param([string]$FilePath)

  $text = Get-Content -Raw -LiteralPath $FilePath
  $failures = @()
  if ($text -match '<<<<<<<|=======|>>>>>>>') {
    $failures += "merge conflict marker found"
  }

  if ($text -notmatch '<\?') {
    return $failures
  }

  $phpBlocks = [regex]::Matches($text, '(?s)<\?(?:php|=)?(.*?)(?:\?>|$)')
  $code = ($phpBlocks | ForEach-Object { $_.Groups[1].Value }) -join "`n"
  $stack = New-Object System.Collections.Generic.List[object]
  $line = 1
  $state = "code"
  for ($i = 0; $i -lt $code.Length; $i++) {
    $ch = $code[$i]
    $next = if ($i + 1 -lt $code.Length) { $code[$i + 1] } else { [char]0 }
    if ($ch -eq "`n") { $line++ }

    if ($state -eq "line-comment") {
      if ($ch -eq "`n") { $state = "code" }
      continue
    }
    if ($state -eq "block-comment") {
      if ($ch -eq "*" -and $next -eq "/") { $state = "code"; $i++ }
      continue
    }
    if ($state -eq "single-quote") {
      if ($ch -eq "\" -and $next -ne [char]0) { $i++; continue }
      if ($ch -eq "'") { $state = "code" }
      continue
    }
    if ($state -eq "double-quote") {
      if ($ch -eq "\" -and $next -ne [char]0) { $i++; continue }
      if ($ch -eq '"') { $state = "code" }
      continue
    }

    if ($ch -eq "/" -and $next -eq "/") { $state = "line-comment"; $i++; continue }
    if ($ch -eq "#") { $state = "line-comment"; continue }
    if ($ch -eq "/" -and $next -eq "*") { $state = "block-comment"; $i++; continue }
    if ($ch -eq "'") { $state = "single-quote"; continue }
    if ($ch -eq '"') { $state = "double-quote"; continue }

    if ($ch -eq "(" -or $ch -eq "[" -or $ch -eq "{") {
      $stack.Add([pscustomobject]@{ Char = [string]$ch; Line = $line }) | Out-Null
      continue
    }
    if ($ch -eq ")" -or $ch -eq "]" -or $ch -eq "}") {
      if ($stack.Count -eq 0) {
        $failures += "unmatched closing '$ch' on PHP lint line $line"
        continue
      }
      $open = $stack[$stack.Count - 1]
      $expected = switch ($open.Char) {
        "(" { ")" }
        "[" { "]" }
        "{" { "}" }
      }
      if ($expected -ne [string]$ch) {
        $failures += "mismatched '$($open.Char)' from PHP lint line $($open.Line) closed by '$ch' on PHP lint line $line"
      }
      $stack.RemoveAt($stack.Count - 1)
    }
  }

  if ($state -eq "single-quote" -or $state -eq "double-quote" -or $state -eq "block-comment") {
    $failures += "unterminated $state"
  }
  foreach ($open in $stack) {
    $failures += "unclosed '$($open.Char)' from PHP lint line $($open.Line)"
  }

  return $failures
}

if ($RebuildWordPressZip) {
  Rebuild-WordPressZip
  Rebuild-WordPressShopZip
  Rebuild-WordPressNetworkThemesZip
}

$node = Get-Command node -ErrorAction SilentlyContinue
if ($node) {
  $js = Run-CommandCapture $node.Source @("--check", "assets/js/main.js")
  $wpJs = Run-CommandCapture $node.Source @("--check", "wp-theme-starter/assets/js/main.js")
  $shopJs = Run-CommandCapture $node.Source @("--check", "wp-theme-shop/assets/js/shop.js")
  if ($js.ExitCode -eq 0 -and $wpJs.ExitCode -eq 0 -and $shopJs.ExitCode -eq 0) {
    Add-Result "1" "JS syntax baseline" "PASS" "Static, WordPress main, and WordPress shop JS syntax checks passed." "No code change required." "Continue regular checks."
  }
  else {
    Add-Result "1" "JS syntax baseline" "FAIL" "$($js.Output)`n$($wpJs.Output)`n$($shopJs.Output)" "Fix JS syntax before deployment." "Re-run this script."
  }
}
else {
  Add-Result "1" "JS syntax baseline" "WARN" "Node is not available." "Install/expose Node or run JS check in another environment." "Re-run this script after Node is available."
}

$php = Find-PhpExecutable
if ($php) {
  $phpFailures = @()
  Get-ChildItem -LiteralPath (Join-Path $Root "wp-theme-starter") -Recurse -Filter *.php | ForEach-Object {
    $lint = Run-CommandCapture $php @("-l", $_.FullName)
    if ($lint.ExitCode -ne 0) {
      $phpFailures += "$($_.FullName): $($lint.Output)"
    }
  }
  Get-ChildItem -LiteralPath (Join-Path $Root "wp-theme-shop") -Recurse -Filter *.php -ErrorAction SilentlyContinue | ForEach-Object {
    $lint = Run-CommandCapture $php @("-l", $_.FullName)
    if ($lint.ExitCode -ne 0) {
      $phpFailures += "$($_.FullName): $($lint.Output)"
    }
  }
  if ($phpFailures.Count -eq 0) {
    Add-Result "1" "WordPress PHP lint" "PASS" "All theme PHP files passed php -l." "No code change required." "Repeat after future PHP edits."
  }
  else {
    Add-Result "1" "WordPress PHP lint" "FAIL" ($phpFailures -join "`n") "Fix listed PHP syntax errors." "Re-run php lint."
  }
}
else {
  $phpFallbackFailures = @()
  Get-ChildItem -LiteralPath (Join-Path $Root "wp-theme-starter") -Recurse -Filter *.php | ForEach-Object {
    $fileFailures = Test-PhpStructureFallback $_.FullName
    if ($fileFailures.Count -gt 0) {
      $phpFallbackFailures += "$($_.FullName): $($fileFailures -join '; ')"
    }
  }
  Get-ChildItem -LiteralPath (Join-Path $Root "wp-theme-shop") -Recurse -Filter *.php -ErrorAction SilentlyContinue | ForEach-Object {
    $fileFailures = Test-PhpStructureFallback $_.FullName
    if ($fileFailures.Count -gt 0) {
      $phpFallbackFailures += "$($_.FullName): $($fileFailures -join '; ')"
    }
  }
  if ($phpFallbackFailures.Count -eq 0) {
    Add-Result "1" "WordPress PHP lint" "PASS" "PHP CLI is not available, but all theme PHP files passed the project structural fallback lint." "No code change required; install PHP later for native php -l parity." "Repeat fallback lint after PHP edits, or add tools/php/php.exe for native php -l."
  }
  else {
    Add-Result "1" "WordPress PHP lint" "FAIL" ($phpFallbackFailures -join "`n") "Fix listed PHP structure issues." "Install PHP CLI or re-run fallback lint after fixes."
  }
}

$previewResult = Start-PreviewIfNeeded
Add-Result "2" "Local preview server" $(if ($previewResult.Ok) { "PASS" } else { "WARN" }) $previewResult.Detail $(if ($previewResult.Ok) { "Preview is available for QA." } else { "Run with -StartPreview or start server manually." }) "Open $PreviewUrl and inspect header, map, products, and contact."

$gitStatus = "Not checked"
if (Test-Path -LiteralPath $DeployRoot) {
  if (Test-Path -LiteralPath $GitExe) {
    $gitStatusResult = Run-CommandCapture $GitExe @("-c", "safe.directory=$DeployRoot", "-C", $DeployRoot, "status", "--short", "--branch")
    $gitStatus = $gitStatusResult.Output
    $pushAction = "Use git -c safe.directory=`"$DeployRoot`" -C `"$DeployRoot`" push origin gh-pages from a network-enabled environment."
    if ($PushDeploy) {
      $push = Run-CommandCapture $GitExe @("-c", "safe.directory=$DeployRoot", "-C", $DeployRoot, "push", "origin", "gh-pages")
      if ($push.ExitCode -eq 0) {
        Add-Result "3" "GitHub Pages push" "PASS" "Push completed." "Public preview can now be verified." "Open public preview with cache-busted URL."
      }
      else {
        Add-Result "3" "GitHub Pages push" "WARN" $push.Output "Push failed; likely network/auth environment issue." $pushAction
      }
    }
    else {
      Add-Result "3" "GitHub Pages push" "WARN" "Deploy checkout status:`n$gitStatus" "Push automation is prepared but not executed without -PushDeploy." $pushAction
    }
  }
  else {
    Add-Result "3" "GitHub Pages push" "WARN" "Git executable not found at $GitExe." "Install/expose Git." "Use GitHub connector fallback for small updates."
  }
}
else {
  Add-Result "3" "GitHub Pages push" "WARN" ".deploy-medivista-github is missing." "Create or restore deployment checkout." "Sync public preview after checkout exists."
}

$cacheToken = Get-CacheBustToken (Join-Path $Root "index.html")
if (-not $cacheToken) { $cacheToken = "20260511a" }
$publicIndex = Test-HttpOk "$($PublicBaseUrl)index.html?v=$cacheToken"
$publicRoot = Test-HttpOk "$($PublicBaseUrl)?v=$cacheToken"
$publicOk = ($publicIndex.Ok -or $publicRoot.Ok)
$publicStatus = if ($publicIndex.Ok) { "HTTP $($publicIndex.StatusCode) (index.html)" } elseif ($publicRoot.Ok) { "HTTP $($publicRoot.StatusCode) (/)" } else { "Fetch failed. $($publicIndex.Error)" }
Add-Result "4" "Public preview parity" $(if ($publicOk) { "PASS" } else { "WARN" }) "Public preview ($cacheToken): $publicStatus" $(if ($publicOk) { "Continue visual parity QA." } else { "Verify after successful gh-pages push from a network-enabled environment." }) "Confirm logo, navigation, subpages, and mobile Global Reach."

$requiredZip = @(
  "wp-theme-starter/style.css",
  "wp-theme-starter/index.php",
  "wp-theme-starter/functions.php",
  "wp-theme-starter/page-about.php",
  "wp-theme-starter/page-products.php",
  "wp-theme-starter/page-brands.php",
  "wp-theme-starter/page-blogs.php",
  "wp-theme-starter/page-cellexor.php",
  "wp-theme-starter/page-contact.php",
  "wp-theme-starter/assets/css/main.css",
  "wp-theme-starter/assets/js/main.js",
  "wp-theme-starter/assets/images/medivista_logo_header.png"
)
$zipCheck = Test-ZipContains $WpZip $requiredZip
if ($zipCheck.Ok) {
  Add-Result "5" "WordPress ZIP readiness" "PASS" "WordPress theme ZIP contains required files." "No package change required." "Keep ZIP ready for direct live WordPress application after local/GitHub backup."
}
else {
  if ($RebuildWordPressZip) {
    Add-Result "5" "WordPress ZIP readiness" "FAIL" "ZIP still missing: $($zipCheck.Missing -join ', ')" "Inspect package generation." "Rebuild and re-run."
  }
  else {
    Add-Result "5" "WordPress ZIP readiness" "WARN" "ZIP missing: $($zipCheck.Missing -join ', ')" "Run with -RebuildWordPressZip." "Re-run this script."
  }
}

$requiredShopZip = @(
  "wp-theme-shop/style.css",
  "wp-theme-shop/index.php",
  "wp-theme-shop/functions.php",
  "wp-theme-shop/header.php",
  "wp-theme-shop/footer.php",
  "wp-theme-shop/front-page.php",
  "wp-theme-shop/page-shop.php",
  "wp-theme-shop/page-cart.php",
  "wp-theme-shop/page-checkout.php",
  "wp-theme-shop/page-my-account.php",
  "wp-theme-shop/woocommerce.php",
  "wp-theme-shop/assets/css/shop.css",
  "wp-theme-shop/assets/js/shop.js",
  "wp-theme-shop/assets/images/medivista_logo_header.png",
  "wp-theme-shop/assets/images/products/cellexor-re-tone.webp"
)
$shopZipCheck = Test-ZipContains $WpShopZip $requiredShopZip
if ($shopZipCheck.Ok) {
  Add-Result "5" "WordPress shop ZIP readiness" "PASS" "WordPress shop theme ZIP contains required WooCommerce-ready files." "Upload only to shop.medivista.co.kr." "Activate WooCommerce on the shop site only and test checkout in safe test mode."
}
else {
  if ($RebuildWordPressZip) {
    Add-Result "5" "WordPress shop ZIP readiness" "FAIL" "Shop ZIP still missing: $($shopZipCheck.Missing -join ', ')" "Inspect shop package generation." "Rebuild and re-run."
  }
  else {
    Add-Result "5" "WordPress shop ZIP readiness" "WARN" "Shop ZIP missing: $($shopZipCheck.Missing -join ', ')" "Run with -RebuildWordPressZip." "Re-run this script."
  }
}

$requiredNetworkZip = @(
  "wp-theme-starter/style.css",
  "wp-theme-starter/functions.php",
  "wp-theme-starter/page-brands.php",
  "wp-theme-starter/assets/css/main.css",
  "wp-theme-shop/style.css",
  "wp-theme-shop/functions.php",
  "wp-theme-shop/page-shop.php",
  "wp-theme-shop/page-checkout.php",
  "wp-theme-shop/woocommerce.php",
  "wp-theme-shop/assets/css/shop.css",
  "wp-theme-shop/assets/js/shop.js"
)
$networkZipCheck = Test-ZipContains $WpNetworkThemesZip $requiredNetworkZip
if ($networkZipCheck.Ok) {
  Add-Result "5" "WordPress network themes ZIP readiness" "PASS" "Network themes ZIP contains both main and shop theme folders at the top level." "Extract into wp-content/themes/ or upload through hosting file manager, not Appearance > Themes." "Network-enable both themes, then activate starter on www and shop on shop subdomain."
}
else {
  if ($RebuildWordPressZip) {
    Add-Result "5" "WordPress network themes ZIP readiness" "FAIL" "Network ZIP still missing: $($networkZipCheck.Missing -join ', ')" "Inspect network package generation." "Rebuild and re-run."
  }
  else {
    Add-Result "5" "WordPress network themes ZIP readiness" "WARN" "Network ZIP missing: $($networkZipCheck.Missing -join ', ')" "Run with -RebuildWordPressZip." "Re-run this script."
  }
}

try {
  [xml]$xml = Get-Content -LiteralPath $WpPagesXml -Raw
  $pageCount = $xml.rss.channel.item.Count
  Add-Result "5" "WordPress page import XML" $(if ($pageCount -eq 7) { "PASS" } else { "WARN" }) "Import XML parsed with $pageCount pages." "Use during direct live WordPress application after local/GitHub backup." "Confirm Home is assigned as static front page on the live site."
}
catch {
  Add-Result "5" "WordPress page import XML" "FAIL" $_.Exception.Message "Fix XML syntax." "Re-run XML parse."
}

$productImages = Get-ChildItem -LiteralPath (Join-Path $Root "assets/images/products") -File -Filter *.webp -ErrorAction SilentlyContinue
if ($productImages.Count -gt 0) {
  Add-Result "6" "Product images" "PASS" "$($productImages.Count) WebP product images found." "Run product image status sync when images change." "Verify cards visually."
}
else {
  Add-Result "6" "Product images" "WARN" "No final WebP product images found; placeholders remain expected." "Keep placeholders for now; add 1200x900 white-background WebP files later." "Run tools/sync-product-image-status.ps1 -Apply after images are inserted."
}

$scanPatterns = "Add to Cart|Checkout|Payment|FDA|KFDA|Clinically proven|Immediate effect|Cure|Guaranteed|100% effective|DNA repair"
$scanFiles = @("index.html","about/index.html","products/index.html","brands/index.html","blogs/index.html","cellexor/index.html","contact/index.html","assets/js/main.js","wp-theme-starter/assets/js/main.js")
$scanHits = @()
foreach ($file in $scanFiles) {
  $full = Join-Path $Root $file
  if (Test-Path -LiteralPath $full) {
    $scanHits += Select-String -Path $full -Pattern $scanPatterns -CaseSensitive:$false -ErrorAction SilentlyContinue
  }
}
$scanHits = $scanHits | Where-Object {
  $_.Line -notmatch '(?i)\bno\s+(price|prices|cart|checkout|payment)\b' -and
  $_.Line -notmatch '(?i)\bcatalog-only inquiry,\s*no checkout flow\b'
}
if ($scanHits.Count -eq 0) {
  Add-Result "Safety" "Commerce and claim scan" "PASS" "No prohibited commerce flow or risky claim keywords found in checked runtime files." "No copy change required." "Repeat before publish."
}
else {
  Add-Result "Safety" "Commerce and claim scan" "WARN" (($scanHits | ForEach-Object { "$($_.Path):$($_.LineNumber): $($_.Line.Trim())" }) -join "`n") "Review and remove risky runtime copy if needed." "Re-run scan."
}

$now = Get-Date -Format "yyyy-MM-dd HH:mm:ss K"
$lines = New-Object System.Collections.Generic.List[string]
$lines.Add("# MEDIVISTA Error Recovery Report") | Out-Null
$lines.Add("") | Out-Null
$lines.Add("Generated: $now") | Out-Null
$lines.Add("") | Out-Null
$lines.Add("| ID | Check | Status | Finding | Action | Next |") | Out-Null
$lines.Add("|---|---|---|---|---|---|") | Out-Null
foreach ($result in $results) {
  $finding = ($result.Finding -replace "\r?\n", "<br>").Replace("|", "\|")
  $action = ($result.Action -replace "\r?\n", "<br>").Replace("|", "\|")
  $next = ($result.Next -replace "\r?\n", "<br>").Replace("|", "\|")
  $lines.Add("| $($result.Id) | $($result.Name) | $($result.Status) | $finding | $action | $next |") | Out-Null
}
$lines.Add("") | Out-Null
$lines.Add("## Recommended Next Command") | Out-Null
$lines.Add("") | Out-Null
$lines.Add('```powershell') | Out-Null
$lines.Add('.\tools\medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip') | Out-Null
$lines.Add('```') | Out-Null
Set-Content -LiteralPath $ReportFullPath -Value ($lines -join "`r`n") -Encoding UTF8

Write-Host "MEDIVISTA error recovery completed."
Write-Host "Report: $ReportPath"
foreach ($result in $results) {
  Write-Host "[$($result.Status)] $($result.Id) $($result.Name)"
}
