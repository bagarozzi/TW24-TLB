<?php
require_once 'bootstrap.php';

if(isAdminLoggedIn()) {
    $templateParams["titolo"] = "Admin - Orders";
    $templateParams["nome"] = "form-admin-orders.php";
    $templateParams["includeSearchbar"] = false;
    $templateParams["orders"] = $dbh->getAllOrders();

    if(isset($_POST["action"]) && $_POST["action"] == "order-operation") {
        $order_id = $_POST["order-id"];
        if(isset($_POST["change-order-state"])) {
            $currentOrder = $dbh->getSingleOrder($order_id);
            if($currentOrder[0]["stato"] == "confermato") {
                $dbh->updateOrderStatus($order_id, "spedito");
                $dbh->createUserNotification($currentOrder[0]["email"], $order_id, "L'ordine " . $order_id . " è stato spedito", "L'ordine è stato spedito");
            } else if ($currentOrder[0]["stato"] == "spedito") {
                $dbh->createUserNotification($currentOrder[0]["email"], $order_id, "L'ordine " . $order_id . " è stato consegnato", "L'ordine è stato consegnato correttamente");
                $dbh->updateOrderStatus($order_id, "consegnato");
            }
        }
        else if (isset($_POST["delete-order"])) {
            $dbh->deleteOrder($order_id);
        }
        header("Location: ./admin-orders.php");
        exit;
    }

} else if(isUserLoggedIn()) { //if user is logged in, redirect to index, not autorized
    header("Location: ./index.php");
}
else { //if user is not logged in, redirect to login
    header("Location: ./login.php");
}

require 'template/base.php';
?>