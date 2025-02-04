<?php
require_once 'bootstrap.php';

if(isAdminLoggedIn()) { //TODO: implement
    $templateParams["titolo"] = "HarvestHub - Admin";
    $templateParams["nome"] = "account-admin.php";
    $templateParams["includeSearchbar"] = false;
    $templateParams["categories"] = $dbh->getCategories();

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
    if(isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_POST["productPrice"]) && isset($_POST["productAmount"]) && isset($_POST["duration"]) && isset($_FILES["productImages"]) && isset($_POST["category"]) && is_array($_POST['category'])) {
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["productImages"]);
        if($result != 0) {
            $imgname = $msg;
            $id = $dbh->insertProduct($_POST["productName"], $_POST["productDescription"], $_POST["productPrice"], $_POST["productAmount"], $_POST["duration"], $imgname, 0.0);
            if($id != false) {
                foreach ($_POST["category"] as $category) {
                    $dbh->insertProductIsCategory($category, $id);
                }
                $templateParams["productResult"] = "Insertion successful";
            } else {
                $templateParams["productResult"] = "Insertion failed";
            }
        } else {
            $templateParams["productResult"] = $msg;
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