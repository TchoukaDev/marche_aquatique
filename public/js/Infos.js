import { Pages } from "./Pages.js";

export class Infos extends Pages {
  constructor() {
    super();
    this.addInfoBtn = document.querySelector("#addInfoBtn");
    this.closeAddInfoBtn = document.querySelector("#closeAddInfoBtn");
    this.addInfoForm = document.querySelector("#addInfoForm");
    this.modals = document.querySelectorAll('[id^="modal_"]');
    this.updateInfoBtns = document.querySelectorAll(`[id^="updateInfoBtn_"]`);

    this.modalFunction();
    this.openInfoForm();
    this.closeInfoForm();
    this.toggleUpdateForm();
  }
  // Formulaire de création de contenu
  openInfoForm() {
    this.addInfoBtn.addEventListener("click", () => {
      this.addInfoBtn.classList.toggle("hidden");
      this.addInfoForm.classList.toggle("hidden");
      this.closeAddInfoBtn.classList.toggle("hidden");
    });
  }

  closeInfoForm() {
    this.closeAddInfoBtn.addEventListener("click", () => {
      this.addInfoBtn.classList.toggle("hidden");
      this.addInfoForm.classList.toggle("hidden");
      this.closeAddInfoBtn.classList.toggle("hidden");
    });
  }

  // Formulaire de modification de contenu
  toggleUpdateForm() {
    this.updateInfoBtns.forEach((updateBtn) => {
      const infoId = updateBtn.id.split("_")[1];
      const updateForm = document.querySelector(`#updateInfoForm_${infoId}`);
      const closeUpdateBtn = document.querySelector(
        `#closeUpdateInfoBtn_${infoId}`,
      );

      // Ouvrir formulaire
      updateBtn.addEventListener("click", () => {
        updateBtn.classList.toggle("hidden");
        updateForm.classList.toggle("hidden");
        closeUpdateBtn.classList.toggle("hidden");
      });

      // Fermer formulaire
      closeUpdateBtn.addEventListener("click", () => {
        updateBtn.classList.toggle("hidden");
        updateForm.classList.toggle("hidden");
        closeUpdateBtn.classList.toggle("hidden");
      });
    });
  }
  // Modale de confirmation de suppression de contenu
  modalFunction() {
    // Fonction de fermeture accessible à tous les eventListeners
    const closeModal = (modal) => {
      modal.classList.remove("show");
      setTimeout(() => {
        if (!modal.classList.contains("show")) {
          modal.style.display = "none";
        }
      }, 300);
    };

    this.modals.forEach((modal) => {
      const infoId = modal.getAttribute("id").split("_")[1];

      const deleteBtn = document.querySelector(`#deleteInfoBtn_${infoId}`);
      const closeBtn = document.querySelector(`#closeModalBtn_${infoId}`);
      const closeFooterBtn = document.querySelector(
        `#closeFooterModalBtn_${infoId}`,
      );

      // Ajout des event listeners
      deleteBtn.addEventListener("click", () => {
        modal.style.display = "flex";
        setTimeout(() => modal.classList.add("show"), 10);
      });

      closeBtn.addEventListener("click", () => {
        closeModal(modal);
      });

      closeFooterBtn.addEventListener("click", () => {
        closeModal(modal);
      });

      modal.addEventListener("click", (e) => {
        if (e.target === modal) {
          closeModal(modal);
        }
      });
    });
  }
}
