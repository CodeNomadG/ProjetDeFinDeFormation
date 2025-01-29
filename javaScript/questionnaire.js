// Déclaration de la variable pour suivre la question actuelle
let currentQuestion = 1;
// Nombre total de questions dans le questionnaire
const totalQuestions = document.querySelectorAll(".question").length;

// Fonction pour valider la réponse et passer à la question suivante
function validateAndNext() {
  // Sélection de l'élément de la question actuelle
  var currentQuestionElement = document.querySelector(
    '.questionnaire .question:not([style*="display: none"])'
  );
  // Sélection de tous les éléments de type radio dans la question actuelle
  var inputs = currentQuestionElement.querySelectorAll('input[type="radio"]');
  // Variable pour indiquer si la réponse est valide ou non
  var isValid = false;

  // Vérification de chaque input radio s'il est coché
  inputs.forEach(function (input) {
    if (input.checked) {
      isValid = true; // Si au moins un est coché, la réponse est valide
    }
  });

  // Retourne vrai si la réponse est valide, sinon affiche une alerte et retourne faux
  if (isValid) {
    return true;
  } else {
    alert(
      "Veuillez répondre à la question actuelle avant de passer à la suivante."
    );
    return false;
  }
}

// Fonction pour afficher une question spécifique
function showQuestion(questionNumber) {
  // Sélectionner l'élément de la question spécifiée
  var questionElement = document.getElementById("question" + questionNumber);

  // Vérifier si l'élément existe
  if (questionElement) {
    // Masquer toutes les questions
    document.querySelectorAll(".question").forEach(function (question) {
      question.style.display = "none";
    });

    // Afficher la question spécifiée
    questionElement.style.display = "block";

    // Afficher le bouton "Soumettre" uniquement à la dernière question
    document.querySelector('button[type="submit"]').style.display =
      questionNumber === totalQuestions ? "block" : "none";
  } else {
    console.error("La question spécifiée n'existe pas.");
  }
}

// Fonction pour passer à la question suivante
function nextQuestion() {
  if (validateAndNext()) {
    // Valider la réponse avant de passer à la question suivante
    if (currentQuestion < totalQuestions) {
      currentQuestion++; // Passer à la question suivante
      showQuestion(currentQuestion); // Afficher la question suivante
    }
    if (currentQuestion === totalQuestions) {
      document.querySelector('button[type="submit"]').style.display = "block"; // Afficher le bouton Soumettre à la dernière question
    }
  }
}

// Fonction pour revenir à la question précédente
function prevQuestion() {
  if (currentQuestion > 1) {
    currentQuestion--; // Revenir à la question précédente
    showQuestion(currentQuestion); // Afficher la question précédente
  }
  document.querySelector('button[type="submit"]').style.display = "none"; // Masquer le bouton Soumettre lorsqu'on revient à une question précédente
}

// Afficher la première question au chargement de la page
showQuestion(currentQuestion);

// Gérer la soumission du formulaire
document
  .querySelector('button[type="submit"]')
  .addEventListener("click", (event) => {
    event.preventDefault(); // Empêcher le comportement par défaut du bouton Soumettre

    // Valider la réponse avant de soumettre le formulaire
    if (validateAndNext()) {
      // Soumettre le formulaire si la validation réussit
      document.getElementById("questionForm").submit();
    }
  });

// Gérer la soumission du formulaire en appuyant sur la touche Entrée
document.getElementById("questionForm").addEventListener("submit", (event) => {
  // Empêcher le comportement par défaut de la soumission du formulaire
  event.preventDefault();

  // Valider la réponse avant de soumettre le formulaire
  if (validateAndNext()) {
    // Soumettre le formulaire si la validation réussit
    document.getElementById("questionForm").submit();
  }
});
