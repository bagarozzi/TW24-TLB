<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Home";
$templateParams["nome"] = "mainpage.php";
$templateParams["styleSheet"] = "css/index.css";
$templateParams["includeSearchbar"] = true;

require 'template/base.php';
?>