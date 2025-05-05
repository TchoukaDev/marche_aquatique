export function contactForm() {
  let mail = document.querySelector("#mail");
  let telephone = document.querySelector("#telephone");
  let formulaire = document.querySelector("#contact_formulaire");
  let erreur_formulaire = document.querySelector("#erreur_formulaire");
  let choix_mail = document.querySelector("#choix_mail");
  let choix_telephone = document.querySelector("#choix_telephone");
  let erreur_choix_formulaire = document.querySelector(
    "#erreur_choix_formulaire"
  );

  formulaire.addEventListener("submit", (e) => {
    e.preventDefault(); // Empêche la soumission classique du formulaire

    // Réinitialise les messages d'erreur
    erreur_formulaire.innerHTML = "";

    let mail_value = mail.value.trim(); //Récupère la valeur saisie dans mail sans se préoccuper des espaces
    let telephone_value = telephone.value.trim();

    // Vérifie si les champs mail et téléphone sont vides
    if (mail_value === "" && telephone_value === "") {
      let erreur = document.createElement("div");
      erreur.textContent =
        "Veuillez renseigner votre adresse mail ou numéro de téléphone";
      erreur.style.color = "red";
      erreur_formulaire.appendChild(erreur);
    } else if (!choix_mail.checked && !choix_telephone.checked) {
      let erreur_choix = document.createElement("div");
      erreur_choix.textContent = "Veuillez choisir un moyen de contact:";
      erreur_choix.style.color = "red";
      erreur_choix_formulaire.appendChild(erreur_choix);
    } else {
      // Si tout va bien, montre un message de confirmation
      formulaire.textContent =
        "Merci d'avoir pris contact avec nous, nous reviendrons vers vous dans les plus brefs délais pour vous répondre. ";
    }
  });
}
