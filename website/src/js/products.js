document.addEventListener('DOMContentLoaded', function() {
    const orderDropdown = document.getElementById("order-dropdown");
    orderDropdown.addEventListener('click', (e) => {
        const sortType = e.target.dataset.sort;
        const category = e.target.dataset.category;
        if (!sortType) return; 
        sortProducts(sortType, category);
    });
})

function sortProducts(sortType, category) {
    fetch(`template/products-sorted.php?category=${category}&sort=${sortType}`)
        .then(response => response.text()) // Ricevi la risposta come testo HTML
        .then(data => {
            document.getElementById("productsContainer").innerHTML = data;
        })
        .catch(error => console.error('Errore:', error));
}