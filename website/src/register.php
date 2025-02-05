<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()) {
    header("Location: ./index.php");
    exit();
} elseif (isAdminLoggedIn()) {
    header("Location: ./index.php");
    exit();
} else { //if user is not logged in
    $templateParams["titolo"] = "Register";
    $templateParams["nome"] = "register-form.php";
    $templateParams["styleSheet"] = "css/register.css";
    $templateParams["includeSearchbar"] = false;
    
    if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["birthday"]) && isset($_POST["password"])) {
        if (count($dbh->checkUsername($_POST["email"]))) {
            // Registration failed
            $templateParams["error"] = "That email is already used";
        } else {
            $dbh->insertUser($_POST["email"], $_POST["password"] , $_POST["name"], $_POST["surname"], $_POST["birthday"]);
            $user = $dbh->getUserInfo($_POST["email"])[0];
            registerLoggedUser($user); //Login the user
            if (isset($_SESSION["previousPage"])) {
                header("Location: " . $_SESSION["previousPage"]);
            } else {
                header("Location: ./index.php");
            }
        }
    }
}

require 'template/base.php';
?>