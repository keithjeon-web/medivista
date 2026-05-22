<footer class="shop-footer">
  <div class="shop-container shop-footer-grid">
    <div>
      <strong>MEDIVISTA Brand Shop</strong>
      <p>CELLEXOR and own-brand commerce site for professional aesthetic care products.</p>
    </div>
    <div>
      <strong>Commerce</strong>
      <a href="<?php echo esc_url(home_url('/shop/')); ?>">Shop</a>
      <a href="<?php echo esc_url(medivista_shop_cart_url()); ?>">Cart</a>
      <a href="<?php echo esc_url(medivista_shop_checkout_url()); ?>">Checkout</a>
    </div>
    <div>
      <strong>Main Site</strong>
      <a href="https://www.medivista.co.kr">MEDIVISTA Catalog</a>
      <a href="https://www.instagram.com/medivista.global?igsh=M21lN3Q3dDl5NGx0&utm_source=qr" target="_blank" rel="noopener">Instagram</a>
      <a href="https://www.facebook.com/share/1DRDDT62yZ/?mibextid=wwXIfr" target="_blank" rel="noopener">Facebook</a>
    </div>
  </div>
  <div class="shop-container shop-footer-bottom">&copy; <?php echo esc_html(date('Y')); ?> MEDIVISTA. All rights reserved.</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
