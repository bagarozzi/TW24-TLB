<?php
require_once 'bootstrap.php';

if(isAdminLoggedIn()) {
    $templateParams["titolo"] = "HarvestHub - Admin";
    $templateParams["nome"] = "account-admin.php";
    $templateParams["includeSearchbar"] = false;
    $templateParams["categories"] = $dbh->getCategories();
    $templateParams["productResult"] = NULL;
    $templateParams["categoryResult"] = NULL;
    $templateParams["orders"] = $dbh->getAllOrders();

    //add category
    if(isset($_POST["categoryName"])) {
        if(in_array($_POST["categoryName"], array_column($templateParams["categories"], 'name'))) {
            $templateParams["categoryResult"] = "Category already exists";
        }
        else {
            $dbh->insertCategory($_POST["categoryName"]);
            $templateParams["categoryResult"] = "Category added successfully";
            $templateParams["categories"] = $dbh->getCategories();
        }
    }

    // add product
    if(isset($_POST["productName"]) && isset($_POST["productCategory"]) && isset($_POST["productPrice"]) && isset($_POST["productQuantity"]) && isset($_POST["productDescription"]) && isset($_FILES["productImage"])) {
        list($result, $msg) = uploadImage(PRODUCTS_DIR, $_FILES["productImage"]);
        if($result != 0) {
            $imgname = $msg;
            $id = $dbh->insertProduct($_POST["productName"], $_POST["productPrice"], $_POST["productDescription"], $imgname, $_POST["productQuantity"], $_POST["productCategory"]);
            if($id != false) {
                $templateParams["productResult"] = "Insertion successful";
            } else {
                $templateParams["productResult"] = "Insertion failed";
            }
        } else {
            $templateParams["productResult"] = $msg;
        }
    }

    if(isset($_POST["action"]) && $_POST["action"] == "order-operation") {
        $order_id = $_POST["order-id"];
        if(isset($_POST["ship-order"])) {
            
        }
        else if (isset($_POST["delete-order"])) {
            $dbh->deleteOrder($order_id);
        }
    }
} else if(isUserLoggedIn()) { //if user is logged in, redirect to index, not autorized
    header("Location: ./index.php");
}
else { //if user is not logged in, redirect to login
    header("Location: ./login.php");
}

require 'template/base.php';
?>