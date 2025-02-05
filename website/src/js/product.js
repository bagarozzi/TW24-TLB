document.addEventListener('DOMContentLoaded', function () {
    quantity = document.getElementById("quantity");
    quantity.addEventListener("input", function () {
        const value = parseFloat(quantity.value);
        if (value > parseFloat(quantity.getAttribute("max"))) {
            quantity.value = parseFloat(quantity.getAttribute("max"));
        }
    });

    document.getElementById("add-cart").addEventListener("input", function () {
        const params = new URLSearchParams(window.location.search);
        
    });
})