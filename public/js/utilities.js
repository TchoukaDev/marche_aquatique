// Initialise le bouton toggle pour la navbar responsive
// Gère l'affichage/masquage du menu sur mobile
export function initialiserToggleNavbar() {
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

export function afficher_date() {
  let date = document.querySelector(".date");
  let date_du_jour = new Date();
  date.textContent = date_du_jour.toLocaleString(navigator.language, {
    weekday: "short",
    year: "numeric",
    month: "short",
    day: "numeric",
    hour: "numeric",
    minute: "numeric",
  });
}

export function facebookBtn() {
  // Gestion du bouton Facebook
  let facebook = document.getElementById("facebook");
  facebook.addEventListener("click", () => {
    window.open("https://www.facebook.com/share/18P1oWswhE/", "_blank");
  });
}

export function timeStampImg() {
  // Mise à jour des images avec timestamp pour éviter le cache
  const images = document.querySelectorAll("img");

  // Appliquer un timestamp unique à chaque image
  images.forEach((image) => {
    const src = image.getAttribute("src");
    image.setAttribute("src", src + "?v=" + new Date().getTime());
  });
}
