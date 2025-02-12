const positions = {};
const timestamp = {}

function textScrollRight(container, texte) {
  const id = container.id
  const largeur_texte = texte.offsetWidth;
  const largeur_container = container.offsetWidth


  if(!positions[id]) {
    positions[id] = -largeur_texte;
    timestamp[id] = 0;
  }

  function step(currentTimestamp) {
  
  if (!timestamp[id]) timestamp[id] = currentTimestamp;
  const elapsed = currentTimestamp - timestamp[id];

  if (elapsed >= 16) {
    const largeur_texte = texte.offsetWidth;
    const largeur_container = container.offsetWidth;
    positions[id] += 1.5

    if (positions[id] >= largeur_container) {
    positions[id] = -largeur_texte;
  }

  texte.style.transform = `translateX(${positions[id]}px)`;
  timestamp[id] = currentTimestamp;
}
  requestAnimationFrame(step);
 }

 requestAnimationFrame(step);
}



 function textScrollLeft(container, texte) {
   const id = container.id;
   const largeur_texte = texte.offsetWidth;
   const largeur_container = container.offsetWidth;
 
   if (!positions[id]) {
     positions[id] = largeur_container;
     timestamp[id] = 0
   }
 
   function step(currentTimestamp) {
     if (!timestamp[id]) timestamp[id] = currentTimestamp;
     const elapsed = currentTimestamp - timestamp[id];
 
     if (elapsed >= 16) { // Environ 60 FPS
      const largeur_texte = texte.offsetWidth;
      const largeur_container = container.offsetWidth;
       positions[id] -= 1.5;
 
       if (positions[id] <= -largeur_texte) {
         positions[id] = largeur_container;
       }
 
       texte.style.transform = `translateX(${positions[id]}px)`;
       timestamp[id] = currentTimestamp;
     }
 
     requestAnimationFrame(step);
   }
 
   requestAnimationFrame(step);
 }





function pageIndex() {

  let facebook = document.getElementById("facebook");
  facebook.addEventListener("click", () => {
      window.open("https://www.facebook.com/share/18P1oWswhE/", "_blank");
  })
  ;
     
  
      // Liste des images Ã  mettre Ã  jour
  const images = document.querySelectorAll("img");
  
  // Appliquer un timestamp unique Ã  chaque image
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
  
  const ville = "Biscarrosse"
  const url = `https://api.openweathermap.org/data/2.5/weather?q=${ville}&appid=22432402c2786a96615d7d83baadf410&units=metric&lang=fr`;

  async function afficherMeteo() {

    const spinner = document.querySelector("#spinner");
    const meteo_contenu = document.querySelector("#meteo_contenu");
  

    spinner.classList.remove("hidden");
    meteo_contenu.classList.add("hidden");
  
    try {
      const requete = await fetch(url);
      if (requete.ok) {
        const reponse = await requete.json();
  

        document.querySelector("#ville").textContent = ville;
        document.querySelector("#description_meteo").textContent = reponse.weather[0].description;
  
        const icone = reponse.weather[0].icon;
        const icon_url = `https://openweathermap.org/img/wn/${icone}@2x.png`;
        const container_icone_meteo = document.querySelector("#container_icone_meteo");
        container_icone_meteo.innerHTML = `<img src="${icon_url}" alt="Icone météo">`;
  
        const temperature = reponse.main.temp;
        document.querySelector("#temperature").textContent = `${Math.round(temperature)}°C`;
  
  
        spinner.classList.add("hidden");
        meteo_contenu.classList.remove("hidden");
      
      }
    } catch (error) {
      console.error(error.message);
      document.querySelector("#meteo_contenu").innerHTML = "<p>Erreur : Impossible de charger les données météo.</p>";
      spinner.classList.add("hidden");
      meteo_contenu.classList.remove("hidden");
    }
  }
  
    afficherMeteo();
    setInterval(afficherMeteo, 300000)
}


function pagePresentation(){

const container_club = document.querySelector("#container_club");
const texte_club = document.querySelector("#texte_club");
const container_animateurs= document.querySelector("#container_animateurs");
const texte_animateurs = document.querySelector("#texte_animateurs");

textScrollLeft(container_club, texte_club)
textScrollRight(container_animateurs, texte_animateurs)
}


function pageSeances() {

  const container_horaires = document.querySelector("#container_horaires");
  const texte_horaires = document.querySelector("#texte_horaires");
  const container_sites= document.querySelector("#container_sites");
  const texte_sites = document.querySelector("#texte_sites");

  textScrollLeft(container_horaires, texte_horaires)
  textScrollRight(container_sites, texte_sites)
}

function pageMarcheAquatique() {
  const container_marche = document.querySelector("#container_marche");
  const texte_marche = document.querySelector("#texte_marche");
  const container_bienfaits = document.querySelector("#container_bienfaits");
  const texte_bienfaits = document.querySelector("#texte_bienfaits")

  textScrollLeft(container_marche, texte_marche)
  textScrollRight(container_bienfaits, texte_bienfaits)
}


if (window.location.href.includes('index')) {
  pageIndex();
}

else if (window.location.href.includes("presentation")) {
  pagePresentation();
}

 else if (window.location.href.includes('seances')) {
  
  pageSeances();
}

else if (window.location.href.includes("marche_aquatique")) {
  pageMarcheAquatique()
}