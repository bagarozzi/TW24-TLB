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
            case 'save': //edit
                if(in_array($categoryName, array_column($templateParams["categories"], 'name'))) {
                    if(isset($_POST["newCategoryName"])) { //new category name provided
                        $newCategoryName = $_POST["newCategoryName"];
                        if($categoryName == $newCategoryName) { //new category name is the same as the old one
                            $templateParams["categoryResult"] = "New category name is the same as the old one";
                            break;
                        } else if(in_array($newCategoryName, array_column($templateParams["categories"], 'name'))) {
                            $templateParams["categoryResult"] = "Category already exists";
                            break;
                        } else { //new category name is different from the old one
                            $result = $dbh->updateCategory($newCategoryName, $categoryName);
                            if($result) { //category updated successfully
                                $templateParams["categories"] = $dbh->getCategories();
                                $templateParams["categoryResult"] = "Category updated successfully";
                            } else { //category not updated
                                $templateParams["categoryResult"] = "New category name not provided";
                                break;
                            }
                        }
                    } else { //new category name not provided
                        $templateParams["categoryResult"] = "New category name not provided";
                        break;
                    }
                } else { //category not found in db
                    $templateParams["categoryResult"] = "Category not found";
                }
                break;
            case 'delete':
                if(in_array($categoryName, array_column($templateParams["categories"], 'name'))) {
                    $result = $dbh->deleteCategory($categoryName);
                    if($result) {
                        $templateParams["categories"] = $dbh->getCategories();
                        $templateParams["categoryResult"] = "Category deleted successfully";
                    } else {
                        $templateParams["categoryResult"] = "Category not deleted";
                    }
                } else {
                    $templateParams["categoryResult"] = "Category not found";
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