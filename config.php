<?php
define("CONFIG_SITE_TITLE","Mon modèle MVC PHP");
define("CONFIG_ROUTES",[
    "home" => "home",
    "gallery" => "gallery",
    "contact" => "contact"
]);
const DB_HOST = "localhost";
const DB_NAME = "my_mvc_bdd";
const DB_USER = "root";
const DB_PASS = "";
function connectDB(): PDO{
    $db = new PDO('mysql:host='.DB_HOST.';port=3333;dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
    return $db;
}