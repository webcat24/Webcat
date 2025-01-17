// Obtenir toutes les images
const images = document.querySelectorAll(".dish img");
let currentIndex = -1;

// Fonction pour afficher une image en plein écran
function showImage(index) {
  const modal = document.querySelector(".modal");
  const modalImage = modal.querySelector("img");

  if (index >= 0 && index < images.length) {
    currentIndex = index;
    modalImage.src = images[index].src;
    modal.style.display = "flex"; // Affiche la modale

    // Crée l'icône de la pipette et l'ajoute à la modale
    createPipetteIconImagePleinEcran();

    // Activation de la pipette sur l'icône
    const pipetteButton = document.getElementById("pipetteIcon");
    pipetteButton.addEventListener("click", pipetteEtat);

    // Zone canva interactif
    redimentionCanvasCadre(modalImage);

    // Desactiver notif
    isNotifActive = false;
    showNotif();
  }
}

// document.addEventListener("DOMContentLoaded", () => {
//   const modal = document.querySelector(".modalboutique");
//   const closeModalButton = modal.querySelector(".close-button");
//   const modalImage = modal.querySelector("img");
//   const modalTitle = document.getElementById("modal-title");
//   const modalDescription = document.getElementById("modal-description");
//   const modalPrice = document.getElementById("modal-price");

//   // Afficher le modal avec les informations du produit
//   function showProductModal(product) {
//     const productName = product.dataset.name;
//     const productDescription = product.dataset.description;
//     const productPrice = product.dataset.price;
//     // const productImage = product.dataset.image;
//     const productImage = "Content/img/arb.avif";

//     // Remplir les éléments du modal
//     modalImage.src = productImage;
//     modalTitle.textContent = productName;
//     modalDescription.textContent = productDescription;
//     modalPrice.textContent = `$${productPrice}`;
//     modal.style.display = "flex";
//   }
//   document.querySelectorAll(".product-item").forEach((item) => {
//     item.addEventListener("click", () => showProductModal(item));
//   });

//   closeModalButton.addEventListener("click", () => {
//     modal.style.display = "none";
//   });

//   // Fermer en cliquant à l'extérieur
//   modal.addEventListener("click", (event) => {
//     if (event.target === modal) {
//       modal.style.display = "none";
//     }
//   });
// });

// Fermer la modale + retirer l'icône + restart color pipette

// document.addEventListener("DOMContentLoaded", () => {
//   const modal = document.querySelector(".modalboutique");
//   const closeModalButton = modal.querySelector(".close-button");
//   const modalImage = document.getElementById("modal-image");
//   const modalTitle = document.getElementById("modal-title");
//   const modalDescription = document.getElementById("modal-description");
//   const modalPrice = document.getElementById("modal-price");
//   const productItems = document.querySelectorAll(".product-item");

//   let currentIndex = -1;

//   // Afficher le modal avec les informations du produit
//   function showProductModal(index) {
//     currentIndex = index;

//     const product = productItems[index];
//     const productName = product.dataset.name;
//     const productDescription = product.dataset.description;
//     const productPrice = product.dataset.price + " - Litre";
//     const productImage = product.dataset.image;

//     // Remplir les éléments du modal
//     modalImage.src = productImage;
//     modalTitle.textContent = productName;
//     modalDescription.textContent = productDescription;
//     modalPrice.textContent = `$${productPrice}`;
//     modal.style.display = "flex";
//   }

//   // Navigation vers le produit précédent
//   function showPreviousProduct() {
//     if (currentIndex > 0) {
//       showProductModal(currentIndex - 1);
//     } else {
//       showProductModal(productItems.length - 1); // Aller au dernier produit
//     }
//   }

//   // Navigation vers le produit suivant
//   function showNextProduct() {
//     if (currentIndex < productItems.length - 1) {
//       showProductModal(currentIndex + 1);
//     } else {
//       showProductModal(0); // Retourner au premier produit
//     }
//   }

//   // Attachez des événements aux produits
//   productItems.forEach((item, index) => {
//     item.addEventListener("click", () => showProductModal(index));
//   });

//   // Attachez des événements aux boutons de navigation
//   document
//     .getElementById("prev-button")
//     .addEventListener("click", showPreviousProduct);
//   document
//     .getElementById("next-button")
//     .addEventListener("click", showNextProduct);

//   // Fermer le modal
//   closeModalButton.addEventListener("click", () => {
//     modal.style.display = "none";
//   });

//   // Fermer en cliquant à l'extérieur
//   modal.addEventListener("click", (event) => {
//     if (event.target === modal) {
//       modal.style.display = "none";
//     }
//   });
// });

