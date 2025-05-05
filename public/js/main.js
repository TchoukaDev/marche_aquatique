import { afficherMeteo } from "./api.js";
import { textScrollLeft, textScrollRight } from "./textScroll.js";
import { contactForm } from "./contact.js";
import {
  afficher_date,
  initialiserToggleNavbar,
  facebookBtn,
  timeStampImg,
} from "./utilities.js";
import { carousel } from "./carousel.js";

document.addEventListener("DOMContentLoaded", () => {
  function pageIndex() {
    facebookBtn();
    timeStampImg();

    // Affichage et mise à jour de la date toutes les secondes

    afficher_date();
    setInterval(afficher_date, 1000);

    afficherMeteo();
    setInterval(afficherMeteo, 300000);
  }

  // Initialisation de la page de présentation
  // Configure les animations de texte défilant
  function pagePresentation() {
    const container_club = document.querySelector("#container_club");
    const texte_club = document.querySelector("#texte_club");
    const container_animateurs = document.querySelector(
      "#container_animateurs"
    );
    const texte_animateurs = document.querySelector("#texte_animateurs");

    textScrollLeft(container_club, texte_club);
    textScrollRight(container_animateurs, texte_animateurs);
  }

  // Initialisation de la page des séances
  // Configure les animations de texte défilant
  function pageSeances() {
    const container_horaires = document.querySelector("#container_horaires");
    const texte_horaires = document.querySelector("#texte_horaires");
    const container_sites = document.querySelector("#container_sites");
    const texte_sites = document.querySelector("#texte_sites");

    textScrollLeft(container_horaires, texte_horaires);
    textScrollRight(container_sites, texte_sites);
  }

  // Initialisation de la page marche aquatique
  // Configure les animations de texte défilant
  function pageMarcheAquatique() {
    const container_marche = document.querySelector("#container_marche");
    const texte_marche = document.querySelector("#texte_marche");
    const container_bienfaits = document.querySelector("#container_bienfaits");
    const texte_bienfaits = document.querySelector("#texte_bienfaits");

    textScrollLeft(container_marche, texte_marche);
    textScrollRight(container_bienfaits, texte_bienfaits);
  }

  function pageContact() {
    contactForm();
  }

  initialiserToggleNavbar();

  // Système de routage simple basé sur l'URL
  // Appelle la fonction d'initialisation appropriée selon la page courante
  if (
    window.location.href.includes("accueil") ||
    window.location.href.endsWith("marcheaquatique/")
  ) {
    pageIndex();
  } else if (window.location.href.includes("presentation")) {
    pagePresentation();
  } else if (window.location.href.includes("seances")) {
    pageSeances();
  } else if (window.location.href.includes("marche_aquatique")) {
    pageMarcheAquatique();
  } else if (window.location.href.includes("galerie")) {
    carousel();
  } else if (window.location.href.includes("contact")) {
    pageContact();
  }
});
