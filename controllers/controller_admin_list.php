<?php
// Si $_SESSION['user'] n'est pas défini on redirige sur le login
if (!isset($_SESSION['user'])) header("Location:?page=login");
require_once("./models/Picture.php");
$pic = new Picture();
$pictures = $pic->getAll();
// --- on charge la vue
include "./views/layout.phtml";