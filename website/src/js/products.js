document.addEventListener('DOMContentLoaded', function () {
    const orderDropdown = document.getElementById("order-dropdown");
    orderDropdown.addEventListener('click', (e) => {
        const sortType = e.target.dataset.sort;
        const category = e.target.dataset.category;
        if (sortType != "") {
            const elemento = document.querySelector('.dropdown-item[data-sort=""]');
            if (!elemento) {
                document.getElementById("order-dropdown").insertAdjacentHTML(
                    "afterbegin",
                    `<li><button class="dropdown-item" data-sort="" data-category="${category}">Togli ordinamento</button></li>`);
            }
            changeOrder(e.target);
        } else if (sortType == "") {
            const elemento = document.querySelector('.dropdown-item[data-sort="nessuno"]');
            if (elemento) {
                elemento.remove();
            }
        }
        sortProducts(sortType, category);
    });
})

function changeOrder(element) {
    let [nome, ordinamento] = element.getAttribute("data-sort").split(" ");
    ordinamento = (ordinamento === "DESC") ? "ASC" : "DESC";
    element.setAttribute("data-sort", `${nome} ${ordinamento}`);
}

function sortProducts(sortType, category) {
    fetch(`template/products-filtered.php?category=${category}&sort=${sortType}`)
        .then(response => response.text()) // Ricevi la risposta come testo HTML
        .then(data => {
            document.getElementById("productsContainer").innerHTML = data;
        })
        .catch(error => console.error('Errore:', error));
}