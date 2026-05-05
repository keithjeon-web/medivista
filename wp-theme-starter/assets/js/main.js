const MEDIVISTA_WHATSAPP_NUMBER = 'REPLACE_WITH_MEDIVISTA_WHATSAPP_NUMBER';
const MEDIVISTA_WHATSAPP_MESSAGE = 'Hello MEDIVISTA, I would like to inquire about your products.';

document.querySelectorAll('[data-whatsapp]').forEach((link) => {
  link.href = `https://wa.me/${MEDIVISTA_WHATSAPP_NUMBER}?text=${encodeURIComponent(MEDIVISTA_WHATSAPP_MESSAGE)}`;
  link.target = '_blank';
  link.rel = 'noopener noreferrer';
});
