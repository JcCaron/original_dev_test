function toggleFilters() {
    var filterSection = document.getElementById("filterSection");
    var toggleButton = document.querySelector("button.btn-secondary");

    if (filterSection.style.display === "none") {
        filterSection.style.display = "block";
        toggleButton.textContent = "Masquer les filtres";
    } else {
        filterSection.style.display = "none";
        toggleButton.textContent = "Afficher les filtres";
    }
}