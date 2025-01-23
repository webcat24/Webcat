const images = document.querySelectorAll(".dish img");
let currentIndex = -1;

function showImage(index) {
  const modal = document.querySelector(".modal");
  const modalImage = modal.querySelector("img");

  if (index >= 0 && index < images.length) {
    currentIndex = index;
    modalImage.src = images[index].src;
    modal.style.display = "flex";

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
function closeModal(modalSelector) {
  const modalElement = document.querySelector(modalSelector);

  if (modalElement) {
    modalElement.style.display = "none";

    // Réinitialiser les curseurs ou d'autres éléments si nécessaire
    const canvas = document.getElementById("canvas");
    if (canvas) {
      canvas.style.cursor = "";
    }

    // Supprimer l'icône de la pipette si elle existe
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

function navigateImage(direction) {
  if (currentIndex === -1) return;
  const newIndex = (currentIndex + direction + images.length) % images.length; // Navigation circulaire
  showImage(newIndex);
}

images.forEach((img, index) => {
  img.addEventListener("click", () => showImage(index));
});

document.addEventListener("keydown", (event) => {
  if (currentIndex === -1) return;

  if (event.key === "ArrowRight") {
    navigateImage(1); // Image suivante
  } else if (event.key === "ArrowLeft") {
    navigateImage(-1); // Image précédente
  } else if (event.key === "Escape") {
    closeModal();
  }
});

// Empêcher la fermeture en cliquant sur les flèches
document.querySelectorAll(".arrow").forEach((arrow) => {
  arrow.addEventListener("click", (event) => {
    event.stopPropagation();
  });
});

// Swiper js
document.addEventListener("DOMContentLoaded", () => {
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
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

const body = document.querySelector("body"),
  navMenu = document.querySelector("#navbarNavDropdown"),
  navOpenBtn = document.querySelector(".navbar-toggler");
if (navMenu && navOpenBtn) {
  navOpenBtn.addEventListener("click", () => {
    if (!navMenu.classList.contains("show")) {
      navMenu.classList.add("show"); // Ouvre le menu
      body.style.overflowY = "hidden"; // Empêche le scroll
    } else {
      navMenu.classList.remove("show"); // Ferme le menu si cliqué à nouveau
      body.style.overflowY = "scroll"; // Réactive le scroll
    }
  });
}

if (navOpenBtn) {
  navOpenBtn.addEventListener("click", () => {
    navMenu.classList.remove("show");
    body.style.overflowY = "scroll";
  });
}

// footer
document.addEventListener("DOMContentLoaded", function () {
  const footerTitles = document.querySelectorAll(".footer-title");

  footerTitles.forEach((title) => {
    title.addEventListener("click", () => {
      const links = title.nextElementSibling;
      if (links) {
        links.style.display =
          links.style.display === "block" ? "none" : "block";
      }
    });
  });
});

// script de la view palette
// Fonction pour afficher une palette dans le modal
function showPalette(index) {
  const modal = document.querySelector(".modalpalette");
  const modalPalette = document.getElementById("modal-palette");
  const palettes = document.querySelectorAll(".palette-card");

  if (index >= 0 && index < palettes.length) {
    const palette = palettes[index].querySelector(".palette").cloneNode(true);

    modalPalette.innerHTML = "";
    modalPalette.appendChild(palette);

    modal.classList.remove("hidden");
  } else {
    console.error(`Index invalide pour showPalette: ${index}`);
  }
}

function attachColorEvents(colors) {
  colors.forEach((color) => {
    const colorName = color.textContent;

    color.addEventListener("mouseenter", () => {
      color.style.color = "white";
    });

    color.addEventListener("mouseleave", () => {
      color.style.color = "transparent";
    });
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
function navigatePalette(direction) {
  const palettes = document.querySelectorAll(".palette-card");
  currentIndex = (currentIndex + direction + palettes.length) % palettes.length;
  showPalette(currentIndex);
}

function closeModalPalette() {
  const modal = document.querySelector(".modalpalette");
  modal.classList.add("hidden");
}

document.querySelectorAll(".expand-icon").forEach((icon, index) => {
  icon.addEventListener("click", (event) => {
    event.preventDefault();
    showPalette(index);
  });
});

const allColors = document.querySelectorAll(".palette-card .color");
attachColorEvents(allColors);

// Fin script de la view palette

// script pour le caroussel
document.addEventListener("DOMContentLoaded", () => {
  const myCarouselElement = document.querySelector("#myCarousel");

  if (myCarouselElement) {
    const carousel = new bootstrap.Carousel(myCarouselElement, {
      interval: 5000,
      ride: "carousel",
      pause: false,
    });
  }
});

// fin du script pour le caroussel

// boutique
// document.addEventListener("DOMContentLoaded", function () {
//   const url = "?controller=boutique&action=apiGetProduits";
//   const itemsPerPage = 12;
//   let currentPage = 1;
//   let totalPages = 0;

//   fetch(url)
//     .then((response) => response.json())
//     .then((data) => {
//       const productsContainer = document.querySelector(".items");
//       const paginationContainer = document.querySelector(".pagination");
//       const categoryContainer = document.querySelector(".categories");
//       const shadeContainer = document.querySelector(".shades");
//       const modal = document.querySelector(".modalboutique");
//       const closeModalButton = modal.querySelector(".close-button");
//       const prevButton = modal.querySelector("#prev-button");
//       const nextButton = modal.querySelector("#next-button");

//       let currentIndex = 0;
//       const categoriesSet = new Set();
//       const shadesSet = new Set();

//       // Remplir les ensembles pour les filtres
//       data.forEach((produit) => {
//         if (produit.categories) {
//           produit.categories.split(",").forEach((cat) => {
//             categoriesSet.add(cat.trim());
//           });
//         }
//         if (produit.shades) {
//           produit.shades.split(",").forEach((shade) => {
//             shadesSet.add(shade.trim());
//           });
//         }
//       });

//       totalPages = Math.ceil(data.length / itemsPerPage);

//       // la page avec le filtre appliquer pour Thibaud ce avec cette fonction que je recuperer les infos du model et convertir en json avec l'action api et implementer dans le site
//       // attention je mis aussi des filtre me cette fois ci le filtre marche bien sur toute les page comme je fait que avec js
//       function displayPage(page, filteredData = data) {
//         productsContainer.innerHTML = "";
//         const startIndex = (page - 1) * itemsPerPage;
//         const endIndex = Math.min(
//           startIndex + itemsPerPage,
//           filteredData.length
//         );

//         for (let i = startIndex; i < endIndex; i++) {
//           const produit = filteredData[i];
//           const productItem = document.createElement("li");
//           productItem.classList.add("product-item");

//           productItem.setAttribute(
//             "data-category",
//             produit.categories || "Non spécifié"
//           );
//           productItem.setAttribute(
//             "data-shade",
//             produit.shades || "Non spécifié"
//           );
//           productItem.setAttribute("data-name", produit.categories || "");
//           productItem.setAttribute(
//             "data-description",
//             produit.description_materiel || "Aucune description disponible."
//           );
//           productItem.setAttribute(
//             "data-price",
//             parseFloat(produit.prix_materiel || 0).toFixed(2)
//           );
//           productItem.setAttribute("data-image", produit.image || "");
//           productItem.setAttribute(
//             "data-code_hexadecimal",
//             produit.code_hexadecimal || ""
//           );

//           productItem.innerHTML = `
//             <picture>
//               <img src="${produit.image || ""}" alt="${
//             produit.categories || ""
//           }">
//             </picture>
//             <div class="detail">
//               <p class="icon">
//                 <span><i class="far fa-heart"></i></span>
//                 <span><i class="far fa-share-square"></i></span>
//                 <span><i class="fas fa-shopping-basket"></i></span>
//               </p>
//               <strong>${produit.categories || "Sans catégorie"}</strong>
//             </div>
//             <h4>${parseFloat(produit.prix_materiel || 0).toFixed(2)}€</h4>
//           `;

//           productsContainer.appendChild(productItem);

//           productItem.addEventListener("click", () => {
//             currentIndex = i;
//             openModal(produit);
//           });
//         }
//       }

//       // generer la pagination
//       function renderPagination(filteredData = data) {
//         paginationContainer.innerHTML = "";

//         totalPages = Math.ceil(filteredData.length / itemsPerPage);

//         if (totalPages === 0) {
//           productsContainer.innerHTML = "<p>Aucun produit trouvé.</p>";
//           return;
//         }

//         if (currentPage > 1) {
//           const prevButton = document.createElement("button");
//           prevButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
//           prevButton.addEventListener("click", () => {
//             currentPage--;
//             updatePage(filteredData);
//           });
//           paginationContainer.appendChild(prevButton);
//         }

//         // Numéros de la page
//         for (let i = 1; i <= totalPages; i++) {
//           const pageButton = document.createElement("button");
//           pageButton.textContent = i;
//           if (i === currentPage) {
//             pageButton.classList.add("active");
//           }
//           pageButton.addEventListener("click", () => {
//             currentPage = i;
//             updatePage(filteredData);
//           });
//           paginationContainer.appendChild(pageButton);
//         }
//         if (currentPage < totalPages) {
//           const nextButton = document.createElement("button");
//           nextButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
//           nextButton.addEventListener("click", () => {
//             currentPage++;
//             updatePage(filteredData);
//           });
//           paginationContainer.appendChild(nextButton);
//         }
//       }

//       // Fonction pour appliquer les filtres
//       function applyFilters() {
//         const selectedCategory =
//           document
//             .querySelector(".categories .active")
//             ?.getAttribute("data-filter") || "all";
//         const selectedShade =
//           document
//             .querySelector(".shades .active")
//             ?.getAttribute("data-filter") || "all";

//         const filteredData = data.filter((produit) => {
//           const categoryMatch =
//             selectedCategory === "all" ||
//             (produit.categories || "")
//               .split(",")
//               .map((cat) => cat.trim())
//               .includes(selectedCategory);

//           const shadeMatch =
//             selectedShade === "all" ||
//             (produit.shades || "")
//               .split(",")
//               .map((shade) => shade.trim())
//               .includes(selectedShade);

//           return categoryMatch && shadeMatch;
//         });

//         currentPage = 1;
//         updatePage(filteredData);
//       }

//       // Génération des filtres
//       function generateFilterOptions(container, optionsSet, dataAttribute) {
//         container.innerHTML = `<li data-filter="all" class="active"><a href="#">Toutes</a></li>`;
//         optionsSet.forEach((option) => {
//           container.innerHTML += `
//             <li data-filter="${option}" data-${dataAttribute}="${option}">
//               <a href="#">${option}</a>
//             </li>`;
//         });
//         container.querySelectorAll("li").forEach((filter) => {
//           filter.addEventListener("click", (event) => {
//             event.preventDefault();
//             const isActive = filter.classList.contains("active");

//             const siblings = filter.parentElement.querySelectorAll("li");
//             siblings.forEach((sibling) => sibling.classList.remove("active"));

//             if (isActive) {
//               applyFilters();
//               return;
//             }
//             filter.classList.add("active");
//             applyFilters();
//           });
//         });
//       }

//       generateFilterOptions(categoryContainer, categoriesSet, "category");
//       generateFilterOptions(shadeContainer, shadesSet, "shade");

//       function updatePage(filteredData = data) {
//         displayPage(currentPage, filteredData);
//         renderPagination(filteredData);
//       }

//       updatePage();
//       function openModal(produit) {
//         modal.querySelector("#modal-image").src =
//           produit.image || "placeholder.jpg";
//         modal.querySelector("#modal-title").textContent =
//           produit.categories || "Sans catégorie";
//         modal.querySelector("#modal-price").textContent = `${parseFloat(
//           produit.prix_materiel || 0
//         ).toFixed(2)}€`;
//         modal.querySelector("#modal-description").textContent =
//           produit.description_materiel || "Aucune description disponible.";
//         modal.style.display = "flex";
//       }
//       closeModalButton.addEventListener("click", () => {
//         modal.style.display = "none";
//       });
//       window.addEventListener("click", (event) => {
//         if (event.target === modal) {
//           modal.style.display = "none";
//         }
//       });
//       prevButton.addEventListener("click", () => {
//         if (currentIndex > 0) {
//           currentIndex--;
//         } else {
//           currentIndex = data.length - 1;
//         }
//         openModal(data[currentIndex]);
//       });

//       nextButton.addEventListener("click", () => {
//         if (currentIndex < data.length - 1) {
//           currentIndex++;
//         } else {
//           currentIndex = 0;
//         }
//         openModal(data[currentIndex]);
//       });
//     })
//     .catch((error) => {
//       console.error("Erreur lors de la récupération des données :", error);
//     });
// });

// document.addEventListener("DOMContentLoaded", function () {
//   const url = "?controller=boutique&action=apiGetProduits";
//   const itemsPerPage = 12;
//   let currentPage = 1;
//   let totalPages = 0;

//   // Variables globales pour stocker les filtres après extraction
//   let extractedCategories = new Set();
//   let extractedShades = new Set();

//   // Fonction pour regrouper les catégories sous des noms principaux
//   function getMainCategory(category) {
//     if (/set de pinceaux/i.test(category)) return "Set de pinceaux";
//     if (/pinceau/i.test(category)) return "Pinceau";
//     if (/peinture aquarelle/i.test(category)) return "Peinture aquarelle";
//     if (/peinture acrylique/i.test(category)) return "Peinture acrylique";
//     if (/peinture l'huile/i.test(category)) return "Peinture l'huile";
//     if (/peinture gouache/i.test(category)) return "Peinture gouache";
//     if (/peinture encre/i.test(category)) return "Peinture encre";

//     return category.trim();
//   }

//   fetch(url)
//     .then((response) => response.json())
//     .then((data) => {
//       const productsContainer = document.querySelector(".items");
//       const paginationContainer = document.querySelector(".pagination");
//       const categoryContainer = document.querySelector(".categories");
//       const shadeContainer = document.querySelector(".shades");
//       const modal = document.querySelector(".modalboutique");
//       const closeModalButton = modal.querySelector(".close-button");
//       const prevButton = modal.querySelector("#prev-button");
//       const nextButton = modal.querySelector("#next-button");

//       let currentIndex = 0;

//       // Extraire les filtres des données uniquement une fois
//       if (extractedCategories.size === 0 && extractedShades.size === 0) {
//         data.forEach((produit) => {
//           if (produit.categories) {
//             produit.categories.split(",").forEach((cat) => {
//               const mainCategory = getMainCategory(cat);
//               extractedCategories.add(mainCategory);
//             });
//           }
//           if (produit.shades) {
//             produit.shades.split(",").forEach((shade) => {
//               extractedShades.add(shade.trim());
//             });
//           }
//         });
//       }

//       totalPages = Math.ceil(data.length / itemsPerPage);

//       function displayPage(page, filteredData = data) {
//         productsContainer.innerHTML = "";
//         const startIndex = (page - 1) * itemsPerPage;
//         const endIndex = Math.min(
//           startIndex + itemsPerPage,
//           filteredData.length
//         );

//         for (let i = startIndex; i < endIndex; i++) {
//           const produit = filteredData[i];
//           const productItem = document.createElement("li");
//           productItem.classList.add("product-item");

//           productItem.innerHTML = `
//             <picture>
//               <img src="${produit.image || ""}" alt="${
//             produit.categories || ""
//           }">
//             </picture>
//             <div class="detail">
//               <p class="icon">
//                 <span><i class="far fa-heart"></i></span>
//                 <span><i class="far fa-share-square"></i></span>
//                 <span><i class="fas fa-shopping-basket"></i></span>
//               </p>
//               <strong>${produit.categories || "Sans catégorie"}</strong>
//             </div>
//             <h4>${parseFloat(produit.prix_materiel || 0).toFixed(2)}€</h4>
//           `;
//           productsContainer.appendChild(productItem);

//           productItem.addEventListener("click", () => {
//             currentIndex = i;
//             openModal(produit);
//           });
//         }
//       }

//       function renderPagination(filteredData = data) {
//         paginationContainer.innerHTML = "";

//         totalPages = Math.ceil(filteredData.length / itemsPerPage);
//         if (totalPages === 0) {
//           productsContainer.innerHTML = "<p>Aucun produit trouvé.</p>";
//           return;
//         }

//         // Bouton Précédent
//         if (currentPage > 1) {
//           const prevButton = document.createElement("button");
//           prevButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
//           prevButton.addEventListener("click", () => {
//             currentPage--;
//             updatePage(filteredData);
//           });
//           paginationContainer.appendChild(prevButton);
//         }

//         // Pages visibles avec les "..."
//         const groupSize = 5;
//         const startGroup =
//           Math.floor((currentPage - 1) / groupSize) * groupSize + 1;
//         const endGroup = Math.min(startGroup + groupSize - 1, totalPages);

//         if (startGroup > 1) {
//           const dotsLeft = document.createElement("button");
//           dotsLeft.textContent = "...";
//           dotsLeft.addEventListener("click", () => {
//             currentPage = startGroup - 1;
//             updatePage(filteredData);
//           });
//           paginationContainer.appendChild(dotsLeft);
//         }

//         for (let i = startGroup; i <= endGroup; i++) {
//           const pageButton = document.createElement("button");
//           pageButton.textContent = i;
//           if (i === currentPage) {
//             pageButton.classList.add("active");
//           }
//           pageButton.addEventListener("click", () => {
//             currentPage = i;
//             updatePage(filteredData);
//           });
//           paginationContainer.appendChild(pageButton);
//         }

//         if (endGroup < totalPages) {
//           const dotsRight = document.createElement("button");
//           dotsRight.textContent = "...";
//           dotsRight.addEventListener("click", () => {
//             currentPage = endGroup + 1;
//             updatePage(filteredData);
//           });
//           paginationContainer.appendChild(dotsRight);
//         }

//         // Bouton Suivant
//         if (currentPage < totalPages) {
//           const nextButton = document.createElement("button");
//           nextButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
//           nextButton.addEventListener("click", () => {
//             currentPage++;
//             updatePage(filteredData);
//           });
//           paginationContainer.appendChild(nextButton);
//         }
//       }

//       function generateFilterOptions(container, optionsSet, dataAttribute) {
//         container.innerHTML = `<li data-filter="all" class="active"><a href="#">Toutes</a></li>`;
//         optionsSet.forEach((option) => {
//           container.innerHTML += `
//             <li data-filter="${option}" data-${dataAttribute}="${option}">
//               <a href="#">${option}</a>
//             </li>`;
//         });
//         container.querySelectorAll("li").forEach((filter) => {
//           filter.addEventListener("click", (event) => {
//             event.preventDefault();
//             const isActive = filter.classList.contains("active");

//             const siblings = filter.parentElement.querySelectorAll("li");
//             siblings.forEach((sibling) => sibling.classList.remove("active"));

//             if (isActive) {
//               applyFilters();
//               return;
//             }
//             filter.classList.add("active");
//             applyFilters();
//           });
//         });
//       }

//       function applyFilters() {
//         const selectedCategory =
//           document
//             .querySelector(".categories .active")
//             ?.getAttribute("data-filter") || "all";
//         const selectedShade =
//           document
//             .querySelector(".shades .active")
//             ?.getAttribute("data-filter") || "all";

//         const filteredData = data.filter((produit) => {
//           const categoryMatch =
//             selectedCategory === "all" ||
//             (produit.categories || "")
//               .split(",")
//               .map((cat) => getMainCategory(cat.trim()))
//               .includes(selectedCategory);

//           const shadeMatch =
//             selectedShade === "all" ||
//             (produit.shades || "")
//               .split(",")
//               .map((shade) => shade.trim())
//               .includes(selectedShade);

//           return categoryMatch && shadeMatch;
//         });

//         currentPage = 1;
//         updatePage(filteredData);
//       }

//       // Générer les options de filtres une seule fois après extraction
//       generateFilterOptions(categoryContainer, extractedCategories, "category");
//       generateFilterOptions(shadeContainer, extractedShades, "shade");

//       function updatePage(filteredData = data) {
//         displayPage(currentPage, filteredData);
//         renderPagination(filteredData);
//       }

//       function openModal(produit) {
//         modal.querySelector("#modal-image").src =
//           produit.image || "placeholder.jpg";
//         modal.querySelector("#modal-title").textContent =
//           produit.categories || "Sans catégorie";
//         modal.querySelector("#modal-price").textContent = `${parseFloat(
//           produit.prix_materiel || 0
//         ).toFixed(2)}€`;
//         modal.querySelector("#modal-description").textContent =
//           produit.description_materiel || "Aucune description disponible.";
//         modal.style.display = "flex";
//       }

//       closeModalButton.addEventListener("click", () => {
//         modal.style.display = "none";
//       });

//       window.addEventListener("click", (event) => {
//         if (event.target === modal) {
//           modal.style.display = "none";
//         }
//       });

//       prevButton.addEventListener("click", () => {
//         if (currentIndex > 0) {
//           currentIndex--;
//         } else {
//           currentIndex = data.length - 1;
//         }
//         openModal(data[currentIndex]);
//       });

//       nextButton.addEventListener("click", () => {
//         if (currentIndex < data.length - 1) {
//           currentIndex++;
//         } else {
//           currentIndex = 0;
//         }
//         openModal(data[currentIndex]);
//       });

//       updatePage();
//     })
//     .catch((error) => {
//       console.error("Erreur lors de la récupération des données :", error);
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
  const url = "?controller=boutique&action=apiGetProduits";
  const itemsPerPage = 12;
  let currentPage = 1;
  let totalPages = 0;
  let extractedCategories = new Set();
  let extractedShades = new Set();
  let currentIndex = 0;
  let allData = [];

  function getMainCategory(category) {
    if (/set de pinceaux/i.test(category)) return "Set de pinceaux";
    if (/pinceau/i.test(category)) return "Pinceau";
    if (/peinture aquarelle/i.test(category)) return "Peinture aquarelle";
    if (/peinture acrylique/i.test(category)) return "Peinture acrylique";
    if (/peinture l'huile/i.test(category)) return "Peinture l'huile";
    if (/peinture gouache/i.test(category)) return "Peinture gouache";
    if (/peinture encre/i.test(category)) return "Peinture encre";
    return category.trim();
  }

  function fetchData(url) {
    return fetch(url).then((response) => response.json());
  }

  function extractFilters(data) {
    extractedCategories.clear();
    extractedShades.clear();
    data.forEach((produit) => {
      if (produit.categories) {
        produit.categories.split(",").forEach((cat) => {
          const mainCategory = getMainCategory(cat);
          extractedCategories.add(mainCategory);
        });
      }
      if (produit.shades) {
        produit.shades.split(",").forEach((shade) => {
          extractedShades.add(shade.trim());
        });
      }
    });
  }

  function generateFilterOptions(container, optionsSet, dataAttribute) {
    container.innerHTML = `<li data-filter="all" class="active"><a href="#">Toutes</a></li>`;
    optionsSet.forEach((option) => {
      container.innerHTML += `
        <li data-filter="${option}" data-${dataAttribute}="${option}">
          <a href="#">${option}</a>
        </li>`;
    });
    container.querySelectorAll("li").forEach((filter) => {
      filter.addEventListener("click", (event) => {
        event.preventDefault();
        container
          .querySelectorAll("li")
          .forEach((li) => li.classList.remove("active"));
        filter.classList.add("active");
        applyFilters();
      });
    });
  }

  function displayPage(page, data, productsContainer) {
    productsContainer.innerHTML = "";
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = Math.min(startIndex + itemsPerPage, data.length);

    for (let i = startIndex; i < endIndex; i++) {
      const produit = data[i];
      const productItem = document.createElement("li");
      productItem.classList.add("product-item");

      productItem.innerHTML = `
        <picture>
          <img src="${produit.image || ""}" alt="${produit.categories || ""}">
        </picture>
        <div class="detail">
          <p class="icon">
            <span><i class="far fa-heart"></i></span>
            <span><i class="far fa-share-square"></i></span>
            <span><i class="fas fa-shopping-basket"></i></span>
          </p>
          <strong>${produit.categories || "Sans catégorie"}</strong>
        </div>
        <h4>${parseFloat(produit.prix_materiel || 0).toFixed(2)}€</h4>
      `;
      productsContainer.appendChild(productItem);

      productItem.addEventListener("click", () => {
        currentIndex = i;
        openModal(produit);
      });
    }
  }

  // function renderPagination(paginationContainer, data, updatePageCallback) {
  //   paginationContainer.innerHTML = "";
  //   totalPages = Math.ceil(data.length / itemsPerPage);

  //   if (totalPages === 0) {
  //     return;
  //   }

  //   if (currentPage > 1) {
  //     const prevButton = document.createElement("button");
  //     prevButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
  //     prevButton.addEventListener("click", () => {
  //       currentPage--;
  //       updatePageCallback(data);
  //     });
  //     paginationContainer.appendChild(prevButton);
  //   }

  //   const groupSize = 5;
  //   const startGroup = Math.max(
  //     1,
  //     Math.floor((currentPage - 1) / groupSize) * groupSize + 1
  //   );
  //   const endGroup = Math.min(startGroup + groupSize - 1, totalPages);

  //   for (let i = startGroup; i <= endGroup; i++) {
  //     const pageButton = document.createElement("button");
  //     pageButton.textContent = i;
  //     if (i === currentPage) {
  //       pageButton.classList.add("active");
  //     }
  //     pageButton.addEventListener("click", () => {
  //       currentPage = i;
  //       updatePageCallback(data);
  //     });
  //     paginationContainer.appendChild(pageButton);
  //   }

  //   if (currentPage < totalPages) {
  //     const nextButton = document.createElement("button");
  //     nextButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
  //     nextButton.addEventListener("click", () => {
  //       currentPage++;
  //       updatePageCallback(data);
  //     });
  //     paginationContainer.appendChild(nextButton);
  //   }
  // }
  function renderPagination(paginationContainer, data, updatePageCallback) {
    paginationContainer.innerHTML = "";
    totalPages = Math.ceil(data.length / itemsPerPage);

    if (totalPages === 0) {
      return;
    }

    if (currentPage > 1) {
      const prevButton = document.createElement("button");
      prevButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
      prevButton.addEventListener("click", () => {
        currentPage--;
        updatePageCallback(data);
      });
      paginationContainer.appendChild(prevButton);
    }

    const groupSize = 5;
    const startGroup = Math.max(
      1,
      Math.floor((currentPage - 1) / groupSize) * groupSize + 1
    );
    const endGroup = Math.min(startGroup + groupSize - 1, totalPages);

    if (startGroup > 1) {
      const prevDots = document.createElement("button");
      prevDots.textContent = "...";
      prevDots.addEventListener("click", () => {
        currentPage = Math.max(1, startGroup - groupSize);
        updatePageCallback(data);
      });
      paginationContainer.appendChild(prevDots);
    }

    for (let i = startGroup; i <= endGroup; i++) {
      const pageButton = document.createElement("button");
      pageButton.textContent = i;
      if (i === currentPage) {
        pageButton.classList.add("active");
      }
      pageButton.addEventListener("click", () => {
        currentPage = i;
        updatePageCallback(data);
      });
      paginationContainer.appendChild(pageButton);
    }

    if (endGroup < totalPages) {
      const nextDots = document.createElement("button");
      nextDots.textContent = "...";
      nextDots.addEventListener("click", () => {
        currentPage = Math.min(totalPages, endGroup + 1);
        updatePageCallback(data);
      });
      paginationContainer.appendChild(nextDots);
    }

    if (currentPage < totalPages) {
      const nextButton = document.createElement("button");
      nextButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
      nextButton.addEventListener("click", () => {
        currentPage++;
        updatePageCallback(data);
      });
      paginationContainer.appendChild(nextButton);
    }
  }

  function applyFilters() {
    const selectedCategory =
      document
        .querySelector(".categories .active")
        ?.getAttribute("data-filter") || "all";
    const selectedShade =
      document.querySelector(".shades .active")?.getAttribute("data-filter") ||
      "all";

    const filteredData = allData.filter((produit) => {
      const categoryMatch =
        selectedCategory === "all" ||
        (produit.categories || "")
          .split(",")
          .map((cat) => getMainCategory(cat.trim()))
          .includes(selectedCategory);

      const shadeMatch =
        selectedShade === "all" ||
        (produit.shades || "")
          .split(",")
          .map((shade) => shade.trim())
          .includes(selectedShade);

      return categoryMatch && shadeMatch;
    });

    currentPage = 1;
    updatePage(filteredData);
  }

  function openModal(produit) {
    const modal = document.querySelector(".modalboutique");
    modal.querySelector("#modal-image").src =
      produit.image || "placeholder.jpg";
    modal.querySelector("#modal-title").textContent =
      produit.categories || "Sans catégorie";
    modal.querySelector("#modal-price").textContent = `${parseFloat(
      produit.prix_materiel || 0
    ).toFixed(2)}€`;
    modal.querySelector("#modal-description").textContent =
      produit.description_materiel || "Aucune description disponible.";
    modal.style.display = "flex";

    const prevButton = modal.querySelector("#prev-button");
    const nextButton = modal.querySelector("#next-button");

    prevButton.onclick = () => {
      currentIndex = (currentIndex - 1 + allData.length) % allData.length;
      openModal(allData[currentIndex]);
    };

    nextButton.onclick = () => {
      currentIndex = (currentIndex + 1) % allData.length;
      openModal(allData[currentIndex]);
    };

    modal.querySelector(".close-button").onclick = () => {
      modal.style.display = "none";
    };
  }

  function updatePage(filteredData) {
    const productsContainer = document.querySelector(".items");
    const paginationContainer = document.querySelector(".pagination");
    displayPage(currentPage, filteredData, productsContainer);
    renderPagination(paginationContainer, filteredData, updatePage);
  }

  fetchData(url)
    .then((data) => {
      allData = data;
      extractFilters(data);
      const categoryContainer = document.querySelector(".categories");
      const shadeContainer = document.querySelector(".shades");
      generateFilterOptions(categoryContainer, extractedCategories, "category");
      generateFilterOptions(shadeContainer, extractedShades, "shade");
      updatePage(data);
    })
    .catch((error) => {
      console.error("Erreur lors de la récupération des données :", error);
    });
});

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
