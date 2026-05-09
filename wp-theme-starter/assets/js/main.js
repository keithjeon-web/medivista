const MEDIVISTA_WHATSAPP_NUMBER = '821059066768';
const MEDIVISTA_WHATSAPP_MESSAGE = 'Hello MEDIVISTA, I would like to inquire about your products.';

document.querySelectorAll('[data-whatsapp]').forEach((link) => {
  link.href = `https://wa.me/${MEDIVISTA_WHATSAPP_NUMBER}?text=${encodeURIComponent(MEDIVISTA_WHATSAPP_MESSAGE)}`;
  link.target = '_blank';
  link.rel = 'noopener noreferrer';
});
