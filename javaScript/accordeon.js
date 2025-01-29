// Sélectionnez tous les éléments avec la classe 'toggleText'
const toggles = document.querySelectorAll(".toggleText");

toggles.forEach((toggle) => {
  toggle.addEventListener("click", function () {
    // Trouver l'élément parent le plus proche qui contient 'cadre'
    const parent = toggle.closest(".cadre");
    // Trouver le div 'text-container-accordeon' à l'intérieur du parent
    const textContainer = parent.querySelector(".text-container-accordeon");
    // Basculer la classe 'active' sur ce conteneur
    textContainer.classList.toggle("active");
  });
});
