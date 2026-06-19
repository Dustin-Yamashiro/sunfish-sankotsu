const animationSelector =
  ".u-fade-up, .u-fade-up-group, .u-text-fade, .u-photo-fade, .u-bg-wipe";
const loadAnimationSelector = ".u-bg-wipe--load";
const loadAnimationDelay = 160;
const narrowViewportQuery = "(max-width: 960px)";
const desktopObserverRootMargin = "0px 0px -20% 0px";
const narrowObserverRootMargin = "0px 0px -14% 0px";

const getAnimationDelayValue = (element, name, fallback) => {
  const value = Number.parseInt(element.dataset[name] ?? "", 10);

  return Number.isFinite(value) ? value : fallback;
};

const getObserverRootMargin = () =>
  window.matchMedia(narrowViewportQuery).matches
    ? narrowObserverRootMargin
    : desktopObserverRootMargin;

const splitTextToChars = (element) => {
  if (element.dataset.textSplit === "true") {
    return;
  }

  const text = element.textContent ?? "";

  if (!text.trim()) {
    return;
  }

  element.dataset.textSplit = "true";
  element.setAttribute("aria-label", text);
  element.textContent = "";

  Array.from(text).forEach((char, index) => {
    const span = document.createElement("span");

    span.className = "u-text-char";
    span.setAttribute("aria-hidden", "true");
    span.style.setProperty("--u-char-delay", `${index * 54}ms`);
    span.textContent = char === " " ? "\u00a0" : char;
    element.appendChild(span);
  });
};

const setGroupDelays = (root) => {
  const baseDelay = getAnimationDelayValue(root, "fadeBaseDelay", 0);
  const stagger = getAnimationDelayValue(root, "fadeStagger", 110);

  root.querySelectorAll(".u-fade-up-item").forEach((item, index) => {
    item.style.setProperty(
      "--u-fade-delay",
      `${baseDelay + index * stagger}ms`,
    );
  });
};

const showWithoutMotion = () => {
  document.querySelectorAll(animationSelector).forEach((element) => {
    element.classList.add("is-inview");
  });
};

const showLoadAnimations = () => {
  const loadTargets = Array.from(document.querySelectorAll(loadAnimationSelector));

  if (!loadTargets.length) {
    return;
  }

  const play = () => {
    window.requestAnimationFrame(() => {
      window.requestAnimationFrame(() => {
        window.setTimeout(() => {
          loadTargets.forEach((element) => {
            element.classList.add("is-inview");
          });
        }, loadAnimationDelay);
      });
    });
  };

  if (document.readyState === "complete") {
    play();
    return;
  }

  window.addEventListener("load", play, { once: true });
};

const initUtilityAnimation = () => {
  const targets = Array.from(document.querySelectorAll(animationSelector));
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

  if (!targets.length) {
    return;
  }

  document.querySelectorAll(".u-text-fade--chars").forEach(splitTextToChars);
  document.querySelectorAll(".u-fade-up-group").forEach(setGroupDelays);

  if (reduceMotion.matches || typeof IntersectionObserver === "undefined") {
    showWithoutMotion();
    return;
  }

  document.documentElement.classList.add("is-anim-ready");
  showLoadAnimations();

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) {
          return;
        }

        entry.target.classList.add("is-inview");
        observer.unobserve(entry.target);
      });
    },
    {
      rootMargin: getObserverRootMargin(),
      threshold: 0.16,
    },
  );

  targets.forEach((target) => {
    if (target.matches(loadAnimationSelector)) {
      return;
    }

    observer.observe(target);
  });
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initUtilityAnimation, {
    once: true,
  });
} else {
  initUtilityAnimation();
}
