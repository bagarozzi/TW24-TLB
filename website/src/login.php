<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()) {
    header("Location: ./index.php");
    exit();
} elseif (isAdminLoggedIn()) {
    header("Location: ./admin.php");
    exit();
} else { //if user is not logged in
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "login-form.php";
    //$templateParams["styleSheet"] = "css/.css";
    $templateParams["includeSearchbar"] = false;
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        $result = $dbh->getAdminPassword($_POST["username"]);
        if(!empty($result) && isset($result[0]["password"]) && $result[0]["password"] == $_POST["password"]) {
            registerAdminLogged($_POST);
            header("Location: ./admin.php");
            exit();
        }
        $result = $dbh->getUserPassword($_POST["username"]);
        if(!empty($result) && isset($result[0]["password"]) && $result[0]["password"] == $_POST["password"]) {
            $user = $dbh->getUserInfo($_POST["username"])[0];
            registerLoggedUser($user);
            if (isset($_SESSION["previousPage"])) {
                header("Location: " . $_SESSION["previousPage"]);
            } else {
                header("Location: ./index.php");
            }
            exit();
        } else {
            $templateParams["error"] = "Error! Check username or password!";
        }
    }
}

require 'template/base.php';
?>