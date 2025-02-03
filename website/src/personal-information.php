<?php
require_once 'bootstrap.php';

if (isUserLoggedIn()) {
    $templateParams["title"] = "HarvestHub - Personal Information";
    $templateParams["nome"] = "form-personal-information.php";
    $templateParams["includeSearchbar"] = false;
    $templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["email"]);

    // if form is submitted
    if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["birthday"]) && isset($_POST["password"])) {
        if ($_POST["password"] == $_POST["confirmPassword"]) {
            $userInfo = $dbh->getUserInfo($_SESSION["email"]);
            if ($userInfo && isset($userInfo[0])) { //user found
                //if password is not changed, keep the old one
                $password = $_POST["password"] == "" ? $userInfo[0]["password"] : $_POST["password"];
                //if a field was deleted, keep the old one
                $name = $_POST["name"] == "" ? $userInfo[0]["name"] : $_POST["name"];
                $surname = $_POST["surname"] == "" ? $userInfo[0]["surname"] : $_POST["surname"];
                $birthday = $_POST["birthday"] == "" ? $userInfo[0]["birthday"] : $_POST["birthday"];
                $email = $userInfo[0]["email"]; //email cannot be changed
                
                $success = $dbh->updateUser($email, $name, $surname, $birthday, $password);
                if ($success) { //update successful
                    $templateParams["result"] = "Update successful";
                    $templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["email"]);
                    updateUser($templateParams);
                } else { //update failed
                    $templateParams["result"] = "Update failed";
                }
            } else { //user not found
                $templateParams["result"] = "User not found";
            }
        } else {
            $templateParams["result"] = "You need to confirm the password";
        }
    }

    /*
    // check products in cart and update them
    foreach ($templateParams["cart"] as $product) {
        $amountLeft = $dbh->getProduct($product["id_product"])[0]["amount_left"];
        if ($amountLeft == 0) {
            // remove product
            $dbh->deleteProductFromCart($product["id_product"], $_SESSION["username"]);
            // notify user
            $description = outOfStockMessageUser($_SESSION["username"], $product["name"]);
            $dbh->insertNotification("Product out of stock", $description, username: $_SESSION["username"]);
        } elseif ($product["quantity"] > $amountLeft) {
            $description = amountChangedMessage($_SESSION["username"], $product["name"]);
            $dbh->insertNotification("Availability changed", $description, username: $_SESSION["username"]);
            $dbh->updateCartQuantity($_SESSION["username"], $product["id_product"], $amountLeft);
        }
    }
    */

} else if (isAdminLoggedIn()) {
    header("Location: admin.php");
} else {
    header("Location: login.php");
}

require 'template/base.php';
?>