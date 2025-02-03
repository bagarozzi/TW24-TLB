<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Shopping Cart";
$templateParams["nome"] = "shoppingCart.php";
$templateParams["styleSheet"] = "css/cart.css";
//$templateParams["scriptSheet"] = "js/cart.js";
$templateParams["includeSearchbar"] = false;

//if (!isset($_SESSION['username'])) {
//    header('Location: login.php');
//    exit;
//}
//else {
    $templateParams["shoppingCart"] = $dbh->getShoppingCart($_SESSION['username']);
//}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update_quantity') {
    $product_id = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    if (isset($_POST['increase'])) {
        $quantity++;
    } elseif (isset($_POST['decrease'])) {
        $quantity--;
    }
    
    if($quantity <= 0) {
        $dbh->removeFromShoppingCart($_SESSION['username'], $product_id);
    }
    else {
        $dbh->updateShoppingCart($_SESSION['username'], $product_id, $quantity);
    }

    header('Location: cart.php');
    exit;
}

require 'template/base.php';
?>