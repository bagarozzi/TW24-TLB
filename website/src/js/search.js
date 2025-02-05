document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const name = document.getElementById('searchInput').value;
        const params = new URLSearchParams(window.location.search);
        params.delete("name");
        params.append("name", name);
        if (window.location.href.includes("products.php")) {
            fetch(`template/products-filtered.php?${params.toString()}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("productsContainer").innerHTML = data;
                })
                .catch(error => console.error('Errore:', error));
            window.history.pushState({}, "", `${window.location.pathname}?${params.toString()}`);
        } else {
            window.location.href = `products.php?${params.toString()}`;
        }
    });
});
