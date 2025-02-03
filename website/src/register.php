<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()) {
    header("Location: ./index.php");
    exit();
} elseif (isAdminLoggedIn()) {
    header("Location: ./admin.php");
    exit();
} else { //if user is not logged in
    $templateParams["titolo"] = "Register";
    $templateParams["nome"] = "register-form.php";
    $templateParams["styleSheet"] = "css/register.css";
    $templateParams["includeSearchbar"] = false;
    
    if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["birthday"]) && isset($_POST["password"])) {
        $result = $dbh->getUserPassword($_POST["username"]);
        if(empty($result)) {
            $dbh->insertUser($_POST["username"], $_POST["password"], $_POST["email"], $_POST["name"], $_POST["surname"], $_POST["address"], $_POST["city"], $_POST["cap"]);
            $user = $dbh->getUserInfo($_POST["username"])[0];
            registerLoggedUser($user);
            header("Location: ./index.php");
            exit();
        } else {
            $templateParams["error"] = "Error! Username already in use!";
        }
    }
}

require 'template/base.php';
?>