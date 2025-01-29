//supModi.js
function modifierTache(idTache) {
  // Rediriger vers la page de mise à jour avec l'ID de la tâche
  window.location.href =
    "../controllers/tacheUpdateCtrl.php?id_tache=" + idTache;
}
function supprimerTache(idTache) {
  // Rediriger vers la page de mise à jour avec l'ID de la tâche
  window.location.href =
    "../controllers/tacheDeleteCtrl.php?id_tache=" + idTache;
}

// function supprimerTache() {
//   // Exemple : Rediriger vers une page pour ajouter une nouvelle tâche
//   window.location.href = "../controllers/tacheDeleteCtrl.php";
// }

// function confirmerSuppression(tacheId) {
//   const confirmation = confirm(
//     "Êtes-vous sûr de vouloir supprimer cette tâche ?"
//   );

//   if (confirmation) {
//     const formSupprimer = document.getElementById("formSupprimer");
//     if (formSupprimer) {
//       // Soumission du formulaire de suppression
//       formSupprimer.submit();
//     } else {
//       console.error("Le formulaire de suppression n'existe pas.");
//     }

//     const tacheElement = document.getElementById(`tache-${tacheId}`);
//     if (tacheElement) {
//       // Suppression visuelle de la tâche dans la liste
//       tacheElement.remove();
//     } else {
//       console.error("L'élément tâche à supprimer n'existe pas.");
//     }
//   }
// }

function confirmerUpdate() {
  // Afficher la boîte de dialogue de confirmation
  const confirmation = confirm(
    "Êtes-vous sûr de vouloir mettre à jours cette tâche ?"
  );
  if (confirmation) {
    // Si l'utilisateur confirme, soumettre le formulaire
    document.getElementById("form-update").submit();
  }
}
function confirmerDelete() {
  // Afficher la boîte de dialogue de confirmation
  const confirmation = confirm(
    "Êtes-vous sûr de vouloir Supprimer cette tâche ?"
  );
  if (confirmation) {
    // Si l'utilisateur confirme, soumettre le formulaire
    document.getElementById("form-delete").submit();
  }
}

function remplirChamps() {
  var select = document.getElementById("tache");
  var optionSelected = select.options[select.selectedIndex];

  // Remplir les champs avec les données de l'option sélectionnée
  document.getElementById("titre").value =
    optionSelected.getAttribute("data-titre") || "";
  document.getElementById("description").value =
    optionSelected.getAttribute("data-description") || "";
  document.getElementById("date_echeance").value =
    optionSelected.getAttribute("data-date") || "";

  // Pour le statut, on peut le sélectionner également
  var statutSelect = document.getElementById("statut");
  for (var i = 0; i < statutSelect.options.length; i++) {
    if (
      statutSelect.options[i].value ===
      optionSelected.getAttribute("data-statut")
    ) {
      statutSelect.selectedIndex = i;
      break;
    }
  }
}
