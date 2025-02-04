<?php
require_once 'bootstrap.php';
if (isUserLoggedIn() || isAdminLoggedIn()) {
    logout();
    header("Location: ./login.php");
} else {
    header("Location: ./index.php");
}
?>