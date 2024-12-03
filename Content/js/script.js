// Obtenir toutes les images
const images = document.querySelectorAll(".dish img");
let currentIndex = -1;

// Fonction pour afficher une image en plein écran
function showImage(index) {
  const modal = document.querySelector(".modal");
  const modalImage = document.querySelector(".modal img");
  if (index >= 0 && index < images.length) {
    currentIndex = index;
    modalImage.src = images[index].src;
    modal.style.display = "flex"; // Affiche le modal
  }
}

// Fermer le plein écran
function closeModal() {
  document.querySelector(".modal").style.display = "none";
}

// Naviguer entre les images
function navigateImage(direction) {
  if (currentIndex === -1) return;
  const newIndex = (currentIndex + direction + images.length) % images.length; // Navigation circulaire
  showImage(newIndex);
}

// Ajout des événements
images.forEach((img, index) => {
  img.addEventListener("click", () => showImage(index));
});

// Gérer les touches du clavier
document.addEventListener("keydown", (event) => {
  if (currentIndex === -1) return;

  if (event.key === "ArrowRight") {
    navigateImage(1); // Image suivante
  } else if (event.key === "ArrowLeft") {
    navigateImage(-1); // Image précédente
  } else if (event.key === "Escape") {
    closeModal(); // Fermer le plein écran
  }
});

// Empêcher la fermeture en cliquant sur les flèches
document.querySelectorAll(".arrow").forEach((arrow) => {
  arrow.addEventListener("click", (event) => {
    event.stopPropagation(); // Empêche la fermeture du modal
  });
});

// Fermer le modal lorsqu'on clique ailleurs
// document.querySelector(".modal").addEventListener("click", closeModal);

// Swiper js
document.addEventListener("DOMContentLoaded", () => {
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    // grabCursor: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

// Change header bg color
window.addEventListener("scroll", () => {
  const scrollY = window.pageYOffset;
  if (scrollY > 5) {
    document.querySelector("header").classList.add("header-active");
  } else {
    document.querySelector("header").classList.remove("header-active");
  }
});

// Nav open/close logic
const body = document.querySelector("body"),
  navMenu = document.querySelector("#navbarNavDropdown"), // Le menu collapsible
  navOpenBtn = document.querySelector(".navbar-toggler"); // Bouton hamburger
if (navMenu && navOpenBtn) {
  navOpenBtn.addEventListener("click", () => {
    if (!navMenu.classList.contains("show")) {
      // Vérifie si le menu est déjà ouvert
      navMenu.classList.add("show"); // Ouvre le menu
      body.style.overflowY = "hidden"; // Empêche le scroll
    } else {
      navMenu.classList.remove("show"); // Ferme le menu si cliqué à nouveau
      body.style.overflowY = "scroll"; // Réactive le scroll
    }
  });
}

// Optionnel : Gérer un bouton de fermeture spécifique
if (navOpenBtn) {
  navOpenBtn.addEventListener("click", () => {
    navMenu.classList.remove("show"); // Ferme le menu
    body.style.overflowY = "scroll"; // Réactive le scroll
  });
}
