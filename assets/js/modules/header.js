const initHeader = () => {
  const header = document.querySelector('.js-header');
  const toggle = document.querySelector('.js-header-toggle');
  const panel = document.querySelector('.js-header-panel');
  const subToggles = panel ? panel.querySelectorAll('.js-header-sub-toggle') : [];

  if (!header || !toggle || !panel) {
    return;
  }

  const closeSubmenus = () => {
    subToggles.forEach((subToggle) => {
      subToggle.setAttribute('aria-expanded', 'false');
      subToggle.closest('.l-custom-header__mobile-item')?.classList.remove('is-sub-open');
    });
  };

  const setOpen = (isOpen) => {
    header.classList.toggle('is-open', isOpen);
    document.documentElement.classList.toggle('is-header-open', isOpen);
    toggle.setAttribute('aria-expanded', String(isOpen));

    if (!isOpen) {
      closeSubmenus();
    }
  };

  toggle.addEventListener('click', () => {
    setOpen(!header.classList.contains('is-open'));
  });

  panel.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      setOpen(false);
    });
  });

  subToggles.forEach((subToggle) => {
    subToggle.addEventListener('click', () => {
      const isOpen = subToggle.getAttribute('aria-expanded') === 'true';

      subToggle.setAttribute('aria-expanded', String(!isOpen));
      subToggle.closest('.l-custom-header__mobile-item')?.classList.toggle('is-sub-open', !isOpen);
    });
  });

  window.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      setOpen(false);
    }
  });

  window.addEventListener('resize', () => {
    if (window.matchMedia('(min-width: 961px)').matches) {
      setOpen(false);
    }
  });
};

initHeader();
