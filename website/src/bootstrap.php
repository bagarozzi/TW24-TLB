<?php
session_start();
define("RESOURCES_DIR", "./resources/");
define("SLIDES_DIR", RESOURCES_DIR . "slides/");
//define("PRODUCTS_DIR", RESOURCES_DIR . "products/");
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "HarvestHub", 3306);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>