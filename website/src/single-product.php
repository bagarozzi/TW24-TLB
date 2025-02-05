<?php
    require_once 'bootstrap.php';
    $templateParams["includeSearchbar"] = true;
    $templateParams["styleSheet"] = "css\product.css";
    $templateParams["scriptSheet"]  = "js/product.js";
    $templateParams["nome"] = 'template/show-single-product.php';
    $templateParams["product"] = $dbh->getSingleProduct($_GET["id"]);
    require 'template/base.php';
?>