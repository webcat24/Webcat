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
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.querySelector(".modalboutique");
  const closeModalButton = modal.querySelector(".close-button");
  const modalImage = document.getElementById("modal-image");
  const modalTitle = document.getElementById("modal-title");
  const modalDescription = document.getElementById("modal-description");
  const modalPrice = document.getElementById("modal-price");
  const modalColor = document.getElementById("modal-color");
  const modalHex = document.getElementById("modal-hex");
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
    const productColor = product.dataset.color;
    const productHex = product.dataset.code_hexadecimal;

    modalImage.src = productImage;
    modalTitle.textContent = productName;
    modalDescription.textContent = productDescription;
    modalPrice.textContent = `$${productPrice}`;
    modalColor.textContent = `Couleur : ${productColor}`;
    modalHex.textContent = `Code Hex : ${productHex}`;
    modal.style.display = "flex";
  }

  function showPreviousProduct() {
    if (currentIndex > 0) {
      showProductModal(currentIndex - 1);
    } else {
      showProductModal(productItems.length - 1); // Aller au dernier produit
    }
  }

  function showNextProduct() {
    if (currentIndex < productItems.length - 1) {
      showProductModal(currentIndex + 1);
    } else {
      showProductModal(0); // Retourner au premier produit
    }
  }

  productItems.forEach((item, index) => {
    item.addEventListener("click", () => showProductModal(index));
  });

  document
    .getElementById("prev-button")
    .addEventListener("click", showPreviousProduct);
  document
    .getElementById("next-button")
    .addEventListener("click", showNextProduct);

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

    const modalColors = modalPalette.querySelectorAll(".color");
    attachColorEvents(modalColors);

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
(function () {
  let field = document.querySelector(".items");
  if (!field) {
    return;
  }
  let li = Array.from(field.children);

  const categoryContainer = document.querySelector(".categories");
  const colorContainer = document.querySelector(".colors");
  const shadeContainer = document.querySelector(".shades");
  if (!categoryContainer || !colorContainer || !shadeContainer) {
    console.warn(
      "Un ou plusieurs conteneurs de filtres (categories, colors, shades) sont introuvables."
    );
    return;
  }
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
        colors.add(color.trim());
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
        (item.getAttribute("data-color") || "").trim() === selectedColor;

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
