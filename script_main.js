
  //_blank permet d'ouvrir un nouvel onglet plutôt qu'une nouvelle fenêtre//
let facebook = document.getElementById("facebook");
if (facebook) {
facebook.addEventListener("click", () => {
    window.open("https://www.facebook.com/share/18P1oWswhE/", "_blank");
})
};
   

    // Liste des images à mettre à jour
const images = document.querySelectorAll("img");

// Appliquer un timestamp unique à chaque image
images.forEach(image => {
  const src = image.getAttribute("src");
  image.setAttribute("src", src + "?v=" + new Date().getTime());
});

let date_du_jour = new Date()
let date = document.querySelector(".date")
date.textContent = date_du_jour.toLocaleString(navigator.language, {
  weekday: "short",
  year: "numeric",
  month: "short",
  day: "numeric",
  hour: "numeric",
  minute: "numeric"
})
date.classList.add('date')
