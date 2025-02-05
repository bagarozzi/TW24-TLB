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
        sortProducts(sortType);
    });

    const dropdownMenu = document.getElementById('dropdown-menu-filter');
    // Funzione per evitare che il dropdown si chiuda quando clicchi all'interno del dropdown, ma non su un elemento specifico
    dropdownMenu.addEventListener("click", function (e) {
        e.stopPropagation();
    });

    // Funzione per aggiornare il valore dello slider
    const priceSlider = document.getElementById("priceSlider");
    const maxPrice = document.getElementById("maxPrice");

    maxPrice.addEventListener("input", function () {
        const value = parseFloat(maxPrice.value);
        if(value > parseFloat(maxPrice.getAttribute("max"))){
            maxPrice.value = parseFloat(maxPrice.getAttribute("max"));
        }
    });

    // Sincronizzare il valore tra lo slider e l'input numerico
    priceSlider.addEventListener("input", function () {
        maxPrice.value = priceSlider.value; 
    });

    // Funzione per applicare i filtri
    document.getElementById("applyFilters").addEventListener("click", function () {
        if (!document.getElementById("clearFilters")) {
            let nuovoElemento = document.createElement("li"); // Crea un <li>
            nuovoElemento.innerHTML = '<button id="clearFilters" class="btn btn-danger">❌ Rimuovi filtri</button>'; // Aggiunge testo
            document.getElementById("filter-container").appendChild(nuovoElemento);
            nuovoElemento.addEventListener("click", function (e) {
                updateProducts(["maxPrice", "category", "name"], []);
                document.getElementById("filter-container").removeChild(nuovoElemento);
            });
        }
        let category = document.getElementById("categoryFilter").value;
        let price = parseInt(maxPrice.value);
        filterProducts(price, category);
    });

})

function filterProducts(price, category) {
    updateProducts(["maxPrice", "category"], [
        { name: "maxPrice", value: price },
        { name: "category", value: category }
    ]);

}

function changeOrder(element) {
    let [nome, ordinamento] = element.getAttribute("data-sort").split(" ");
    ordinamento = (ordinamento === "DESC") ? "ASC" : "DESC";
    element.setAttribute("data-sort", `${nome} ${ordinamento}`);
}

function sortProducts(sortType) {
    updateProducts(["sort"], [{ name: "sort", value: sortType },]);

}

function updateProducts(paramDelete, newParam) {
    const params = new URLSearchParams(window.location.search);
    paramDelete.forEach(param => {
        params.delete(param);
    });
    newParam.forEach(param => {
        params.append(param["name"], param["value"]);
    })
    fetch(`template/products-filtered.php?${params.toString()}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById("productsContainer").innerHTML = data;
        })
        .catch(error => console.error('Errore:', error));
    window.history.pushState({}, "", `${window.location.pathname}?${params.toString()}`);
}