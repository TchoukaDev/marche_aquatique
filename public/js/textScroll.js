import { Pages } from "./Pages.js";

export class TextScroll extends Pages {
  constructor(container, containerId, texte, texteId) {
    super();
    container = document.querySelector(`#${containerId}`);
    texte = document.querySelector(`#${texteId}`);
    this.textScrollLeft(container, texte);
    this.textScrollRight(container, texte);
  }

  /**
   * Fait défiler le texte de gauche à droite de manière fluide
   * @param {HTMLElement} container - L'élément conteneur qui définit la zone de défilement
   * @param {HTMLElement} texte - L'élément texte à faire défiler
   */
  textScrollRight(container, texte) {
    const id = container.id;
    const largeur_texte = texte.offsetWidth;
    const positions = {};
    const timestamp = {};

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

  //  * Fait défiler le texte de droite à gauche de manière fluide
  //  * Fonctionne sur le même principe que textScrollRight

  textScrollLeft(container, texte) {
    const id = container.id;
    const largeur_texte = texte.offsetWidth;
    const largeur_container = container.offsetWidth;
    const positions = {};
    const timestamp = {};

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
}