document.addEventListener("DOMContentLoaded", () => {
  const modal = document.querySelector(".modalboutique");
  const closeModalButton = modal.querySelector(".close-button");
  const modalImage = document.getElementById("modal-image");
  const modalTitle = document.getElementById("modal-title");
  const modalDescription = document.getElementById("modal-description");
  const modalPrice = document.getElementById("modal-price");
  const modalColor = document.getElementById("modal-color"); // ID pour afficher les couleurs
  const modalHex = document.getElementById("modal-hex"); // ID pour afficher le code hexadécimal
  const productItems = document.querySelectorAll(".product-item");

  let currentIndex = -1;

  // Afficher le modal avec les informations du produit
  function showProductModal(index) {
    currentIndex = index;

    const product = productItems[index];
    const productName = product.dataset.name;
    const productDescription = product.dataset.description;
    const productPrice = product.dataset.price + " - Litre";
    const productImage = product.dataset.image;
    const productColor = product.dataset.color; // Récupération de la couleur
    const productHex = product.dataset.code_hexadecimal; // Récupération du code hexadécimal

    // Remplir les éléments du modal
    modalImage.src = productImage;
    modalTitle.textContent = productName;
    modalDescription.textContent = productDescription;
    modalPrice.textContent = `$${productPrice}`;
    modalColor.textContent = `Couleur : ${productColor}`;
    modalHex.textContent = `Code Hex : ${productHex}`;
    modal.style.display = "flex";
  }

  // Navigation vers le produit précédent
  function showPreviousProduct() {
    if (currentIndex > 0) {
      showProductModal(currentIndex - 1);
    } else {
      showProductModal(productItems.length - 1); // Aller au dernier produit
    }
  }

  // Navigation vers le produit suivant
  function showNextProduct() {
    if (currentIndex < productItems.length - 1) {
      showProductModal(currentIndex + 1);
    } else {
      showProductModal(0); // Retourner au premier produit
    }
  }

  // Attachez des événements aux produits
  productItems.forEach((item, index) => {
    item.addEventListener("click", () => showProductModal(index));
  });

  // Attachez des événements aux boutons de navigation
  document
    .getElementById("prev-button")
    .addEventListener("click", showPreviousProduct);
  document
    .getElementById("next-button")
    .addEventListener("click", showNextProduct);

  // Fermer le modal
  closeModalButton.addEventListener("click", () => {
    modal.style.display = "none";
  });

  // Fermer en cliquant à l'extérieur
  modal.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});

function closeModal() {
  const modalElement = document.querySelector(".modal");
  const canvas = document.getElementById("canvas");

  if (modalElement) {
    modalElement.style.display = "none";
    canvas.style.cursor = "";

    // Supprimer l'icône de la pipette
    const pipetteIcon = document.getElementById("pipetteIcon");
    if (pipetteIcon) {
      isPipetteActive = false;
      pipetteIcon.remove();
    }
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

// // boutique
(function () {
  let field = document.querySelector(".items");
  if (!field) {
    // Arrête l'exécution si le conteneur ".items" n'existe pas
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
        colors.add(color.trim()); // Ajout direct sans split
        console.log("Couleur ajoutée :", color.trim());
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
        (item.getAttribute("data-color") || "").trim() === selectedColor; // Comparaison directe

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
        item.style.width = "46%";
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

let next = document.getElementById("next");
let prev = document.getElementById("prev");
let carousel = document.querySelector(".carousel");

if (next && prev && carousel) {
  let items = document.querySelectorAll(".carousel .item");
  let countItem = items.length;
  let active = 1;
  let other_1 = null;
  let other_2 = null;

  next.onclick = () => {
    carousel.classList.remove("prev");
    carousel.classList.add("next");
    active = active + 1 >= countItem ? 0 : active + 1;
    other_1 = active - 1 < 0 ? countItem - 1 : active - 1;
    other_2 = active + 1 >= countItem ? 0 : active + 1;
    changeSlider();
  };

  prev.onclick = () => {
    carousel.classList.remove("next");
    carousel.classList.add("prev");
    active = active - 1 < 0 ? countItem - 1 : active - 1;
    other_1 = active + 1 >= countItem ? 0 : active + 1;
    other_2 = other_1 + 1 >= countItem ? 0 : other_1 + 1;
    changeSlider();
  };

  const changeSlider = () => {
    let itemOldActive = document.querySelector(".carousel .item.active");
    if (itemOldActive) itemOldActive.classList.remove("active");

    let itemOldOther_1 = document.querySelector(".carousel .item.other_1");
    if (itemOldOther_1) itemOldOther_1.classList.remove("other_1");

    let itemOldOther_2 = document.querySelector(".carousel .item.other_2");
    if (itemOldOther_2) itemOldOther_2.classList.remove("other_2");

    items.forEach((e) => {
      e.querySelector(".image img").style.animation = "none";
      void e.offsetWidth;
      e.querySelector(".image img").style.animation = "";
    });

    items[active].classList.add("active");
    items[other_1].classList.add("other_1");
    items[other_2].classList.add("other_2");

    clearInterval(autoPlay);
    autoPlay = setInterval(() => {
      next.click();
    }, 5000);
  };

  let autoPlay = setInterval(() => {
    next.click();
  }, 5000);
} else {
  console.warn("Carousel elements are not found in the DOM.");
}

// pagination
