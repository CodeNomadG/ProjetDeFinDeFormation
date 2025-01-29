document.addEventListener("DOMContentLoaded", (event) => {
  class Utilisateur {
    constructor(email, mdp) {
      this.email = email;
      this.mdp = mdp;
    }

    validerDonnees() {
      // Vérifier si les champs sont vides
      if (!this.email || !this.mdp) {
        console.error("Les champs ne doivent pas être vides");
        return false;
      }

      // Vérifier le format de l'email
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(this.email)) {
        console.error("Le format de l'email est incorrect");
        return false;
      }

      // Vérifier la longueur du mot de passe (au moins 8 caractères)
      if (this.mdp.length < 8) {
        console.error("Le mot de passe doit comporter au moins 8 caractères");
        return false;
      }

      return true;
    }

    enregistrerUtilisateur() {
      if (this.validerDonnees()) {
        // Logique pour enregistrer l'utilisateur dans la base de données
        console.log("Utilisateur enregistré :", this);
        return true;
      } else {
        console.error(
          "Données invalides, l'utilisateur n'a pas été enregistré."
        );
        return false;
      }
    }
  }

  // Basculer la visibilité du mot de passe pour la page de connexion
  const togglePassword = document.getElementById("togglePassword");
  if (togglePassword) {
    togglePassword.addEventListener("click", function () {
      const passwordField = document.getElementById("mdp1");
      const type =
        passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
    });
  }

  // Basculer la visibilité du mot de passe pour la page d'inscription
  const togglePassword1 = document.getElementById("togglePassword1");
  if (togglePassword1) {
    togglePassword1.addEventListener("click", function () {
      const passwordField1 = document.getElementById("passwordField1");
      const type1 =
        passwordField1.getAttribute("type") === "password"
          ? "text"
          : "password";
      passwordField1.setAttribute("type", type1);
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
    });
  }

  const togglePassword2 = document.getElementById("togglePassword2");
  if (togglePassword2) {
    togglePassword2.addEventListener("click", function () {
      const passwordField2 = document.getElementById("passwordField2");
      const type2 =
        passwordField2.getAttribute("type") === "password"
          ? "text"
          : "password";
      passwordField2.setAttribute("type", type2);
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
    });
  }

  // Animer le message d'accueil
  const successMessage = document.getElementById("success-message");
  if (successMessage) {
    // Masquer le message après 3.5 secondes (3500 millisecondes)
    setTimeout(function () {
      successMessage.style.opacity = "0"; // Commence à s'estomper
      setTimeout(function () {
        successMessage.style.display = "none"; // Le masque complètement après l'estompage
      }, 1000); // Délai de 1 seconde pour correspondre à la durée de la transition CSS
    }, 3500);
  }
});
