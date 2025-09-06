// ===== script.js =====

// === Mobile Menu Toggle ===
document.addEventListener("DOMContentLoaded", function () {
  const nav = document.querySelector(".nav-links");
  const toggleBtn = document.createElement("div");

  toggleBtn.classList.add("menu-toggle");
  toggleBtn.innerHTML = "&#9776;"; // hamburger icon
  document.querySelector(".navbar").appendChild(toggleBtn);

  toggleBtn.addEventListener("click", () => {
    nav.classList.toggle("active");
    toggleBtn.classList.toggle("open");

    if (toggleBtn.classList.contains("open")) {
      toggleBtn.innerHTML = "&times;"; // X icon
    } else {
      toggleBtn.innerHTML = "&#9776;";
    }
  });
});

// === Smooth Scroll for internal links ===
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute("href")).scrollIntoView({
      behavior: "smooth"
    });
  });
});

// === Hero Image Slider Enhancement ===
let currentSlide = 0;
function showSlides() {
  const slides = document.querySelectorAll(".hero-slider img");
  slides.forEach((slide, index) => {
    slide.style.opacity = index === currentSlide ? "1" : "0";
  });
  currentSlide = (currentSlide + 1) % slides.length;
}
setInterval(showSlides, 5000); // change slide every 5 sec
