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

// Menu toggle (punyamu yang lama tetap ada di sini)

document.addEventListener("DOMContentLoaded", function() {
  console.log("✅ JS loaded!");

  const modal = document.getElementById("commissionModal");
  const btn = document.getElementById("openFormBtn");
  const span = document.querySelector(".close");

  console.log("modal:", modal);
  console.log("btn:", btn);
  console.log("span:", span);

  if (btn) {
    btn.onclick = function() {
      console.log("👉 Tombol commission diklik!");
      modal.style.display = "block";
    }
  }

  if (span) {
    span.onclick = function() {
      console.log("👉 Tombol close diklik!");
      modal.style.display = "none";
    }
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
});
