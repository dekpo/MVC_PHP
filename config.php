<?php
define("CONFIG_SITE_TITLE","The MVC PHP");
define("CONFIG_ROUTES",[
    "home" => "Home",
    "gallery" => "Gallery",
    "contact" => "Contact",
    "api" => "API JSON",
    "admin_list" => "Admin List"
]);
const DB_HOST = "localhost";
const DB_NAME = "dhqm1449_dekpo";
const DB_USER = "dhqm1449_dekpo";
const DB_PASS = "TszLoNRH01";

function connectDB(): PDO{
    $db = new PDO('mysql:host='.DB_HOST.';port=3333;dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
    return $db;
}