<?php
$db = connectDB();
$sql = $db->prepare("SELECT * FROM picture ORDER BY id DESC");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
// --- on charge la vue
include "./views/layout.phtml";