<?php
require_once 'bootstrap.php';
$templateParams["nome"] = "shoppingCart.php";
$templateParams["styleSheet"] = "css/cart.css";
$templateParams["scriptSheet"] = "js/cart.js";
$templateParams["includeSearchbar"] = false;

require 'template/base.php';
?>