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
if (searchWrapper) {
  const inputBox = searchWrapper.querySelector("input");
  const suggBox = searchWrapper.querySelector(".autocom-box");
  const icon = searchWrapper.querySelector(".icon");
  let linkTag = searchWrapper.querySelector("a");
  let webLink;

  if (inputBox && suggBox && icon && linkTag) {
    // if user presses any key and releases
    inputBox.onkeyup = (e) => {
      let userData = e.target.value; // user entered data
      let emptyArray = [];
      if (userData) {
        icon.onclick = () => {
          webLink = `https://www.google.com/search?q=${userData}`;
          linkTag.setAttribute("href", webLink);
          linkTag.click();
        };
        emptyArray = suggestions.filter((data) => {
          // filtering array value and user characters to lowercase and return only those words which start with user entered chars
          return data
            .toLocaleLowerCase()
            .startsWith(userData.toLocaleLowerCase());
        });
        emptyArray = emptyArray.map((data) => {
          // passing return data inside li tag
          return `<li>${data}</li>`;
        });
        searchWrapper.classList.add("active"); // show autocomplete box
        showSuggestions(emptyArray);
        let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
          // adding onclick attribute in all li tags
          allList[i].setAttribute("onclick", "select(this)");
        }
      } else {
        searchWrapper.classList.remove("active"); // hide autocomplete box
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
        const userValue = inputBox.value;
        listData = `<li>${userValue}</li>`;
      } else {
        listData = list.join("");
      }
      suggBox.innerHTML = listData;
    }
  }
}

// script de la view palette
// Fonction pour afficher une palette dans le modal
function showPalette(index) {
  const modal = document.querySelector(".modalpalette");
  const modalPalette = document.getElementById("modal-palette");
  const palettes = document.querySelectorAll(".palette-card");

  if (index >= 0 && index < palettes.length) {
    // Récupérez la palette à afficher
    const palette = palettes[index].querySelector(".palette").cloneNode(true);

    // Effacez le contenu précédent
    modalPalette.innerHTML = "";
    modalPalette.appendChild(palette);

    // Réattachez les événements aux couleurs
    const modalColors = modalPalette.querySelectorAll(".color");
    attachColorEvents(modalColors);

    // Affichez la modale
    modal.classList.remove("hidden");
  } else {
    console.error(`Index invalide pour showPalette: ${index}`);
  }
}

// Fonction pour attacher les événements aux couleurs
function attachColorEvents(colors) {
  colors.forEach((color) => {
    const colorName = color.textContent;

    // Afficher le nom au survol
    color.addEventListener("mouseenter", () => {
      color.style.color = "white";
    });

    // Masquer le nom en quittant
    color.addEventListener("mouseleave", () => {
      color.style.color = "transparent";
    });

    // Copier au clic
    color.addEventListener("click", () => {
      const colorCode = color.getAttribute("data-color");
      navigator.clipboard
        .writeText(colorCode)
        .then(() => {
          color.textContent = "Copié !";
          setTimeout(() => {
            color.textContent = colorName;
          }, 2000);
        })
        .catch(() => {
          alert("Erreur lors de la copie.");
        });
    });
  });
}

// Fonction pour naviguer entre les palettes
function navigatePalette(direction) {
  const palettes = document.querySelectorAll(".palette-card");
  currentIndex = (currentIndex + direction + palettes.length) % palettes.length;
  showPalette(currentIndex);
}

// Fermer la modale
function closeModalPalette() {
  const modal = document.querySelector(".modalpalette");
  modal.classList.add("hidden");
}

// Ajouter des événements pour les icônes d'agrandissement
document.querySelectorAll(".expand-icon").forEach((icon, index) => {
  icon.addEventListener("click", (event) => {
    event.preventDefault();
    showPalette(index);
  });
});

// Attacher les événements de copie et de survol aux couleurs visibles dans les cartes
const allColors = document.querySelectorAll(".palette-card .color");
attachColorEvents(allColors);

// Fin script de la view palette

// script pour le caroussel
document.addEventListener("DOMContentLoaded", () => {
  const myCarouselElement = document.querySelector("#myCarousel");

  if (myCarouselElement) {
    const carousel = new bootstrap.Carousel(myCarouselElement, {
      interval: 5000, // Temps entre les slides
      ride: "carousel", // Démarrage automatique
      pause: false, // Empêche l'arrêt au survol
    });
  }
});

