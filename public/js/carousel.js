export function carousel() {
  let slideIndex = 0;
  showSlide(slideIndex);

  function changeSlide(n) {
    showSlide((slideIndex += n)); //-1 pour le bouton Prev +1 pour le bouton Next
  }

  function showSlide(n) {
    let currentSlide = n;
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");

    if (n >= slides.length) {
      currentSlide = 0; //Si on part après la dernière slide (n = slides.length), on revient à la première slide
    } else if (n < 0) {
      currentSlide = slides.length - 1; //Si on part avant la 1ère slide (index 0) on revient au dernier élément//
    }

    slides.forEach((slide) => slide.classList.remove("current"));
    dots.forEach((dot) => dot.classList.remove("current"));

    slides[currentSlide].classList.add("current");
    dots[currentSlide].classList.add("current");

    slideIndex = currentSlide; //à chaque affichage de slide, on met à jour l'index de la slide affichée
  }

  let interval = setInterval(() => {
    changeSlide(1);
  }, 5000);

  const carouselContainer = document.querySelector(".carousel-container");

  carouselContainer.addEventListener("mouseenter", () => {
    clearInterval(interval);
  });

  carouselContainer.addEventListener("mouseleave", () => {
    interval = setInterval(() => {
      changeSlide(1);
    }, 3000);
  });

  document.querySelectorAll(".dot").forEach((dot, i) => {
    dot.addEventListener("click", () => {
      showSlide(i);
    });
  });

  document.querySelector(".prev").addEventListener("click", () => {
    changeSlide(-1);
  });

  document.querySelector(".next").addEventListener("click", () => {
    changeSlide(1);
  });
}
