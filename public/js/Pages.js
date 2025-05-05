export class Pages {
  constructor() {
    this.initialiserToggleNavbar();
    this.timeStampImg();
    // Gestion des animations de texte défilant
    // Stockage des positions et timestamps pour chaque conteneur
  }

  // Initialise le bouton toggle pour la navbar responsive
  // Gère l'affichage/masquage du menu sur mobile
  initialiserToggleNavbar() {
    const toggle_navbar = document.querySelector("#toggle_navbar");
    const navbar = document.querySelector("#navbar");

    if (navbar && toggle_navbar) {
      toggle_navbar.addEventListener("click", () => {
        navbar.classList.toggle("responsive");
        if (navbar.classList.contains("responsive")) {
          navbar.style.display = "flex";
        } else {
          navbar.style.display = "none";
        }
      });
    }
  }

  timeStampImg() {
    // Mise à jour des images avec timestamp pour éviter le cache
    const images = document.querySelectorAll("img");

    // Appliquer un timestamp unique à chaque image
    images.forEach((image) => {
      const src = image.getAttribute("src");
      image.setAttribute("src", src + "?v=" + new Date().getTime());
    });
  }
}
