<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Shopping Cart";
$templateParams["nome"] = "shoppingCart.php";
$templateParams["styleSheet"] = "css/cart.css";
//$templateParams["scriptSheet"] = "js/cart.js";
$templateParams["includeSearchbar"] = false;
$templateParams["shoppingCart"] = $dbh->getShoppingCart("federicobagattoni@subito.it");
// AGGIUNGERE IL CONTROLLO DELLA SESSIONE PER IL LOGIN

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update_quantity') {
    $product_id = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    if (isset($_POST['increase'])) {
        $quantity++;
    } elseif (isset($_POST['decrease'])) {
        $quantity--;
    }
    
    if($quantity <= 0) {
        $dbh->removeFromShoppingCart("federicobagattoni@subito.it", $product_id);
    }
    else {
        $dbh->updateShoppingCart("federicobagattoni@subito.it", $product_id, $quantity);
    }

    header('Location: cart.php');
    exit;
}

require 'template/base.php';
?>