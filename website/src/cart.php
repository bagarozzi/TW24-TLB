<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';
$templateParams["titolo"] = "Shopping Cart";
$templateParams["nome"] = "shoppingCart.php";
$templateParams["styleSheet"] = "css/cart.css";
//$templateParams["scriptSheet"] = "js/cart.js";
$templateParams["includeSearchbar"] = false;

if (!isUserLoggedIn()) {
    $templateParams["previousPage"] = "cart.php";
    header('Location: login.php');
    exit;
}
else {
    $templateParams["shoppingCart"] = $dbh->getShoppingCart($_SESSION['email']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update_quantity') {
    $product_id = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    if (isset($_POST['increase'])) {
        $quantity++;
    } elseif (isset($_POST['decrease'])) {
        $quantity--;
    }
    
    if($quantity <= 0) {
        $dbh->removeFromShoppingCart($_SESSION['email'], $product_id);
    }
    else {
        $dbh->updateShoppingCart($_SESSION['email'], $product_id, $quantity);
    }

    header('Location: cart.php');
    exit;
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'checkout-order') {
    $email = $_SESSION['email'];
    $order_id = $dbh->createOrder($email);

    $dbh->createUserNotification($email, $order_id, "Ordine" . $order_id . " confermato", "Il tuo ordine è stato confermato.");
    $dbh->createAdminNotification("turbo", $order_id, "Ordine" . $order_id . " piazzato", "Un utente ha piazzato questo ordine.");

    header('Location: order-detail.php?ordernum=' . $order_id);
    exit;
}

require 'template/base.php';
?>