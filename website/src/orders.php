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
  $templateParams["orderds"] = $dbh->getOrders($_SESSION['username']);
}

require 'template/base.php';
?>