<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "HarvestHub";
$templateParams["nome"] = "mainpage.php";
$templateParams["styleSheet"] = "css/index.css";
$templateParams["includeSearchbar"] = true;
logOut();
require 'template/base.php';
?>