<?php
    
    $category=(isset($_GET["category"])) ? $_GET["category"] : ""; 
    $sort=(isset($_GET["sort"])) ? $_GET["sort"] : ""; 
    $name=(isset($_GET["name"])) ? $_GET["name"] : ""; 
    
    require_once 'bootstrap.php';
    $templateParams["includeSearchbar"] = true;
    $templateParams["styleSheet"] = "css\listProducts.css";
    $templateParams["nome"] = 'template/scrolling-products.php';
    if(isset($category)) {
        $templateParams["products"] = $dbh->getProducts($category, $name, $sort);
    }
    require 'template/base.php';
?>