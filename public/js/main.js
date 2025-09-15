import { Index } from "./Index.js";
import { Galerie } from "./Galerie.js";
import { Infos } from "./Infos.js";
import { Contact } from "./Contact.js";
import { Presentation } from "./Presentation.js";
import { Seances } from "./Seances.js";
import { Marche } from "./Marche.js";

document.addEventListener("DOMContentLoaded", () => {
  // Système de routage simple basé sur l'URL
  // Appelle la fonction d'initialisation appropriée selon la page courante
  if (
    window.location.href.includes("accueil") ||
    window.location.href.endsWith("marcheaquatique/")
  ) {
    new Index();
  } else if (window.location.href.includes("presentation")) {
    new Presentation();
  } else if (window.location.href.includes("seances")) {
    new Seances();
  } else if (window.location.href.includes("marche_aquatique")) {
    new Marche();
  } else if (window.location.href.includes("galerie")) {
    new Galerie();
  } else if (window.location.href.includes("infos_diverses")) {
    new Infos();
  } else if (window.location.href.includes("contact")) {
    new Contact();
  }
});
