<?php
$title = "Boutique";
$bodyClass = "profile";
require 'view_begin.php';
?>
<div class="product-container">
    <div class="filters">
        <div>
            <div class="filter-title">Catégories</div>
            <ul class="indicator categories">
            </ul>
        </div>
        <div>
            <div class="filter-title">Nuances</div>
            <ul class="indicator shades">
            </ul>
        </div>
    </div>

    <div class="product-field">
        <div class="wrapper">
            <div class="search-input">
                <a href="" target="_blank" hidden></a>
                <input type="text" placeholder="Type to search..">
                <div class="autocom-box">
                </div>
                <div class="icon">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
        <ul class="items" id="products-container">
        </ul>
        <div class="pagination"></div>
    </div>
</div>

<div class="modalboutique" style="display: none;">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <div class="modal-body">
            <div class="modal-left">
                <img id="modal-image" src="" alt="Product Image">
                <div class="navigation-buttons">
                    <span id="prev-button" class="nav-button">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    <span id="next-button" class="nav-button">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </div>
            </div>
            <div class="modal-right">
                <h2 id="modal-title"></h2>
                <p id="modal-price"></p>
                <button><span><i class="fas fa-shopping-basket"></i></span></button>
                <h3>Information produit</h3>
                <p id="modal-description">Description</p>
                <!-- <ul>
                    <li id="modal-color">Couleurs : </li>
                    <li id="modal-hex">Code Hex : </li>
                    <li id="modal-collection">Collection</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const paginationContainer = document.querySelector(".pagination");
        const totalPages = 50; // Nombre total de pages
        const maxVisibleButtons = 7; // Nombre maximum de boutons visibles à la fois
        let currentPage = 1; // Page actuelle

        function createPagination(totalPages, currentPage) {
            paginationContainer.innerHTML = ""; // Réinitialiser la pagination

            // Bouton Précédent
            const prevButton = document.createElement("button");
            prevButton.textContent = "«";
            prevButton.disabled = currentPage === 1;
            prevButton.addEventListener("click", () => updatePagination(currentPage - 1));
            paginationContainer.appendChild(prevButton);

            // Pages visibles
            const startPage = Math.max(1, currentPage - Math.floor(maxVisibleButtons / 2));
            const endPage = Math.min(totalPages, startPage + maxVisibleButtons - 1);

            for (let i = startPage; i <= endPage; i++) {
                const pageButton = document.createElement("button");
                pageButton.textContent = i;
                pageButton.classList.toggle("active", i === currentPage);
                pageButton.addEventListener("click", () => updatePagination(i));
                paginationContainer.appendChild(pageButton);
            }

            // Bouton Suivant
            const nextButton = document.createElement("button");
            nextButton.textContent = "»";
            nextButton.disabled = currentPage === totalPages;
            nextButton.addEventListener("click", () => updatePagination(currentPage + 1));
            paginationContainer.appendChild(nextButton);
        }

        function updatePagination(newPage) {
            currentPage = newPage;
            createPagination(totalPages, currentPage);
            // Appeler une fonction pour charger les éléments de la page (si nécessaire)
            console.log(`Page actuelle : ${currentPage}`);
        }

        // Initialiser la pagination
        createPagination(totalPages, currentPage);
    });

</script>
<?php
require 'view_end.php';
?>