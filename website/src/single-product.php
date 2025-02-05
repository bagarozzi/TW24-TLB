<?php
    require_once 'bootstrap.php';
    $templateParams["includeSearchbar"] = true;
    $templateParams["styleSheet"] = "css/product.css";
    $templateParams["scriptSheet"]  = "js/product.js";
    $templateParams["nome"] = 'template/show-single-product.php';
    $templateParams["product"] = $dbh->getSingleProduct($_GET["id"]);
    $templateParams["titolo"] = $templateParams["product"]["nome"];
    require 'template/base.php';


    if(isset($_POST["action"])) {
        if(isset($_SESSION["email"])) {
            $dbh->insertProductInCart($_GET["id"], $_SESSION["email"], $_POST["quantity"]);
        } else {
            header("Location: login.php");
            exit();
        }
    }
    
?>