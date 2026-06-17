const initFrontAbout = () => {
  const section = document.querySelector("[data-front-about]");
  const cards = section
    ? Array.from(section.querySelectorAll("[data-front-about-card]"))
    : [];
  const gsap = window.gsap;
  const ScrollTrigger = window.ScrollTrigger;

  if (!section || cards.length === 0) {
    return;
  }

  const setActive = (activeCard) => {
    cards.forEach((card) => {
      card.classList.toggle("is-active", card === activeCard);
    });
  };

  const initFallbackScroll = () => {
    section.classList.add("is-scroll-ready");

    const updateByScroll = () => {
      const revealLine = window.innerHeight * 0.88;
      const activeLine = window.innerHeight * 0.58;
      let activeCard = cards[0];

      cards.forEach((card) => {
        const rect = card.getBoundingClientRect();

        if (rect.top < revealLine) {
          card.classList.add("is-inview");
        }

        if (rect.top < activeLine && rect.bottom > window.innerHeight * 0.24) {
          activeCard = card;
        }
      });

      setActive(activeCard);
    };

    if (typeof window.IntersectionObserver !== "function") {
      cards[0].classList.add("is-inview");
      updateByScroll();
      window.addEventListener("scroll", updateByScroll, { passive: true });
      window.addEventListener("resize", updateByScroll);
      return;
    }

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) {
            return;
          }

          entry.target.classList.add("is-inview");
          setActive(entry.target);
        });
      },
      {
        root: null,
        rootMargin: "-28% 0px -42%",
        threshold: 0.12,
      },
    );

    cards.forEach((card, index) => {
      if (index === 0) {
        card.classList.add("is-inview");
      }

      observer.observe(card);
    });
  };

  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    setActive(cards[0]);
    cards.forEach((card) => card.classList.add("is-inview"));
    return;
  }

  if (typeof gsap !== "object" || typeof ScrollTrigger !== "function") {
    setActive(cards[0]);
    initFallbackScroll();
    return;
  }

  gsap.registerPlugin(ScrollTrigger);

  const media = gsap.matchMedia();

  media.add("(min-width: 961px)", () => {
    const context = gsap.context(() => {
      cards.forEach((card, index) => {
        const cardBody = card.querySelector(".p-front-about__point-card");

        gsap.fromTo(
          cardBody,
          {
            autoAlpha: index === 0 ? 1 : 0.35,
            y: index === 0 ? 0 : 56,
          },
          {
            autoAlpha: 1,
            y: 0,
            duration: 0.8,
            ease: "power2.out",
            scrollTrigger: {
              trigger: card,
              start: "top 72%",
              end: "top 38%",
              scrub: 0.6,
            },
          },
        );

        ScrollTrigger.create({
          trigger: card,
          start: "top center",
          end: "bottom center",
          onEnter: () => setActive(card),
          onEnterBack: () => setActive(card),
        });
      });
    }, section);

    window.addEventListener("load", ScrollTrigger.refresh, { once: true });

    return () => {
      context.revert();
    };
  });

  media.add("(max-width: 960px)", () => {
    setActive(cards[0]);

    const context = gsap.context(() => {
      gsap.from(cards, {
        autoAlpha: 0,
        x: 40,
        duration: 0.7,
        ease: "power2.out",
        stagger: 0.08,
        scrollTrigger: {
          trigger: section.querySelector("[data-front-about-points]"),
          start: "top 82%",
          once: true,
        },
      });
    }, section);

    return () => {
      context.revert();
    };
  });
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initFrontAbout, { once: true });
} else {
  initFrontAbout();
}
