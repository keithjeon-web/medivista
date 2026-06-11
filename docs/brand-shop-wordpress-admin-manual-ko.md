# MEDIVISTA Brand Shop WordPress Admin Manual

Updated: 2026-06-11

이 문서는 `shop.medivista.co.kr` 운영자가 Codex나 AI 없이 WordPress 관리자 화면만으로 WooCommerce 상품, 할인, 배송, 주문을 관리하기 위한 절차입니다.

## 적용 범위

- 메인 사이트 `www.medivista.co.kr`: 회사 소개와 B2B 카탈로그만 운영합니다.
- 쇼핑몰 사이트 `shop.medivista.co.kr`: WooCommerce 상품, 장바구니, 결제, 주문 관리를 운영합니다.
- WooCommerce는 `shop.medivista.co.kr` 사이트에서만 활성화합니다.
- 메인 사이트에는 가격, Add to Cart, Cart, Checkout, Payment 기능을 추가하지 않습니다.

## 1. 테마 적용

### 네트워크 방식

1. `dist/medivista-wp-network-themes-20260525.zip`을 호스팅 파일 관리자, SFTP, 또는 서버 unzip으로 `wp-content/themes/`에 압축 해제합니다.
2. WordPress `Network Admin > Themes`로 이동합니다.
3. `MEDIVISTA Starter`와 `MEDIVISTA Shop`을 Network Enable 합니다.
4. `www.medivista.co.kr` 사이트 관리자에서 `MEDIVISTA Starter`를 활성화합니다.
5. `shop.medivista.co.kr` 사이트 관리자에서 `MEDIVISTA Shop`을 활성화합니다.

### 관리자 업로드 방식

1. 메인 사이트에는 `dist/medivista-wp-theme-starter-20260511-wp.zip`을 업로드합니다.
2. 쇼핑몰 사이트에는 `dist/medivista-wp-theme-shop-20260522-wp.zip`을 업로드합니다.
3. 각 사이트에서 맞는 테마만 활성화합니다.

## 2. WooCommerce 활성화

1. `shop.medivista.co.kr` 사이트 관리자에 로그인합니다.
2. `Plugins > Add New`에서 WooCommerce를 설치합니다.
3. WooCommerce를 `shop.medivista.co.kr` 사이트에서만 활성화합니다.
4. WooCommerce 설정 마법사를 실행합니다.
5. WooCommerce가 만드는 기본 페이지를 생성합니다.

필수 페이지:

- Shop
- Cart
- Checkout
- My Account

## 3. 기본 통화와 결제

1. `WooCommerce > Settings > General`로 이동합니다.
2. Currency를 `United States (US) dollar ($)`로 설정합니다.
3. Selling location은 실제 판매 가능 국가 정책에 맞게 설정합니다.
4. `WooCommerce > Settings > Payments`에서 결제 수단을 연결합니다.
5. 실제 결제 전에는 테스트 모드로 주문을 1회 이상 완료합니다.

## 4. 국제 배송 설정

`WooCommerce > Settings > Shipping > Shipping zones`에서 국제 배송 Zone을 만듭니다.

권장 설정:

- Zone name: `International Shipping`
- Region: 판매 가능한 국가 또는 `Locations not covered by your other zones`

배송 방법:

1. `Free shipping`
   - Minimum order amount: `300`
   - 의미: USD 300 이상 주문은 무료배송
2. `Flat rate`
   - Cost: `50`
   - 의미: USD 300 미만 주문은 고객 부담 배송료 USD 50

주의: 사용자가 제공한 문구는 "300usd 이상 무료배송 / 300usd 이하 고객부담 50usd"로 300달러가 양쪽에 겹칩니다. WooCommerce에서는 보통 `USD 300 이상 무료배송`, `USD 300 미만 USD 50`으로 설정하는 것이 충돌이 없습니다.

## 5. 첫 거래 10% 할인 쿠폰

1. `Marketing > Coupons`로 이동합니다.
2. `Add coupon`을 클릭합니다.
3. Coupon code 예시: `FIRST10`
4. Discount type: `Percentage discount`
5. Coupon amount: `10`
6. Usage restriction에서 필요하면 최소 주문금액, 이메일 제한, 상품 제한을 설정합니다.
7. Usage limits에서 `Usage limit per user`를 `1`로 설정합니다.

