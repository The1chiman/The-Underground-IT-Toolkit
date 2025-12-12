function toggleMenu() {
  const nav = document.querySelector('nav');
  const hamburger = document.querySelector('.hamburger');
  nav.classList.toggle('active');
  hamburger.classList.toggle('active');
}

document.querySelectorAll("a").forEach((link) => {
  link.addEventListener("click", (e) => {
    const href = link.getAttribute("href");
    if (href && !href.startsWith("#")) {
      e.preventDefault();
      document.body.style.animation = "fadeOut 0.4s ease-in forwards";
      setTimeout(() => (window.location.href = href), 400);
    }
  });
});
