<?php
$db = connectDB();
$sql = $db->prepare("SELECT * FROM picture");
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

// --- la vue
include "./views/layout.phtml";