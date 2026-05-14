<?php get_header(); ?>
<main>
  <section class="page-banner">
    <div class="container">
      <p class="eyebrow">Contact Us</p>
      <h1>Send a professional inquiry to MEDIVISTA.</h1>
      <p>Share your business information and product interest. The form opens a prepared WhatsApp message for fast B2B follow-up.</p>
    </div>
  </section>
  <section class="section">
    <div class="container grid grid-2">
      <div>
        <p class="eyebrow">Inquiry Form</p>
        <h2>Global partner communication starts here</h2>
        <p>Use this page for product categories, CELLEXOR brand questions, or distribution discussions.</p>
        <div class="contact-summary">
          <span><strong>WhatsApp</strong> +82 10 5906 6768</span>
          <span><strong>Response focus</strong> Product category, market, and B2B partner type</span>
          <span><strong>Main site</strong> Catalog-only inquiry, no online ordering</span>
        </div>
        <div class="button-row"><a class="btn primary" href="#" data-whatsapp>Open WhatsApp Directly</a></div>
      </div>
      <form class="contact-form" action="#" method="post">
        <div class="form-row">
          <label>First Name *<input type="text" name="first-name" autocomplete="given-name" required></label>
          <label>Email *<input type="email" name="email" autocomplete="email" required></label>
        </div>
        <div class="form-row">
          <label>Contact Number *<input type="tel" name="contact-number" autocomplete="tel" required></label>
          <label>Select Country *
            <select name="country" required>
              <option value="">Select Country</option>
              <option>South Korea</option>
              <option>United States</option>
              <option>China</option>
              <option>Japan</option>
              <option>New Zealand</option>
              <option>Australia</option>
              <option>Malaysia</option>
              <option>Philippines</option>
              <option>Thailand</option>
              <option>Vietnam</option>
              <option>Singapore</option>
              <option>United Arab Emirates</option>
              <option>Other</option>
            </select>
          </label>
        </div>
        <div class="form-row">
          <label>Business Type
            <select name="business-type">
              <option value="">Select Business Type</option>
              <option>Distributor</option>
              <option>Clinic</option>
              <option>Wholesaler</option>
              <option>Brand Partner</option>
              <option>Other</option>
            </select>
          </label>
          <label>Product Type
            <select name="product-type">
              <option value="">Select Product Type</option>
              <option>Botulinum Toxins</option>
              <option>HA Dermal Fillers</option>
              <option>Skin Boosters</option>
              <option>Lipolysis</option>
              <option>Biostimulators</option>
              <option>Cosmetics</option>
              <option>Others</option>
            </select>
          </label>
        </div>
        <label>Message<textarea name="message" placeholder="Tell us your target market, quantity, or product questions."></textarea></label>
        <label class="checkbox-label"><input type="checkbox" name="privacy-agreement" required><span>I agree to share this inquiry information with MEDIVISTA for B2B follow-up. *</span></label>
        <button class="btn primary" type="submit">Send via WhatsApp</button>
      </form>
    </div>
  </section>
</main>
<?php get_footer(); ?>
