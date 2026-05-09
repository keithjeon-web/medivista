<?php
$product_categories = array(
  'botulinum-toxins' => array(
    'label' => 'Botulinum Toxins',
    'items' => array('Botulax', 'Liztox', 'Innotox', 'Hutox', 'Nabota', 'Coretox'),
  ),
  'dermal-fillers' => array(
    'label' => 'Dermal Fillers',
    'items' => array('The Chaeum', 'Revolax Sub-Q', 'Revolax Deep', 'Revolax Fine', 'Dermalax Implant', 'Dermalax Deep'),
  ),
  'body-fillers' => array(
    'label' => 'Body Fillers',
    'items' => array('Premium Body Filler Line'),
  ),
  'skin-boosters' => array(
    'label' => 'Skin Boosters',
    'items' => array('Rejuran Healer', 'Rejuran S', 'Rejuran i', 'Rejuran HB'),
  ),
  'lipolysis' => array(
    'label' => 'Lipolysis',
    'items' => array('Professional Lipolysis Line'),
  ),
  'exosomes' => array(
    'label' => 'Exosomes',
    'items' => array('Cellexor Re:Tone'),
  ),
  'biostimulators' => array(
    'label' => 'Biostimulators',
    'items' => array('Professional Biostimulator Line'),
  ),
  'hair-treatment' => array(
    'label' => 'Hair Treatment',
    'items' => array('Professional Hair Treatment Line'),
  ),
  'cosmetics' => array(
    'label' => 'Cosmetics',
    'items' => array('Professional Cosmetics Line'),
  ),
  'others' => array(
    'label' => 'Others',
    'items' => array('Guthione 1200mg', 'Vitamin C 500mg', 'Jeil High-B', 'Hishiphagenc'),
  ),
);
?>
<?php foreach ($product_categories as $category_id => $category) : ?>
  <div id="<?php echo esc_attr($category_id); ?>" class="product-category-block">
    <p class="eyebrow"><?php echo esc_html($category['label']); ?></p>
    <div class="grid grid-3">
      <?php foreach ($category['items'] as $product_name) : ?>
        <article class="product-card">
          <p class="card-meta"><?php echo esc_html($category['label']); ?></p>
          <h3><?php echo esc_html($product_name); ?></h3>
          <p>Professional aesthetic solution information for partner review.</p>
          <a class="btn whatsapp" href="#" data-whatsapp>Inquire via WhatsApp</a>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
<?php endforeach; ?>
