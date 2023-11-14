<?php
require_once("./models/User.php");
// on récupère l'id depuis l'url
// on la convertit en entier pour être plus prudent...
$errors = [];
if (isset($_POST['submit'])){
    $email = strip_tags($_POST['email']);
    $userDb = new User();
    $user = $userDb->getOneByEmail($email);
    if (!is_array($user)){
        $errors[] = "Vous n'avez pas de compte veuillez pour <a href=\"?page=register\">enregistrer</a> svp.";
    }
    $passVerif = $user ? password_verify(strip_tags($_POST['password']),$user['password']) : true;
    if (!$passVerif){
        $errors[] = "Désolé Login/Mot-de-passe incorrect(s).";
    }
    if (empty($errors)){
        $_SESSION['user'] = $user;
        header("Location:?page=admin_list");
    }
}

// --- la vue
include "./views/layout.phtml";