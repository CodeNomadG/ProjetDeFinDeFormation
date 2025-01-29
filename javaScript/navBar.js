/*
Gestion du click du menu burger
*/
function toggler() {
  const icon = document.querySelector("#toggler i");
  const menu = document.querySelector(".menu");

  // Vérifier si le menu est visible ou caché
  if (menu.style.display === "none" || menu.style.display === "") {
    icon.classList.remove("fa-bars");
    icon.classList.add("fa-times");
    menu.classList.toggle("active");
    menu.style.display = "block";
  } else {
    icon.classList.remove("fa-times");
    icon.classList.add("fa-bars");
    menu.style.display = "none";
  }
}

// Close the dropdown if clicked outside
window.onclick = function (event) {
  if (
    !event.target.matches(".dropdown-toggle") &&
    !event.target.matches("#toggler")
  ) {
    const dropdowns = document.getElementsByClassName("dropdown-menu");
    for (let i = 0; i < dropdowns.length; i++) {
      const openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};
