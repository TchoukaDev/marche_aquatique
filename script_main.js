function pageIndex() {

  //_blank permet d'ouvrir un nouvel onglet plutôt qu'une nouvelle fenêtre//
  let facebook = document.getElementById("facebook");
  facebook.addEventListener("click", () => {
      window.open("https://www.facebook.com/share/18P1oWswhE/", "_blank");
  })
  ;
     
  
      // Liste des images à mettre à jour
  const images = document.querySelectorAll("img");
  
  // Appliquer un timestamp unique à chaque image
  images.forEach(image => {
    const src = image.getAttribute("src");
    image.setAttribute("src", src + "?v=" + new Date().getTime());
  });
  
  
  let date = document.querySelector(".date")
    date.classList.add("date");
  
  
  try {
  afficher_date()
  setInterval(afficher_date, 1000)
   }
   catch(e) {
    console.log(e.message)
   }
  
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
  
  async function afficherMeteo(){
    const requete = await fetch(url, {
      method: "GET"
    })
  
    if(requete.ok) {
  
      const reponse = await requete.json()
  
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
        let container_meteo = document.querySelector("#container_meteo")
        container_meteo.remove()
        throw new Error("Impossible de charger la météo.")
      }
      }
  
}




function pageSeances() {

  const container_horaires = document.querySelector("#container_horaires")
  const texte_horaires = document.querySelector("#texte_horaires")
  let position = container_horaires.offsetWidth;
  
  
  function textScrollLeft(container, texte) {
    
    const largeur_texte = texte.offsetWidth;
      
      position -= 1.5
  
      if (position < -largeur_texte) {
          position = container.offsetWidth
      }
  
      texte.style.transform = `translateX(${position}px)`;
  
      requestAnimationFrame(() => textScrollLeft(container, texte))
  
  }
  
  textScrollLeft(container_horaires, texte_horaires)
}

// Appel des fonctions en fonction de la page
if (window.location.href.includes('index')) {
  pageIndex();

} else if (window.location.href.includes('seances')) {
  
  pageSeances();
}
