<?php
// Si $_SESSION['user'] n'est pas défini on redirige sur le login
if (!isset($_SESSION['user'])) header("Location:?page=login");
require_once("./models/Picture.php");
// Si l'id est dans l'url on delete dans la table
// Si le delete dans la table a bien été effectué on unlink() le fichier
if (isset($_GET['id'])){
    $id = intval( $_GET['id'] );
    $picture = new Picture();
    // On fait une petite requète pour récupérer la source à supprimer
    $pic = $picture->getOneById($id);
    $srcToDelete = $pic["src"];
    // On fait la suppression de la ligne dans la table
    // Si la requète de suppression a bien été effectuée
    if ($picture->delete($id)){
        // Si le fichier existe on le supprime avec unlink()
        if (file_exists($srcToDelete)){
            unlink($srcToDelete);
        }
    }
    // Et on redirige sur l'admin_list
    header("Location:?page=admin_list");
}