첫 거래 여부를 자동으로 엄격히 제한하려면 WooCommerce 기본 기능만으로는 부족할 수 있습니다. 기본 운영에서는 `FIRST10` 쿠폰을 신규 고객에게만 안내하고, 주문 이력 확인 후 필요 시 수동 관리합니다.

## 6. CELLEXOR Re:Tone 상품 등록

### CSV 가져오기

1. `Products > All Products`로 이동합니다.
2. `Import`를 클릭합니다.
3. `docs/brand-shop-cellexor-retone-woocommerce-import.csv`를 업로드합니다.
4. 필드 매핑을 확인합니다.
5. Import를 실행합니다.
6. 가져온 상품은 `Published = 0` 상태이므로, 검수 후 수동으로 Publish 합니다.

### 수동 등록

1. `Products > Add New`를 클릭합니다.
2. Product name: `Cellexor Re:Tone`
3. Product data: `Variable product`
4. Attributes에서 `Package`를 추가합니다.
5. Attribute values:
   - `1 Set small box / inner box`
   - `5 Set large box / outer box`
6. Variations에서 두 옵션을 생성합니다.
7. 가격 입력:
   - 1 Set: Regular price `120`, Sale price `99.90`
   - 5 Set: Regular price `500`, Sale price `489.80`
8. Product image에 `cellexor-re-tone.webp` 이미지를 연결합니다.
9. Shipping, Stock, SKU, Short description, Refund/Terms 내용을 확인합니다.
10. 검수 완료 후 Publish 합니다.

## 7. B2B 주문 안내

상품 상세 설명 또는 Short description에 다음처럼 안전한 안내를 넣습니다.

```text
B2B and bulk orders: please contact MEDIVISTA through WhatsApp.
```

전화번호나 WhatsApp 링크는 최종 확정된 번호만 사용합니다.

## 8. 한국 IP 차단

요청 정책:

- `shop.medivista.co.kr`은 관리자 계정을 제외하고 한국 IP를 차단합니다.
- `www.medivista.co.kr` 메인 사이트에는 이 차단을 적용하지 않습니다.

현재 `wp-theme-shop/inc/access-control.php`는 `KR` 국가 코드가 감지되면 쇼핑몰 프론트 접근을 403으로 차단합니다.

관리자 예외:

- `manage_options` 권한을 가진 로그인 사용자
- `/wp-admin/`
- `/wp-login.php`
- WordPress AJAX / Cron

중요: WordPress 기본 기능만으로는 IP의 국가를 정확히 알 수 없습니다. 아래 중 하나가 필요합니다.

- Cloudflare 같은 CDN의 `CF-IPCountry` 헤더
- 호스팅/WAF의 국가 코드 헤더
- WordPress 보안 플러그인의 GeoIP 차단 기능

차단 테스트:

1. 관리자 계정으로 접속해 쇼핑몰 관리자가 열리는지 확인합니다.
2. CDN/WAF에서 한국 국가 코드 `KR` 방문자 차단 또는 헤더 전달을 켭니다.
3. 비관리자/비로그인 상태에서 `shop.medivista.co.kr` 접속이 차단되는지 확인합니다.
4. `www.medivista.co.kr`은 계속 접속 가능한지 확인합니다.

## 9. 운영 체크리스트

- WooCommerce는 쇼핑몰 사이트에만 활성화됨
- 메인 사이트에는 가격/장바구니/결제 없음
- Brand Shop 링크는 `https://shop.medivista.co.kr`
- Currency는 USD
- 1 Set / 5 Set 가격 확인
- FIRST10 쿠폰 10% 확인
- USD 300 이상 무료배송 확인
- USD 300 미만 USD 50 배송료 확인
- B2B WhatsApp 문의 문구 확인
- 한국 IP 차단은 쇼핑몰에만 적용
- 관리자 계정은 차단 예외
- 실제 결제 전 테스트 주문 완료
