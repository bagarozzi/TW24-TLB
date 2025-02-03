<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Notifications";
$templateParams["nome"] = "notifications-list.php";
$templateParams["styleSheet"] = "css/notifications.css";
$templateParams["includeSearchbar"] = false;
$templateParams["notifications"] = $dbh->getNotifications("federicobagattoni@subito.it");

require 'template/base.php';
?>