<?php
require "../bootstrap.php";
if(isset($_GET["category"])) {
    $category = $_GET["category"];
}
$sort = isset($_GET["sort"]) ? $_GET["sort"] : "nome"; // Ordine predefinito

// Recupera i prodotti ordinati dal database
if($sort == "nessuno") {
    $products = $dbh->getProductsByCategory($category);
} else {
    $products = $dbh->getProductsSorted($category, $sort);
}

require "display-products.php";
display($products);
// Genera l'HTML dei prodotti
?>