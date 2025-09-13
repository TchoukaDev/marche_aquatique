import { Pages } from "./Pages.js";
import { TextScroll } from "./TextScroll.js";

export class Marche extends Pages {
  constructor() {
    super();
    new TextScroll("container_marche", "texte_marche", "right");
    new TextScroll("container_bienfaits", "texte_bienfaits", "left");
  }
}
