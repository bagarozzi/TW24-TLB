<?php
require_once 'bootstrap.php';

if(isAdminLoggedIn()) {
    $templateParams["titolo"] = "Admin - Product Insertion";
    $templateParams["nome"] = "form-admin-product-insertion.php";
    $templateParams["includeSearchbar"] = false;
    $templateParams["styleSheet"] = "./css/product-insertion.css";
    $templateParams["script"] = "js/category.js";
    $templateParams["categories"] = $dbh->getCategories();
    $templateParams["productResult"] = NULL;
    $templateParams["categoryResult"] = NULL;

    // manage category actions
    if(isset($_POST["action"]) && isset($_POST["categoryName"])) {
        $categoryName = $_POST["categoryName"];
        switch($_POST["action"]) {
            case 'add':
                if(in_array($categoryName, array_column($templateParams["categories"], 'name'))) {
                    $templateParams["categoryResult"] = "Category already exists";
                } else {
                    $dbh->insertCategory($categoryName);
                    $templateParams["categoryResult"] = "Category added successfully";
                    $templateParams["categories"] = $dbh->getCategories();
                }
                break;
            case 'edit':
                if(in_array($categoryName, array_column($templateParams["categories"], 'name'))) {
                    
                    $dbh->updateCategory($categoryId, $categoryName);
                    $templateParams["categoryResult"] = "Category updated successfully";
                    $templateParams["categories"] = $dbh->getCategories();
                } else {
                    $templateParams["categoryResult"] = "Category not found";
                }
                break;
            case 'delete':
                if(isset($_POST["action"]) && $_POST["action"] == 'delete' && isset($_POST["categoryId"])) {
                    $categoryId = $_POST["categoryId"];
                    if(in_array($categoryId, array_column($templateParams["categories"], 'id'))) {
                        $dbh->deleteCategory($categoryId);
                        $templateParams["categoryResult"] = "Category deleted successfully";
                        $templateParams["categories"] = $dbh->getCategories();
                    } else {
                        $templateParams["categoryResult"] = "Category not found";
                    }
                }
                break;
            default:
                $templateParams["categoryResult"] = "Invalid action";
                break;
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
} else if(isUserLoggedIn()) { //if user is logged in, redirect to index, not autorized
    header("Location: ./index.php");
}
else { //if user is not logged in, redirect to login
    header("Location: ./login.php");
}

require 'template/base.php';
?>