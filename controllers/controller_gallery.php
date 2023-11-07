<?php
require_once("./models/Picture.php");
$pictures = Picture::getAll();
// --- on charge la vue
include "./views/layout.phtml";