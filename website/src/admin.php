<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Personal Information";
$templateParams["nome"] = "account-admin.php";
//$templateParams["styleSheet"] = "";
$templateParams["includeSearchbar"] = false;

if (isAdminLoggedIn()) {
    $templateParams["title"] = "HarvestHub - Admin";
    $templateParams["nome"] = "account-admin.php";
    $templateParams["includeSearchbar"] = false;
    $templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["email"]);

    //add category
    if (isset($_POST["categoryName"])) {
        $dbh->insertCategory($_POST["categoryName"]);
        $templateParams["error"] = "Category added successfully";
        $templateParams["categories"] = $dbh->getCategories();
    }

    // add product
    if (isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_POST["productPrice"]) && isset($_POST["productAmount"]) && isset($_POST["duration"]) && isset($_FILES["productImages"]) && isset($_POST["category"]) && is_array($_POST['category'])) {
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["productImages"]);
        if ($result != 0) {
            $imgname = $msg;
            $id = $dbh->insertProduct($_POST["productName"], $_POST["productDescription"], $_POST["productPrice"], $_POST["productAmount"], $_POST["duration"], $imgname, 0.0);
            if ($id != false) {
                foreach ($_POST["category"] as $category) {
                    $dbh->insertProductIsCategory($category, $id);
                }
                $templateParams["error"] = "Insertion successful";
            } else {
                $templateParams["error"] = "Insertion failed";
            }
        } else {
            $templateParams["error"] = $msg;
        }
    }
?>