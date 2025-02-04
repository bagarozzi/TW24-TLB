<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "My Orders - HarverstHub";
$templateParams["nome"] = "order-list.php";
$templateParams["styleSheet"] = "css/index.css";
$templateParams["includeSearchbar"] = false;

if (!isUserLoggedIn()) {
  $templateParams["previousPage"] = "cart.php";
  header('Location: login.php');
  exit;
}
else {
  $templateParams["orders"] = $dbh->getOrders($_SESSION['email']);
}

require 'template/base.php';
?>