<?php
$db = connectDB();
// on récupère la chaine de recherche depuis l'url
// on la convertit en texte en enlevant les espace...
$query = strtolower(strval(urldecode(trim($_GET['query']))));
$sql = $db->prepare("SELECT * FROM picture WHERE title LIKE '%".$query."%' OR description LIKE '%".$query."%' OR src LIKE '%".$query."%' OR author LIKE '%".$query."%'");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
// --- on charge la vue
include "./views/layout.phtml";