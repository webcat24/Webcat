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
// Fermer le plein écran
function closeModal() {
  const modalElement = document.querySelector(".modal");
  if (modalElement) {
    modalElement.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.querySelector(".modal");
  if (modal) {
    modal.addEventListener("click", function (e) {
      if (e.target === modal) {
        closeModal();
      }
    });
  }
});

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

// footer

document.addEventListener("DOMContentLoaded", function () {
  // Récupérer tous les titres du footer
  const footerTitles = document.querySelectorAll(".footer-title");

  footerTitles.forEach((title) => {
    title.addEventListener("click", () => {
      const links = title.nextElementSibling; // Sélectionner les liens correspondants
      if (links) {
        // Basculer l'affichage des liens
        links.style.display =
          links.style.display === "block" ? "none" : "block";
      }
    });
  });
});

// pour la barre de recherche
let suggestions = [
  "Channel",
  "YouTube",
  "YouTuber",
  "YouTube Channel",
  "Blogger",
  "Bollywood",
  "Vlogger",
  "Vechiles",
  "Facebook",
  "Freelancer",
  "Facebook Page",
  "Designer",
  "Developer",
  "Web Designer",
  "Web Developer",
  "Login Form in HTML & CSS",
  "How to learn HTML & CSS",
  "How to learn JavaScript",
  "How to became Freelancer",
  "How to became Web Designer",
  "How to start Gaming Channel",
  "How to start YouTube Channel",
  "What does HTML stands for?",
  "What does CSS stands for?",
];
// getting all required elements
const searchWrapper = document.querySelector(".search-input");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");
const icon = searchWrapper.querySelector(".icon");
let linkTag = searchWrapper.querySelector("a");
let webLink;

// if user press any key and release
inputBox.onkeyup = (e) => {
  let userData = e.target.value; //user enetered data
  let emptyArray = [];
  if (userData) {
    icon.onclick = () => {
      webLink = `https://www.google.com/search?q=${userData}`;
      linkTag.setAttribute("href", webLink);
      linkTag.click();
    };
    emptyArray = suggestions.filter((data) => {
      //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
      return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
    });
    emptyArray = emptyArray.map((data) => {
      // passing return data inside li tag
      return (data = `<li>${data}</li>`);
    });
    searchWrapper.classList.add("active"); //show autocomplete box
    showSuggestions(emptyArray);
    let allList = suggBox.querySelectorAll("li");
    for (let i = 0; i < allList.length; i++) {
      //adding onclick attribute in all li tag
      allList[i].setAttribute("onclick", "select(this)");
    }
  } else {
    searchWrapper.classList.remove("active"); //hide autocomplete box
  }
};

function select(element) {
  let selectData = element.textContent;
  inputBox.value = selectData;
  icon.onclick = () => {
    webLink = `https://www.google.com/search?q=${selectData}`;
    linkTag.setAttribute("href", webLink);
    linkTag.click();
  };
  searchWrapper.classList.remove("active");
}

function showSuggestions(list) {
  let listData;
  if (!list.length) {
    userValue = inputBox.value;
    listData = `<li>${userValue}</li>`;
  } else {
    listData = list.join("");
  }
  suggBox.innerHTML = listData;
}

// script de la view palette
// Fonction pour attacher les événements aux couleurs
function attachColorEvents(colors) {
  colors.forEach((color) => {
    const colorName = color.textContent; // Sauvegarder le nom de la couleur

    // Rendre le nom visible uniquement au survol
    color.addEventListener("mouseenter", () => {
      color.style.color = "white"; // Affiche le texte au survol
    });

    color.addEventListener("mouseleave", () => {
      color.style.color = "transparent"; // Cache le texte lorsqu'on sort du carré
    });

    // Gérer le clic pour copier
    color.addEventListener("click", () => {
      const colorCode = color.getAttribute("data-color"); // Obtenir le code couleur

      // Copier dans le presse-papiers
      navigator.clipboard
        .writeText(colorCode)
        .then(() => {
          // Sauvegarder temporairement le contenu original
          const originalContent = color.textContent;

          // Afficher "Copié !" temporairement
          color.textContent = "Copié !";
          color.style.color = "black"; // Rendre le texte visible
          color.style.fontWeight = "bold";

          // Restaurer le nom de la couleur après 2 secondes
          setTimeout(() => {
            color.textContent = originalContent; // Restaurer le texte
          }, 2000);
        })
        .catch(() => {
          alert("Erreur lors de la copie de la couleur.");
        });
    });
  });
}

