document.addEventListener("DOMContentLoaded", function () {
    // Récupérer tous les titres du footer
    const footerTitles = document.querySelectorAll(".footer-title");

    footerTitles.forEach((title) => {
        title.addEventListener("click", () => {
            const links = title.nextElementSibling; // Sélectionner les liens correspondants
            if (links) {
                // Basculer l'affichage des liens
                links.style.display = links.style.display === "block" ? "none" : "block";
            }
        });
    });
});
