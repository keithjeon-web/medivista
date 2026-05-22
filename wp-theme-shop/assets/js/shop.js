(() => {
  const header = document.querySelector('.shop-header');
  if (!header) return;

  const setScrolled = () => {
    header.classList.toggle('is-scrolled', window.scrollY > 8);
  };

  setScrolled();
  window.addEventListener('scroll', setScrolled, { passive: true });
})();
