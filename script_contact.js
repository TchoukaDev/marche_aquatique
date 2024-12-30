let mail = document.querySelector("#mail");
let telephone = document.querySelector("#telephone");
let formulaire = document.querySelector("#contact_formulaire");
let erreur_formulaire = document.querySelector("#erreur_formulaire");

formulaire.addEventListener("submit", (e) => {
    e.preventDefault();  // Empêche la soumission classique du formulaire

    // Réinitialise les messages d'erreur
    erreur_formulaire.innerHTML = "";  

    let mailValue = mail.value.trim();
    let telephoneValue = telephone.value.trim();

    // Vérifie si les champs mail et téléphone sont vides
    if (mailValue === "" && telephoneValue === "") {
        let error = document.createElement("div");
        error.textContent = "Veuillez sélectionner un moyen de contact.";
        error.style.color = "red";
        erreur_formulaire.appendChild(error);
    } else {
        // Si tout va bien, montre un message de confirmation
        alert("Merci pour votre envoi, nous reviendrons vers vous le plus vite possible.");
    }
});

    