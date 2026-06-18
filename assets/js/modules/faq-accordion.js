const initFaqAccordion = () => {
  const accordions = document.querySelectorAll(".js-faq-accordion");

  accordions.forEach((accordion) => {
    const buttons = accordion.querySelectorAll(".js-faq-accordion-button");

    buttons.forEach((button) => {
      const panelId = button.getAttribute("aria-controls");
      const panel = panelId ? document.getElementById(panelId) : null;
      const item = button.closest(".l-sec-faq__item");

      if (!panel || !item) {
        return;
      }

      button.addEventListener("click", () => {
        const isOpen = button.getAttribute("aria-expanded") === "true";
        const nextOpen = !isOpen;

        button.setAttribute("aria-expanded", String(nextOpen));
        panel.setAttribute("aria-hidden", String(!nextOpen));
        item.classList.toggle("is-open", nextOpen);
      });
    });
  });
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initFaqAccordion, {
    once: true,
  });
} else {
  initFaqAccordion();
}
