import { Index } from "./Index.js";
import { Galerie } from "./Galerie.js";
import { TextScroll } from "./TextScroll.js";
import { Infos } from "./Infos.js";
import { Contact } from "./Contact.js";

document.addEventListener("DOMContentLoaded", () => {
  // Système de routage simple basé sur l'URL
  // Appelle la fonction d'initialisation appropriée selon la page courante
  if (
    window.location.href.includes("accueil") ||
    window.location.href.endsWith("marcheaquatique/")
  ) {
    new Index();
  } else if (window.location.href.includes("presentation")) {
    new TextScroll(container_club, "container_club", texte_club, "texte_club");
    new TextScroll(
      container_animateurs,
      "container_animateurs",
      texte_animateurs,
      "texte_animateurs"
    );
  } else if (window.location.href.includes("seances")) {
    new TextScroll(
      container_horaires,
      "container_horaires",
      texte_horaires,
      "texte_horaires"
    );
    new TextScroll(
      container_sites,
      "container_sites",
      texte_horaires,
      "texte_sites"
    );
  } else if (window.location.href.includes("marche_aquatique")) {
    new TextScroll(
      container_marche,
      "container_marche",
      texte_marche,
      "texte_marche"
    );
    new TextScroll(
      container_bienfaits,
      "container_bienfaits",
      texte_bienfaits,
      "texte_bienfaits"
    );
  } else if (window.location.href.includes("galerie")) {
    new Galerie();
  } else if (window.location.href.includes("infos_diverses")) {
    new Infos();
  } else if (window.location.href.includes("contact")) {
    new Contact();
  }
});