// fin du script pour le caroussel
(function () {
  let field = document.querySelector(".items");
  if (!field) {
    // Arrête l'exécution si le conteneur ".items" n'existe pas
    console.warn('Le conteneur ".items" est introuvable.');
    return;
  }

  let li = Array.from(field.children);

  // Vérifiez si les conteneurs pour les filtres existent
  const categoryContainer = document.querySelector(".categories");
  const colorContainer = document.querySelector(".colors");
  const shadeContainer = document.querySelector(".shades");

  if (!categoryContainer || !colorContainer || !shadeContainer) {
    console.warn(
      "Un ou plusieurs conteneurs de filtres (categories, colors, shades) sont introuvables."
    );
    return;
  }

  // Générer dynamiquement les filtres
  function generateFilters() {
    const categories = new Set();
    const colors = new Set();
    const shades = new Set();

    for (let item of li) {
      const category = item.getAttribute("data-category");
      if (category && category.trim() !== "") {
        category.split(",").forEach((cat) => categories.add(cat.trim()));
      }

      const color = item.getAttribute("data-color");
      if (color && color.trim() !== "") {
        color.split(",").forEach((col) => colors.add(col.trim()));
      }

      const shade = item.getAttribute("data-shade");
      if (shade && shade.trim() !== "") {
        shade.split(",").forEach((sh) => shades.add(sh.trim()));
      }
    }

    // Ajouter l'option "All" pour chaque filtre
    categoryContainer.innerHTML = `<li data-filter="all" class="active"><a href="#">All</a></li>`;
    colorContainer.innerHTML = `<li data-filter="all" class="active"><a href="#">All</a></li>`;
    shadeContainer.innerHTML = `<li data-filter="all" class="active"><a href="#">All</a></li>`;

    categories.forEach((cat) => {
      categoryContainer.innerHTML += `<li data-filter="${cat}"><a href="#">${cat}</a></li>`;
    });

    colors.forEach((col) => {
      colorContainer.innerHTML += `<li data-filter="${col}"><a href="#">${col}</a></li>`;
    });

    shades.forEach((sh) => {
      shadeContainer.innerHTML += `<li data-filter="${sh}"><a href="#">${sh}</a></li>`;
    });
  }

  // Appliquer les filtres
  function applyFilters() {
    const selectedCategory =
      document
        .querySelector(".categories .active")
        ?.getAttribute("data-filter") || "all";
    const selectedColor =
      document.querySelector(".colors .active")?.getAttribute("data-filter") ||
      "all";
    const selectedShade =
      document.querySelector(".shades .active")?.getAttribute("data-filter") ||
      "all";

    const productContainer = document.querySelector(".product-container");
    let visibleItems = 0;
    let lastVisibleItem = null;

    for (let item of li) {
      const categoryMatch =
        selectedCategory === "all" ||
        (item.getAttribute("data-category") || "")
          .split(",")
          .includes(selectedCategory);

      const colorMatch =
        selectedColor === "all" ||
        (item.getAttribute("data-color") || "")
          .split(",")
          .includes(selectedColor);

      const shadeMatch =
        selectedShade === "all" ||
        (item.getAttribute("data-shade") || "")
          .split(",")
          .includes(selectedShade);

      if (categoryMatch && colorMatch && shadeMatch) {
        item.style.display = "block";
        item.style.transform = "scale(1)";
        visibleItems++;
        lastVisibleItem = item;
      } else {
        item.style.display = "none";
        item.style.transform = "scale(0)";
      }
    }

    if (visibleItems === 1 && lastVisibleItem) {
      lastVisibleItem.style.width = "50%";
      if (productContainer)
        productContainer.style.justifyContent = "flex-start";
    } else {
      for (let item of li) {
        item.style.width = "30.4%";
      }
    }
  }

  // Ajouter les écouteurs pour les filtres
  function setupFilterListeners() {
    const indicators = document.querySelectorAll(".indicator li");
    indicators.forEach((indicator) => {
      indicator.addEventListener("click", function () {
        if (this.classList.contains("active")) {
          this.classList.remove("active");
        } else {
          const group = this.parentElement;
          const siblings = group.children;
          for (let sibling of siblings) {
            sibling.classList.remove("active");
          }
          this.classList.add("active");
        }
        applyFilters();
      });
    });
  }

  // Initialisation
  generateFilters();
  setupFilterListeners();
})();
