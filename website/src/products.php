<?php
    
    $category=(isset($_GET["category"])) ? $_GET["category"] : ""; 
    $sort=(isset($_GET["sort"])) ? $_GET["sort"] : ""; 
    $name=(isset($_GET["name"])) ? $_GET["name"] : "";
    $maxPrice=(isset($_GET["maxPrice"])) ? $_GET["maxPrice"] : ""; 
    
    require_once 'bootstrap.php';
    $templateParams["includeSearchbar"] = true;
    $templateParams["styleSheet"] = "css/listProducts.css";
    $templateParams["nome"] = 'template/scrolling-products.php';
    $templateParams["categories"] = $dbh->getCategories();
    $templateParams["products"] = $dbh->getProducts($category, $name, $sort, $maxPrice);
    require 'template/base.php';
?>