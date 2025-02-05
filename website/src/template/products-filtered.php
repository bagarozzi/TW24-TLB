<?php
require "../bootstrap.php";
   
$category = isset($_GET["category"]) ? $_GET["category"] : "";;
$sort = isset($_GET["sort"]) ? $_GET["sort"] : "";
$name = isset($_GET["name"]) ? $_GET["name"] : "";
$maxPrice = isset($_GET["maxPrice"]) ? $_GET["maxPrice"] : "";

$products = $dbh->getProducts($category,$name, $sort, $maxPrice);

require "display-products.php";
display($products);
?>