// JavaScript pour soumettre la suppression via AJAX
document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll("#formSupprimer");

  forms.forEach((form) => {
    form.addEventListener("submit", function (event) {
      event.preventDefault();

      // if (!confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?")) {
      //   return false;
      // }

      // Afficher une boîte de confirmation avant la suppression
      // const confirmation = confirm(
      //   "Êtes-vous sûr de vouloir supprimer cette tâche ?"
      // );

      // if (!confirmation) {

      //   return;
      // }

      const formData = new FormData(form);
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "../controllers/tacheDeleteCtrl.php", true);

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);

          if (response.success) {
            // alert(response.message);
            displayMessage(response.message, "success");
            // Supprime l'élément correspondant à la tâche supprimée
            const tacheElement = form.closest("tr");
            if (tacheElement) {
              tacheElement.remove();
            }
          } else {
            // alert(response.message);
            displayMessage(response.message, "error");
          }
        }
      };
      xhr.send(formData); // Envoie les données du formulaire via AJAX
    });
  });

  // Fonction pour afficher un message de succès ou d'échec
  function displayMessage(message, type) {
    const messageContainer = document.getElementById("message-container");
    const alertType = type === "success" ? "alert-success" : "alert-danger";

    messageContainer.innerHTML = `
    <div class="alert ${alertType}" role="alert">
      ${message}
    </div>`;

    // Retirer le message après 5 secondes
    setTimeout(() => {
      messageContainer.innerHTML = "";
    }, 5000);
  }
});
