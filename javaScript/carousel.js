let currentIndex = 0;

function moveSlide(direction) {
  const slides = document.querySelectorAll(".carousel-slide");
  const totalSlides = slides.length;

  // Supprimer la classe active de la diapositive actuelle
  slides[currentIndex].classList.remove("active");

  // Calculer le nouvel index
  currentIndex = (currentIndex + direction + totalSlides) % totalSlides;

  // Ajouter la classe active à la nouvelle diapositive
  slides[currentIndex].classList.add("active");

  // Déplacer le carousel
  const carousel = document.querySelector(".carousel");
  carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Défilement automatique toutes les 3 secondes
setInterval(() => {
  moveSlide(1);
}, 3000);

// Animer le message d'accueil
const successMessage = document.getElementById("success-message");
if (successMessage) {
  // Masquer le message après 3.5 secondes (3500 millisecondes)
  setTimeout(function () {
    successMessage.style.display = "none";
  }, 3500);
}
