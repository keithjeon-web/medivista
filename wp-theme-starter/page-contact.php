<?php
/*
Template Name: MEDIVISTA Contact
*/
get_header();
?>
<main id="main-content">
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
        <p>Use this page for product categories, CELLEXOR brand questions, or distribution discussions. Required fields are included in your WhatsApp inquiry message.</p>
        <div class="contact-summary">
          <span><strong>WhatsApp</strong> +82 10 5906 6768</span>
          <span><strong>Response focus</strong> Product category, market, and B2B partner type</span>
          <span><strong>Main site</strong> Catalog-only inquiry, no online ordering</span>
        </div>
        <div class="contact-assist" aria-label="Inquiry planning assistant">
          <div class="contact-assist-head">
            <p class="card-meta">Quick Start</p>
            <h3>Choose the closest inquiry path</h3>
            <p>Select a preset to prefill the form with a safer B2B starting point. You can still adjust every field before sending.</p>
          </div>
          <div class="contact-presets" role="list">
            <button type="button" class="contact-preset" data-inquiry-preset="distributor">Distribution Inquiry</button>
            <button type="button" class="contact-preset" data-inquiry-preset="clinic">Clinic Product Interest</button>
            <button type="button" class="contact-preset" data-inquiry-preset="brand">CELLEXOR Brand Question</button>
            <button type="button" class="contact-preset" data-inquiry-preset="market">New Market Request</button>
          </div>
          <div class="contact-checklist">
            <strong>Helpful details to prepare</strong>
            <ul>
              <li>Target country or sales region</li>
              <li>Business type and preferred product categories</li>
              <li>Any timeline, quantity range, or market questions</li>
            </ul>
          </div>
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
              <option>Dermal Fillers</option>
              <option>Body Fillers</option>
              <option>Skin Boosters</option>
              <option>Lipolysis</option>
              <option>Exosomes</option>
              <option>Biostimulators</option>
              <option>Vitamin Injections</option>
              <option>Others</option>
              <option>Cosmetic</option>
            </select>
          </label>
        </div>
        <label>Message<textarea name="message" placeholder="Tell us your target market, quantity, or product questions."></textarea></label>
        <label class="checkbox-label"><input type="checkbox" name="privacy-agreement" required><span>I agree to share this inquiry information with MEDIVISTA for B2B follow-up. *</span></label>
        <div class="contact-preview" data-contact-preview aria-live="polite">
          <p class="card-meta">WhatsApp Preview</p>
          <p>This message will open in WhatsApp after you submit the form.</p>
          <pre data-contact-preview-text>Hello MEDIVISTA, I would like to send a B2B inquiry.</pre>
        </div>
        <button class="btn primary" type="submit">Send via WhatsApp</button>
      </form>
    </div>
  </section>
</main>
<?php get_footer(); ?>
