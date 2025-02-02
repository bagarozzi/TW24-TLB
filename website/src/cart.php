<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Shopping Cart";
$templateParams["nome"] = "shoppingCart.php";
$templateParams["styleSheet"] = "css/cart.css";
$templateParams["scriptSheet"] = "js/cart.js";
$templateParams["includeSearchbar"] = false;
$templateParams["shoppingCart"] = $dbh->getShoppingCart("federicobagattoni@subito.it");
// AGGIUNGERE IL CONTROLLO DELLA SESSIONE PER IL LOGIN
require 'template/base.php';
?>