const animationSelector =
  ".u-fade-up, .u-fade-up-group, .u-text-fade, .u-photo-fade, .u-step-flow, .u-bg-wipe";
const loadAnimationSelector = ".u-bg-wipe--load";
const loadAnimationDelay = 160;

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
  root.querySelectorAll(".u-fade-up-item").forEach((item, index) => {
    item.style.setProperty("--u-fade-delay", `${index * 110}ms`);
  });
};

const setStepDelays = (root) => {
  const groups = root.querySelectorAll(".u-step-flow-group");
  const items = groups.length ? groups : root.querySelectorAll(".u-step-flow-label");

  items.forEach((item, index) => {
    const stepDelay = index * 220;
    const parts = item.classList.contains("u-step-flow-label")
      ? [item]
      : item.querySelectorAll(".u-step-flow-label");

    parts.forEach((part, partIndex) => {
      part.style.setProperty("--u-step-delay", `${stepDelay}ms`);
      part.style.setProperty("--u-step-part-delay", `${partIndex * 70}ms`);
    });
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
  document.querySelectorAll(".u-step-flow").forEach(setStepDelays);

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
      rootMargin: "0px 0px -16% 0px",
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
