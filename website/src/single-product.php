<?php
require_once 'bootstrap.php';

if(isset($_POST["action"])) {
    if(isUserLoggedIn()) {
        $dbh->insertProductInCart($_GET["id"], $_SESSION["email"], $_POST["quantity"]);
        header("Location: " . $_SESSION["previousPage"]);
        exit();
    } else {
        header("Location: login.php");
        exit();
    }
}
$templateParams["includeSearchbar"] = true;
$templateParams["styleSheet"] = "css/product.css";
$templateParams["scriptSheet"]  = "js/product.js";
$templateParams["product"] = $dbh->getSingleProduct($_GET["id"]);
$templateParams["titolo"] = $templateParams["product"]["nome"];
$templateParams["categories"] = $dbh->getCategories();

if(isAdminLoggedIn()) {
    $templateParams["nome"] = "show-admin-product.php";
    if(isset($_POST["save_changes"])) {
        if(isset($_POST["nome"]) && isset($_POST["prezzo"]) && isset($_POST["descrizione"]) && isset($_POST["disponibilita"]) && isset($_POST["categoria"])) {
            if(isset($_FILES["immagine"]) && $_FILES["immagine"]["name"] != "") { //image uploaded
                list($result, $msg) = uploadImage(PRODUCTS_DIR, $_FILES["immagine"]);
                if($result != 0) {
                    $imgname = $msg;
                    $dbh->updateProduct($_POST["nome"], $_POST["prezzo"], $_POST["descrizione"], $imgname, $_POST["disponibilita"], $_POST["categoria"], $_POST["product_id"]);
                }
            } else { //no image uploaded
                $dbh->updateProductWithoutImage($_POST["nome"], $_POST["prezzo"], $_POST["descrizione"], $_POST["disponibilita"], $_POST["categoria"], $_POST["product_id"]);
            }
            header("Location: ./single-product.php?id=" . $_POST["product_id"]);
        }
    } else if(isset($_POST["delete_product"])) {
        $dbh->deleteProduct($_POST["product_id"]);
        header("Location: " . $_SESSION["previousPage"]);
    } 
    
} else {
    $templateParams["nome"] = 'show-single-product.php';
}
require 'template/base.php';
    
    
?>