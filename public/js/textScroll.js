export class TextScroll {
  constructor(containerId, texteId, direction) {
    this.container = document.querySelector(`#${containerId}`);
    this.texte = document.querySelector(`#${texteId}`);
    this.direction = direction;

    // On lance l’animation seulement si les éléments existent
    if (this.container && this.texte) {
      this.startScroll(this.direction);
    }
  }

  /**
   * Lance l’animation du texte défilant
   * @param {"left"|"right"} direction - sens du défilement
   */
  startScroll(direction) {
    const container = this.container;
    const texte = this.texte;

    // Position initiale du texte selon la direction
    let pos = direction === "left" ? container.offsetWidth : -texte.offsetWidth;
    let lastTime = 0;

    /**
     * Fonction d’animation appelée à chaque frame
     * @param {number} currentTimestamp - temps en ms depuis le chargement de la page
     */
    function step(currentTimestamp) {
      if (!lastTime) lastTime = currentTimestamp;
      const elapsed = currentTimestamp - lastTime;

      if (elapsed >= 16) {
        // ~60 FPS
        // On déplace le texte selon la direction
        pos += direction === "left" ? -1.5 : 1.5;

        // Réinitialisation de la position si le texte sort de l’écran
        if (direction === "left" && pos <= -texte.offsetWidth) {
          pos = container.offsetWidth;
        } else if (direction === "right" && pos >= container.offsetWidth) {
          pos = -texte.offsetWidth;
        }

        // Application du déplacement
        texte.style.transform = `translateX(${pos}px)`;

        // Mise à jour du temps
        lastTime = currentTimestamp;
      }

      requestAnimationFrame(step);
    }

    requestAnimationFrame(step);
  }
}
