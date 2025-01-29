/*
Gestion du click du menu burger
*/
// function toggler() {
//   const icon = document.querySelector("#toggler");
//   const menu = document.querySelector(".menu");

//   if (menu.style.display === "none" || menu.style.display === "") {
//     icon.innerHTML = "close";
//     menu.style.display = "block";
//   } else {
//     icon.innerHTML = "menu";
//     menu.style.display = "none";
//   }
// }
/**
 Gestion de click des liens dans la liste déroulante
 */

// function goToPage() {
//   var selectElement = document.querySelector(".select-1"); // Assuming this is the dropdown element
//   var selectedOption = selectElement.options[selectElement.selectedIndex];
//   var url = selectedOption.value;
//   window.location.href = url;
// }
// function goToLink() {
//   var selectElement = document.querySelector(".select-2"); // Assuming this is the dropdown element
//   var selectedOption = selectElement.options[selectElement.selectedIndex];
//   var url = selectedOption.value;
//   window.location.href = url;
// }

/*
Gestion du click du menu burger
*/

function toggler() {
  const icon = document.querySelector("#toggler i");
  const menu = document.querySelector(".menu");
  const navTache = document.querySelector(".nav-tache");

  // Vérifie si le menu existe
  if (!menu) {
    console.error("L'élément \".menu\" n'a pas été trouvé.");
    return;
  }

  // Vérifier si le menu est visible ou caché
  if (menu.style.display === "none" || menu.style.display === "") {
    icon.classList.remove("fa-user");
    icon.classList.add("fa-circle-xmark");

    menu.classList.toggle("active");
    menu.style.display = "block"; // Affiche le menu

    if (navTache) {
      navTache.classList.toggle("active");
      navTache.style.display = "none"; // Cache la nav des tâches
    }
  } else {
    icon.classList.remove("fa-circle-xmark");
    icon.classList.add("fa-user");

    menu.style.display = "none"; // Cache le menu
    if (navTache) {
      navTache.style.display = "block"; // Affiche la nav des tâches
    }
  }
}

// function toggler() {
//   const icon = document.querySelector("#toggler i");
//   const menu = document.querySelector(".menu");
//   const navTache = document.querySelector(".nav-tache");

//   // Vérifier si le menu est visible ou caché
//   if (menu.style.display === "none" || menu.style.display === "") {
//     icon.classList.remove("fa-user");
//     icon.classList.add("fa-circle-xmark");

//     menu.classList.toggle("active");
//     menu.style.display = "block";

//     navTache.classList.toggle("active");
//     navTache.style.display = "none";
//   } else {
//     icon.classList.remove("fa-circle-xmark");
//     icon.classList.add("fa-user");

//     menu.style.display = "none";
//     navTache.style.display = "block";
//   }
// }

/*
  Gestion de click des liens dans la liste déroulante
  */
function goToPage() {
  var selectElement = document.querySelector(".select-1"); // Dropdown
  var selectedOption = selectElement.options[selectElement.selectedIndex];
  var url = selectedOption.value;
  window.location.href = url;
}

function goToLink() {
  var selectElement = document.querySelector(".select-2"); // Dropdown
  var selectedOption = selectElement.options[selectElement.selectedIndex];
  var url = selectedOption.value;
  window.location.href = url;
}
