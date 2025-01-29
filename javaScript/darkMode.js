document.getElementById("theme-toggle").addEventListener("click", function () {
  document.body.classList.toggle("dark-mode");

  // Basculer toutes les autres sections
  document
    .querySelectorAll(
      "header, .container, nav ul li a, .row a, .row-1 a, .row-2 a, .row-3 a, .row-4 a, .row-5 a"
    )
    .forEach(function (el) {
      el.classList.toggle("dark-mode");
    });

  // Mémoriser la préférence de l'utilisateur
  if (document.body.classList.contains("dark-mode")) {
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.setItem("theme", "light");
  }
});

// Charger la préférence de l'utilisateur lors de l'ouverture de la page
window.addEventListener("load", function () {
  if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-mode");
    document
      .querySelectorAll(
        "header, .container, nav ul li a, .row a, .row-1 a, .row-2 a, .row-3 a, .row-4 a, .row-5 a"
      )
      .forEach(function (el) {
        el.classList.add("dark-mode");
      });
  }
});
