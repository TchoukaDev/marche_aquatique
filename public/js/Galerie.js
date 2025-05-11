import { Pages } from "./Pages.js";

export class Galerie extends Pages {
  constructor() {
    super();
    this.carousel();
  }

  carousel() {
    let slideIndex = 0;
    showSlide(slideIndex);

    function changeSlide(n) {
      showSlide((slideIndex += n)); //-1 pour le bouton Prev +1 pour le bouton Next
    }

    function showSlide(n) {
      let currentSlide = n;
      const slides = document.querySelectorAll(".slide");
      const thumbnails = document.querySelectorAll(".thumbnail");

      if (n >= slides.length) {
        currentSlide = 0; //Si on part après la dernière slide (n = slides.length), on revient à la première slide
      } else if (n < 0) {
        currentSlide = slides.length - 1; //Si on part avant la 1ère slide (index 0) on revient au dernier élément//
      }

      slides.forEach((slide) => slide.classList.remove("current"));
      thumbnails.forEach((thumbnail) => thumbnail.classList.remove("current"));

      slides[currentSlide].classList.add("current");
      thumbnails[currentSlide].classList.add("current");

      slideIndex = currentSlide; //à chaque affichage de slide, on met à jour l'index de la slide affichée
    }

    let interval = setInterval(() => {
      changeSlide(1);
    }, 5000);

    const thumbnails = document.querySelectorAll(".thumbnail");

    thumbnails.forEach((thumbnail, i) => {
      thumbnail.addEventListener("mouseenter", () => {
        clearInterval(interval);
      });

      thumbnail.addEventListener("mouseleave", () => {
        interval = setInterval(() => {
          changeSlide(1);
        }, 5000);
      });

      thumbnail.addEventListener("click", () => {
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
}
