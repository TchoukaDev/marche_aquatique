
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


let date = document.querySelector(".date")
date.classList.add('date')
afficher_date()
setInterval(afficher_date, 1000)
 function afficher_date() {
let date_du_jour = new Date()
  date.textContent = date_du_jour.toLocaleString(navigator.language, {
  weekday: "short",
  year: "numeric",
  month: "short",
  day: "numeric",
  hour: "numeric",
  minute: "numeric"
})
}


let ville = "Biscarrosse"
const url = `https://api.openweathermap.org/data/2.5/weather?q=biscarrosse&appid=22432402c2786a96615d7d83baadf410&units=metric&lang=fr`
afficherMeteo();
setInterval(afficherMeteo, 120000 );

function afficherMeteo(){
  let requete = new XMLHttpRequest();
  requete.open("GET", url);
  requete.responseType = "json";
  requete.send();
  requete.onload = function() {
    if (requete.readyState === XMLHttpRequest.DONE) {
      if (requete.status === 200) {
        let reponse = requete.response;

      let meteo_ville = document.querySelector("#ville")
      meteo_ville.innerHTML = ville

      let temps = reponse.weather[0].description;
        document.querySelector("#description_meteo").textContent = temps;

        let icone = reponse.weather[0].icon;
        let icon_url = `https://openweathermap.org/img/wn/${icone}@2x.png`;
        let container_icone_meteo = document.querySelector("#container_icone_meteo")
        container_icone_meteo.innerHTML = "";
        let icone_meteo = document.createElement("img");
        icone_meteo.src = icon_url
        container_icone_meteo.append(icone_meteo)

        let temperature = reponse.main.temp;
        document.querySelector("#temperature").textContent =`${Math.round(temperature)}°C`;
      
      }
    else {
      alert("une erreur est survenue")
    }
    }
  }
}