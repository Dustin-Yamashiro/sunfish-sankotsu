const initIntroGallery = () => {
  const galleries = document.querySelectorAll(".js-intro-gallery");
  const Splide = window.Splide;

  if (!galleries.length || typeof Splide !== "function") {
    return;
  }

  const prefersReducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
  ).matches;
  const extensions = window.splide?.Extensions || {};

  galleries.forEach((gallery) => {
    const splide = new Splide(gallery, {
      type: "loop",
      autoWidth: true,
      arrows: false,
      pagination: false,
      drag: "free",
      focus: "center",
      gap: "72px",
      clones: 4,
      speed: 1200,
      easing: "cubic-bezier(0.25, 1, 0.5, 1)",
      autoScroll: prefersReducedMotion
        ? false
        : {
            speed: 1.25,
            pauseOnHover: false,
            pauseOnFocus: true,
          },
      breakpoints: {
        960: {
          gap: "56px",
        },
        740: {
          gap: "40px",
          clones: 3,
        },
      },
    });

    splide.mount(extensions);
  });
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initIntroGallery, {
    once: true,
  });
} else {
  initIntroGallery();
}
