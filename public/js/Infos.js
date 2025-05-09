import { Pages } from "./Pages.js";

export class Infos extends Pages {
  constructor() {
    super();
    this.addArticleBtn = document.querySelector("#addArticleBtn");
    this.closeAddArticleBtn = document.querySelector("#closeAddArticleBtn");
    this.addArticleForm = document.querySelector("#addArticleForm");
    this.modals = document.querySelectorAll('[id^="modal_"]');
    this.updateArticleBtns = document.querySelectorAll(
      `[id^="updateArticleBtn_"]`
    );

    this.modalFunction();
    this.openArticleForm();
    this.closeArticleForm();
    this.toggleUpdateForm();
  }
  // Formulaire de création de contenu
  openArticleForm() {
    this.addArticleBtn.addEventListener("click", () => {
      this.addArticleBtn.classList.toggle("hidden");
      this.addArticleForm.classList.toggle("hidden");
      this.closeAddArticleBtn.classList.toggle("hidden");
    });
  }

  closeArticleForm() {
    this.closeAddArticleBtn.addEventListener("click", () => {
      this.addArticleBtn.classList.toggle("hidden");
      this.addArticleForm.classList.toggle("hidden");
      this.closeAddArticleBtn.classList.toggle("hidden");
    });
  }

  // Formulaire de modification de contenu
  toggleUpdateForm() {
    this.updateArticleBtns.forEach((updateBtn) => {
      const articleId = updateBtn.id.split("_")[1];
      const updateForm = document.querySelector(
        `#updateArticleForm_${articleId}`
      );
      const closeUpdateBtn = document.querySelector(
        `#closeUpdateArticleBtn_${articleId}`
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
      const articleId = modal.getAttribute("id").split("_")[1];

      const deleteBtn = document.querySelector(
        `#deleteArticleBtn_${articleId}`
      );
      const closeBtn = document.querySelector(`#closeModalBtn_${articleId}`);
      const closeFooterBtn = document.querySelector(
        `#closeFooterModalBtn_${articleId}`
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
          console.log(
            `Fermeture via clic extérieur pour l'article ${articleId}`
          );
          closeModal(modal);
        }
      });
    });
  }
}
