<?php
$error = "";
if (isset($_POST['upload'])){
    // On copie le fichier temporaire vers le dossier uploads
    // notre projet...
    $tempFile = $_FILES["image_file"]["tmp_name"];
    // On peut récupérer des infos sur le fichier temporaire
    // avec getimagesize()
    $checkFile = getimagesize($tempFile);
    // Si ce n'est pas une image $checkFile retourne false !
    if ($checkFile){
        // $checkFile['mime'] retourne "image/jpeg" par exemple
        // Donc on fait un array $tabFileName avec explode sur le slash /
        $tabFileName = explode("/",$checkFile['mime']);
        // Du coup l'estension de fichier c'est la clé 1 du tableau
        $ext = $tabFileName[1];
        // On précise le nom du fichier basé sur un timestamp
        $newFile = "./uploads/". time() .".".$ext;
        move_uploaded_file($tempFile,$newFile);
    } else {
        $error = "Nous n'acceptons que les images merci !";
    } 
}

include "./views/layout.phtml";