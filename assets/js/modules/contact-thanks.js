const initContactThanksRedirect = () => {
  document.addEventListener('wpcf7mailsent', (event) => {
    const form = event.target;

    if (!(form instanceof HTMLElement)) {
      return;
    }

    const formSection = form.closest('.l-contact__form-section');
    const thanksUrl = formSection?.dataset.thanksUrl;

    if (!thanksUrl) {
      return;
    }

    window.location.href = thanksUrl;
  });
};

initContactThanksRedirect();
