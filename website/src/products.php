<?php
    require_once 'bootstrap.php';
    $templateParams["nome"] = 'template/scrolling-products.php';
    if(isset($_GET)) {
        $category = $_GET["category"];
    }
    if(isset($category)) {
        $templateParams["products"] = $dbh->getProductsByCategory($category);
    }
    require 'template/base.php';
?>