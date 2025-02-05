<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Notifications";
$templateParams["nome"] = "notifications-list.php";
$templateParams["styleSheet"] = "css/notifications.css";
$templateParams["includeSearchbar"] = false;

if (isUserLoggedIn()) {
    $templateParams["notifications"] = $dbh->getNotifications($_SESSION['email']);
}
else if (isAdminLoggedIn()) {
    $templateParams["notifications"] = $dbh->getAdminNotifications();
}
else {
    $templateParams["previousPage"] = "notifications.php";
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'read_notification') {
    $notification_id = $_POST['notification_id'];

    $dbh->markNotificationAsRead($notification_id);

    header('Location: notifications.php');
    exit;
}
else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'remove_notification') {
    $notification_id = $_POST['notification_id'];

    $dbh->removeNotification($notification_id);

    header('Location: notifications.php');
    exit;
}

require 'template/base.php';
?>