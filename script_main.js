// Gestion des animations de texte défilant
// Stockage des positions et timestamps pour chaque conteneur
const positions = {};
const timestamp = {};

/**
 * Fait défiler le texte de gauche à droite de manière fluide
 * @param {HTMLElement} container - L'élément conteneur qui définit la zone de défilement
 * @param {HTMLElement} texte - L'élément texte à faire défiler
 */
function textScrollRight(container, texte) {
  const id = container.id;
  const largeur_texte = texte.offsetWidth;

  // Initialisation des positions si c'est la première fois
  // Le texte commence hors écran à gauche (-largeur_texte)
  if (!positions[id]) {
    positions[id] = -largeur_texte;
    timestamp[id] = 0;
  }

  /**
   * Fonction d'animation appelée à chaque frame
   * Utilise requestAnimationFrame pour synchroniser avec le rafraîchissement écran
   * @param {number} currentTimestamp - Timestamp fourni par requestAnimationFrame
   */
  function step(currentTimestamp) {
    // Initialisation du timestamp au premier appel
    if (!timestamp[id]) timestamp[id] = currentTimestamp;
    const elapsed = currentTimestamp - timestamp[id];

    // Limite l'animation à ~60 FPS (1000ms/60 ≈ 16ms)
    if (elapsed >= 16) {
      const largeur_texte = texte.offsetWidth;
      const largeur_container = container.offsetWidth;
      // Déplace le texte de 1.5px vers la droite
      positions[id] += 1.5;

      // Réinitialise la position quand le texte sort du conteneur par la droite
      if (positions[id] >= largeur_container) {
        positions[id] = -largeur_texte;
      }

      // Applique la transformation CSS pour déplacer le texte
      texte.style.transform = `translateX(${positions[id]}px)`;
      timestamp[id] = currentTimestamp;
    }
    requestAnimationFrame(step);
  }

  requestAnimationFrame(step);
}

/**
 * Fait défiler le texte de droite à gauche de manière fluide
 * Fonctionne sur le même principe que textScrollRight
 * @param {HTMLElement} container - L'élément conteneur qui définit la zone de défilement
 * @param {HTMLElement} texte - L'élément texte à faire défiler
 */
function textScrollLeft(container, texte) {
  const id = container.id;
  const largeur_texte = texte.offsetWidth;
  const largeur_container = container.offsetWidth;

  // Le texte commence à droite du conteneur
  if (!positions[id]) {
    positions[id] = largeur_container;
    timestamp[id] = 0;
  }

  function step(currentTimestamp) {
    if (!timestamp[id]) timestamp[id] = currentTimestamp;
    const elapsed = currentTimestamp - timestamp[id];

    if (elapsed >= 16) {
      // ~60 FPS
      const largeur_texte = texte.offsetWidth;
      const largeur_container = container.offsetWidth;
      // Déplace le texte de 1.5px vers la gauche
      positions[id] -= 1.5;

      // Réinitialise la position quand le texte sort du conteneur par la gauche
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

document.addEventListener("DOMContentLoaded", () => {
  // Initialise le bouton toggle pour la navbar responsive
  // Gère l'affichage/masquage du menu sur mobile
  function initialiserToggleNavbar() {
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

  // Initialisation spécifique pour la page d'accueil
  // Gère le bouton Facebook, la date et la météo
  function pageIndex() {
    // Gestion du bouton Facebook
    let facebook = document.getElementById("facebook");
    facebook.addEventListener("click", () => {
      window.open("https://www.facebook.com/share/18P1oWswhE/", "_blank");
    });

    // Mise à jour des images avec timestamp pour éviter le cache
    const images = document.querySelectorAll("img");

    // Appliquer un timestamp unique à chaque image
    images.forEach((image) => {
      const src = image.getAttribute("src");
      image.setAttribute("src", src + "?v=" + new Date().getTime());
    });

    // Affichage et mise à jour de la date toutes les secondes
    let date = document.querySelector(".date");
    date.classList.add("date");

    try {
      afficher_date();
      setInterval(afficher_date, 1000);
    } catch (e) {
      console.log(e.message);
    }

    function afficher_date() {
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

    // Récupération et affichage des données météo
    // Rafraîchissement toutes les 5 minutes (300000ms)
    const ville = "Biscarrosse";
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

  function carousel() {
    let slideIndex = 0;
    showSlide(slideIndex);

    function changeSlide(n) {
      showSlide((slideIndex += n)); //-1 pour le bouton Prev +1 pour le bouton Next
    }

    function showSlide(n) {
      let currentSlide = n;
      const slides = document.querySelectorAll(".slide");
      const dots = document.querySelectorAll(".dot");

      if (n >= slides.length) {
        currentSlide = 0; //Si on part après la dernière slide (n = slides.length), on revient à la première slide
      } else if (n < 0) {
        currentSlide = slides.length - 1; //Si on part avant la 1ère slide (index 0) on revient au dernier élément//
      }

      slides.forEach((slide) => slide.classList.remove("current"));
      dots.forEach((dot) => dot.classList.remove("current"));

      slides[currentSlide].classList.add("current");
      dots[currentSlide].classList.add("current");

      slideIndex = currentSlide; //à chaque affichage de slide, on met à jour l'index de la slide affichée
    }

    let interval = setInterval(() => {
      changeSlide(1);
    }, 5000);

    const carouselContainer = document.querySelector(".carousel-container");

    carouselContainer.addEventListener("mouseenter", () => {
      clearInterval(interval);
    });

    carouselContainer.addEventListener("mouseleave", () => {
      interval = setInterval(() => {
        changeSlide(1);
      }, 3000);
    });

    document.querySelectorAll(".dot").forEach((dot, i) => {
      dot.addEventListener("click", () => {
        showSlide(i);
      });
    });

    document.querySelector(".prev").addEventListener("click", () => {
      changeSlide(-1);
    });

    document.querySelector(".next").addEventListener("click", () => {
      changeSlide(1);
    });
  }

  initialiserToggleNavbar();

  // Système de routage simple basé sur l'URL
  // Appelle la fonction d'initialisation appropriée selon la page courante
  if (
    window.location.href.includes("index") ||
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
  }
});
