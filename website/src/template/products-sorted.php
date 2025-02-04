<?php
require "../bootstrap.php";
if(isset($_GET["category"])) {
    $category = $_GET["category"];
}
$sort = isset($_GET["sort"]) ? $_GET["sort"] : "nome";

if($sort == "nessuno") {
    $products = $dbh->getProductsByCategory($category);
} else {
    $products = $dbh->getProductsSorted($category, $sort);
}

require "display-products.php";
display($products);
?>