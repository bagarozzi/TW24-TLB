<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "My Orders - HarverstHub";
$templateParams["nome"] = "detail-table.php";
$templateParams["styleSheet"] = "css/index.css";
$templateParams["includeSearchbar"] = false;

if (!isUserLoggedIn()) {
  $templateParams["previousPage"] = "orders.php";
  header('Location: login.php');
  exit;
}
else {
  if(isset($_GET["ordernum"])) {
    $templateParams["orderDetails"] = $dbh->getOrderDetails($_GET["ordernum"]);
    $templateParams["orderNumber"] = $_GET["ordernum"];
  }
}

require 'template/base.php';
?>