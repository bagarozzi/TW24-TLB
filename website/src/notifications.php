<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Notifications";
$templateParams["nome"] = "notifications-list.php";
$templateParams["styleSheet"] = "css/notifications.css";
$templateParams["includeSearchbar"] = false;

if (isUserLoggedIn()) {
    $templateParams["notifications"] = $dbh->getNotifications($_SESSION['email']);
}
else {
    $templateParams["previousPage"] = "notifications.php";
    header('Location: login.php');
    exit;
}


require 'template/base.php';
?>