// Liste de palettes avec des couleurs
// Fonction pour récupérer les couleurs depuis un fichier JSON
async function fetchPalettes() {
  try {
    const response = await fetch("Content/js/colors.json");
    if (!response.ok) {
      throw new Error("Erreur lors du chargement des palettes");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Erreur lors de la récupération des couleurs :", error);
    return [];
  }
}
let palettes = [];

// Fonction pour générer les palettes dynamiquement
async function generatePalettes() {
  const container = document.getElementById("paletteContainer");
  // Récupérer les palettes depuis le fichier JSON
  const palettesCoul = await fetchPalettes();

  palettesCoul.forEach((palette, index) => {
    // Créer la carte de palette
    const paletteCard = document.createElement("div");
    paletteCard.className = "palette-card";
    paletteCard.dataset.index = index;

    // Créer la div de palette
    const paletteDiv = document.createElement("div");
    paletteDiv.className = "palette";

    // Ajouter chaque couleur dans la palette
    palette.colors.forEach((colorObj) => {
      const colorDiv = document.createElement("div");
      colorDiv.className = "color";
      colorDiv.style.backgroundColor = colorObj.hex;
      colorDiv.dataset.color = colorObj.hex;
      colorDiv.textContent = colorObj.hex; // Affiche la couleur
      paletteDiv.appendChild(colorDiv);
    });

    // Ajouter le footer avec l'icône d'agrandissement
    const paletteFooter = document.createElement("div");
    paletteFooter.className = "palette-footer";
    const expandLink = document.createElement("a");
    expandLink.href = "#";
    expandLink.className = "expand-icon";
    expandLink.textContent = "⤢";

    // Ajouter l'événement sur l'icône expand-icon
    expandLink.addEventListener("click", (event) => {
      event.preventDefault(); // Empêcher le comportement par défaut
      showPalette(index); // Afficher le modal
    });

    paletteFooter.appendChild(expandLink);

    // Ajouter les éléments à la carte
    paletteCard.appendChild(paletteDiv);
    paletteCard.appendChild(paletteFooter);

    // Ajouter la carte dans le conteneur principal
    container.appendChild(paletteCard);
  });

  // Mettre à jour la liste des palettes
  palettes = document.querySelectorAll(".palette-card");
}

function showPalette(index) {
  if (index >= 0 && index < palettes.length) {
    currentIndex = index;

    // Afficher la palette dans le modal
    const palette = palettes[index].querySelector(".palette").cloneNode(true);
    modalPalette.innerHTML = ""; // Réinitialiser le contenu précédent
    modalPalette.appendChild(palette);

    // Réattacher les événements pour les couleurs dans la modale
    const modalColors = modalPalette.querySelectorAll(".color");
    attachColorEvents(modalColors);

    // Afficher les mots correspondants
    const tags = paletteTags[index] || [];
    modalTags.innerHTML = tags
      .map((tag) => `<span class="tag">${tag}</span>`)
      .join("");

    // Afficher le modal
    modal.classList.remove("hidden");
  } else {
    console.error(`Index invalide pour showPalette: ${index}`);
  }
}

// Appeler la fonction pour générer les palettes
generatePalettes();

// Fonction pour afficher la palette dans le modal
function showPalette(index) {
  if (index >= 0 && index < palettes.length) {
    currentIndex = index;

    // Afficher la palette dans le modal
    const palette = palettes[index].querySelector(".palette").cloneNode(true);
    modalPalette.innerHTML = ""; // Réinitialiser le contenu précédent
    modalPalette.appendChild(palette);

    // Réattacher les événements pour les couleurs dans la modale
    const modalColors = modalPalette.querySelectorAll(".color");
    attachColorEvents(modalColors);

    // Afficher les mots correspondants
    const tags = paletteTags[index] || [];
    modalTags.innerHTML = tags
      .map((tag) => `<span class="tag">${tag}</span>`)
      .join("");

    // Afficher le modal
    modal.classList.remove("hidden");
  }
}

// Fermer la modale
function closeModalPalette() {
  modal.classList.add("hidden");
  modalPalette.innerHTML = "";
  modalTags.innerHTML = "";
}

// Naviguer entre les palettes
function navigatePalette(direction) {
  currentIndex = (currentIndex + direction + palettes.length) % palettes.length;
  showPalette(currentIndex);
}

// Ajouter un événement de clic sur les icônes "expand-icon"
document.querySelectorAll(".expand-icon").forEach((icon, index) => {
  icon.addEventListener("click", (event) => {
    event.preventDefault(); // Empêcher le comportement par défaut du lien
    showPalette(index);
  });
});

// const palettes = document.querySelectorAll(".palette-card");
const modal = document.querySelector(".modalpalette");
const modalPalette = document.getElementById("modal-palette");
const modalTags = document.getElementById("modal-tags"); // Conteneur pour les mots

// Liste des mots pour chaque palette
const paletteTags = [
  ["Orange", "Nature", "Marron"], // Mots pour la première palette
  ["Rouge", "Foncé", "Élégant"], // Mots pour la deuxième palette
  ["Bleu", "Moderne", "Pastel"], // Mots pour la troisième palette
];

// Attacher les événements de copie et de survol aux couleurs visibles dans les cartes
const allColors = document.querySelectorAll(".palette-card .color");
attachColorEvents(allColors);

// Fin script de la view palette
