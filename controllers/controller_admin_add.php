<?php
// Si le formulaire est validé on insert dans la table
if (isset($_POST['submit'])){
    $db = connectDB();
    $sql = $db->prepare("INSERT INTO picture (title, description, src, author) VALUES (?,?,?,?)");
    $sql->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['src'],
        $_POST['author']
    ]);
    // Et on redirige sur l'adminlist
    header("Location:?page=admin_list");
}

// --- la vue
include "./views/layout.phtml";