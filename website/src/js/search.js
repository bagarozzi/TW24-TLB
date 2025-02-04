document.addEventListener("DOMContentLoaded", function() {
    // Intercetta l'invio del form di ricerca
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Impedisce il comportamento di submit normale

        const query = document.getElementById('searchInput').value; // Ottieni la query di ricerca

        if (query.trim() !== '') {
            searchProducts(query); // Chiamata alla funzione per cercare i prodotti
        }
    });
});

// Funzione per inviare la ricerca al server e aggiornare i risultati
function searchProducts(query) {
    fetch(`template/products-search.php?query=${encodeURIComponent(query)}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById("productsContainer").innerHTML = data; // Aggiorna i prodotti visualizzati
        })
        .catch(error => console.error('Errore nella ricerca:', error));
}