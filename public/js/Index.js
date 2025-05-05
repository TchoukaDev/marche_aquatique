import { Pages } from "./Pages.js";

export class Index extends Pages {
  constructor() {
    super();
    //Affichage et mise à jour date et météo
    this.afficher_date();
    setInterval(this.afficher_date, 1000);

    this.afficherMeteo();
    setInterval(this.afficherMeteo, 300000);

    this.facebookBtn();
  }

  async afficherMeteo() {
    const ville = "Biscarrosse";
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${ville}&appid=22432402c2786a96615d7d83baadf410&units=metric&lang=fr`;

    const spinner = document.querySelector("#spinner");
    const meteo_contenu = document.querySelector("#meteo_contenu");

    spinner.classList.remove("hidden");
    meteo_contenu.classList.add("hidden");

    try {
      const requete = await fetch(url);
      if (requete.ok) {
        const reponse = await requete.json();

        document.querySelector("#ville").textContent = ville;
        document.querySelector("#description_meteo").textContent =
          reponse.weather[0].description;

        const icone = reponse.weather[0].icon;
        const icon_url = `https://openweathermap.org/img/wn/${icone}@2x.png`;
        const container_icone_meteo = document.querySelector(
          "#container_icone_meteo"
        );
        container_icone_meteo.innerHTML = `<img src="${icon_url}" alt="Icone météo">`;

        const temperature = reponse.main.temp;
        document.querySelector("#temperature").textContent = `${Math.round(
          temperature
        )}°C`;

        spinner.classList.add("hidden");
        meteo_contenu.classList.remove("hidden");
      }
    } catch (error) {
      console.error(error.message);
      document.querySelector("#meteo_contenu").innerHTML =
        "<p>Erreur : Impossible de charger les données météo.</p>";
      spinner.classList.add("hidden");
      meteo_contenu.classList.remove("hidden");
    }
  }

  afficher_date() {
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

  facebookBtn() {
    // Gestion du bouton Facebook
    let facebook = document.getElementById("facebook");
    facebook.addEventListener("click", () => {
      window.open("https://www.facebook.com/share/18P1oWswhE/", "_blank");
    });
  }
}
