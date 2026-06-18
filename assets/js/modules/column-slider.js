const initColumnSlider = () => {
  const sliders = document.querySelectorAll(".js-column-slider");
  const Splide = window.Splide;

  if (!sliders.length || typeof Splide !== "function") {
    return;
  }

  const prefersReducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
  ).matches;

  sliders.forEach((slider) => {
    const list = slider.querySelector(".p-column-sec__list");
    const slides = list ? Array.from(list.children) : [];

    if (!slides.length) {
      return;
    }

    slides.forEach((slide) => {
      slide.classList.add("splide__slide");
    });

    const splide = new Splide(slider, {
      type: "slide",
      arrows: false,
      pagination: slides.length > 1,
      autoplay: !prefersReducedMotion && slides.length > 1,
      interval: 4000,
      pauseOnHover: true,
      pauseOnFocus: true,
      resetProgress: false,
      perPage: 3,
      perMove: 3,
      gap: "24px",
      rewind: slides.length > 3,
      speed: prefersReducedMotion ? 0 : 500,
      breakpoints: {
        960: {
          perPage: 2,
          perMove: 2,
          gap: "20px",
          rewind: slides.length > 2,
        },
        740: {
          perPage: 1,
          perMove: 1,
          gap: "16px",
          rewind: slides.length > 1,
        },
      },
    });

    splide.mount();
  });
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initColumnSlider, {
    once: true,
  });
} else {
  initColumnSlider();
}
