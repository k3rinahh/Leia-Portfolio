function toggleMenu() {
      const nav = document.getElementById("navbar");
      nav.classList.toggle("active");
}

window.addEventListener("scroll", function() {
  const header = document.querySelector("header");
  if (window.scrollY > 10) {
    header.classList.add("shadow");
  } else {
    header.classList.remove("shadow");
  }
});