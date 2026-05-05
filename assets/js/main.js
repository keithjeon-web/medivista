const MEDIVISTA_WHATSAPP_NUMBER = 'REPLACE_WITH_MEDIVISTA_WHATSAPP_NUMBER';
const MEDIVISTA_WHATSAPP_MESSAGE = 'Hello MEDIVISTA, I would like to inquire about your products.';

function buildWhatsAppUrl(productName) {
  const message = productName
    ? `${MEDIVISTA_WHATSAPP_MESSAGE} Product: ${productName}.`
    : MEDIVISTA_WHATSAPP_MESSAGE;
  return `https://wa.me/${MEDIVISTA_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
}

document.querySelectorAll('[data-whatsapp]').forEach((link) => {
  link.setAttribute('href', buildWhatsAppUrl(link.dataset.product));
  link.setAttribute('target', '_blank');
  link.setAttribute('rel', 'noopener noreferrer');
});

document.querySelectorAll('[data-year]').forEach((node) => {
  node.textContent = new Date().getFullYear();
});
