import { Pages } from "./Pages.js";
import { TextScroll } from "./TextScroll.js";

export class Seances extends Pages {
  constructor() {
    super();
    new TextScroll("container_horaires", "texte_horaires", "right");
    new TextScroll("container_sites", "texte_sites", "left");
  }
}
