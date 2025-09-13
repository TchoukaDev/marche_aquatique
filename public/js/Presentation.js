import { Pages } from "./Pages.js";
import { TextScroll } from "./TextScroll.js";

export class Presentation extends Pages {
  constructor() {
    super();
    new TextScroll("container_club", "texte_club", "right");
    new TextScroll("container_animateurs", "texte_animateurs", "left");
  }
}
