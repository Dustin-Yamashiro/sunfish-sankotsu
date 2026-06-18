const initFeatureSec = () => {
  const section = document.querySelector("[data-feature-sec]");
  const cards = section
    ? Array.from(section.querySelectorAll("[data-feature-sec-card]"))
    : [];
  const points = section?.querySelector("[data-feature-sec-points]");
  const scrollbarThumb = section?.querySelector("[data-feature-sec-scrollbar]");
  const motionQuery = window.matchMedia("(prefers-reduced-motion: reduce)");
  let snapTimer = 0;
  let scrollFrame = 0;
  let resizeFrame = 0;
  let isWindowScrollBound = false;
  let lastViewportWidth = window.innerWidth;

  if (!section || cards.length === 0) {
    return;
  }

  const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

  const isHorizontalScrollable = () =>
    Boolean(points && points.scrollWidth > points.clientWidth + 1);

  const setActive = (activeCard) => {
    cards.forEach((card) => {
      card.classList.toggle("is-active", card === activeCard);
    });
  };

  const getClosestVerticalCard = () => {
    const activeLine = window.innerHeight * 0.52;
    let activeCard = cards[0];
    let minDistance = Number.POSITIVE_INFINITY;

    cards.forEach((card) => {
      const rect = card.getBoundingClientRect();

      if (rect.bottom < window.innerHeight * 0.08 || rect.top > window.innerHeight * 0.92) {
        return;
      }

      const distance = Math.abs(rect.top + rect.height / 2 - activeLine);

      if (distance < minDistance) {
        minDistance = distance;
        activeCard = card;
      }
    });

    return activeCard;
  };

  const getClosestHorizontalCard = () => {
    if (!points) {
      return cards[0];
    }

    const pointsRect = points.getBoundingClientRect();
    const activeLine = pointsRect.left + pointsRect.width * 0.5;
    let activeCard = cards[0];
    let minDistance = Number.POSITIVE_INFINITY;

    cards.forEach((card) => {
      const rect = card.getBoundingClientRect();

      if (rect.right < pointsRect.left || rect.left > pointsRect.right) {
        return;
      }

      const distance = Math.abs(rect.left + rect.width / 2 - activeLine);

      if (distance < minDistance) {
        minDistance = distance;
        activeCard = card;
      }
    });

    return activeCard;
  };

  const updateActiveByScroll = () => {
    setActive(isHorizontalScrollable() ? getClosestHorizontalCard() : getClosestVerticalCard());
  };

  const updateActiveByWindowScroll = () => {
    if (isHorizontalScrollable() || scrollFrame) {
      return;
    }

    scrollFrame = window.requestAnimationFrame(() => {
      scrollFrame = 0;
      updateActiveByScroll();
    });
  };

  const updateActiveByHorizontalScroll = () => {
    setActive(getClosestHorizontalCard());
    updateScrollbar();
    queueHorizontalSnap();
  };

  const getCardCenterScrollLeft = (card) => {
    if (!points) {
      return 0;
    }

    const pointsRect = points.getBoundingClientRect();
    const cardRect = card.getBoundingClientRect();
    const currentCenter = cardRect.left + cardRect.width / 2;
    const targetCenter = pointsRect.left + pointsRect.width / 2;
    const nextScrollLeft = points.scrollLeft + currentCenter - targetCenter;
    const maxScroll = Math.max(0, points.scrollWidth - points.clientWidth);

    return clamp(nextScrollLeft, 0, maxScroll);
  };

  const updateScrollbar = () => {
    if (!points || !scrollbarThumb) {
      return;
    }

    const scrollbar = scrollbarThumb.parentElement;
    const trackWidth = scrollbar?.clientWidth ?? 0;
    const firstCard = cards[0];
    const lastCard = cards[cards.length - 1];
    const firstScroll = getCardCenterScrollLeft(firstCard);
    const lastScroll = getCardCenterScrollLeft(lastCard);
    const cardScrollRange = Math.max(0, lastScroll - firstScroll);
    const progress =
      cardScrollRange > 0 ? clamp((points.scrollLeft - firstScroll) / cardScrollRange, 0, 1) : 0;
    const thumbWidth = trackWidth > 0 ? trackWidth / cards.length : 0;
    const thumbX = (trackWidth - thumbWidth) * progress;

    scrollbarThumb.style.setProperty("--feature-sec-scrollbar-thumb-width", `${thumbWidth}px`);
    scrollbarThumb.style.setProperty("--feature-sec-scrollbar-thumb-x", `${thumbX}px`);
  };

  const snapToClosestHorizontalCard = () => {
    if (!points || !isHorizontalScrollable()) {
      return;
    }

    const activeCard = getClosestHorizontalCard();
    const nextScrollLeft = getCardCenterScrollLeft(activeCard);

    if (Math.abs(points.scrollLeft - nextScrollLeft) <= 1) {
      updateScrollbar();
      return;
    }

    points.scrollTo({
      left: nextScrollLeft,
      behavior: motionQuery.matches ? "auto" : "smooth",
    });
  };

  const queueHorizontalSnap = () => {
    if (!isHorizontalScrollable()) {
      return;
    }

    window.clearTimeout(snapTimer);
    snapTimer = window.setTimeout(snapToClosestHorizontalCard, 140);
  };

  const bindWindowScroll = () => {
    if (isWindowScrollBound || isHorizontalScrollable()) {
      return;
    }

    window.addEventListener("scroll", updateActiveByWindowScroll, { passive: true });
    isWindowScrollBound = true;
  };

  const unbindWindowScroll = () => {
    if (!isWindowScrollBound) {
      return;
    }

    window.removeEventListener("scroll", updateActiveByWindowScroll);
    isWindowScrollBound = false;

    if (scrollFrame) {
      window.cancelAnimationFrame(scrollFrame);
      scrollFrame = 0;
    }
  };

  const syncScrollMode = () => {
    if (isHorizontalScrollable()) {
      unbindWindowScroll();
      updateActiveByHorizontalScroll();
      return;
    }

    bindWindowScroll();
    updateActiveByScroll();
  };

  const updateLayout = () => {
    window.clearTimeout(snapTimer);
    syncScrollMode();
    updateScrollbar();

    if (isHorizontalScrollable()) {
      window.requestAnimationFrame(snapToClosestHorizontalCard);
    }
  };

  const queueLayoutUpdate = () => {
    if (resizeFrame) {
      return;
    }

    resizeFrame = window.requestAnimationFrame(() => {
      resizeFrame = 0;
      updateLayout();
    });
  };

  const handleResize = () => {
    const nextViewportWidth = window.innerWidth;
    const widthChanged = nextViewportWidth !== lastViewportWidth;

    lastViewportWidth = nextViewportWidth;

    if (!widthChanged && isHorizontalScrollable()) {
      return;
    }

    queueLayoutUpdate();
  };

  setActive(cards[0]);
  updateLayout();
  window.addEventListener("resize", handleResize);

  if (points) {
    const hasScrollEnd = "onscrollend" in points;

    points.addEventListener("scroll", updateActiveByHorizontalScroll, { passive: true });
    points.addEventListener("touchend", queueHorizontalSnap, { passive: true });

    if (hasScrollEnd) {
      points.addEventListener("scrollend", snapToClosestHorizontalCard);
    }
  }

  if (typeof ResizeObserver !== "undefined" && points) {
    const resizeObserver = new ResizeObserver(queueLayoutUpdate);

    resizeObserver.observe(points);
    cards.forEach((card) => resizeObserver.observe(card));
  }
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initFeatureSec, { once: true });
} else {
  initFeatureSec();
}
