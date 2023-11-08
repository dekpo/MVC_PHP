<?php
$error = '';
// SI LE FORMULAIRE EST ENVOYE
if (isset($_POST['name'])) {
    // ON NETTOIE L'EMAIL EN ENLEVANT LES BALISES HTML
    // (pas obligatoire c'est juste un exemple ici...)
    // ON PEUT AUSSI UTILISER htmlspecialchars() qui est plus courant
    $email = strip_tags($_POST['email']);
    // TEST DE LA CONFORMITE DU MAIL
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // LE MAIL EST CONFORME (un "vrai email") ON CONTINUE LA VERIF
        // TEST SI LE MAIL EXISTE DEJA DANS LA TABLE
        $db = connectDB();
        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        // if empty results 
        if ($stmt->rowCount() == 0) {
            // INSERT DANS LA TABLE PUISQUE LE MAIL EST BIEN UNIQUE ET CONFORME
            $sql = "INSERT INTO user SET name=?, email=?, password=?";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                strip_tags($_POST['name']),
                $email,
                password_hash(strip_tags($_POST["password"]), PASSWORD_DEFAULT)
            ]);
            $userAdded = true;
        } else {
            // LE MAIL EXISTE DEJA DANS LA TABLE
            $error = "Désolé cette adresse email existe déjà !";
        }
    } else {
        // LE MAIL N'EST PAS CONFORME
        $error = "Désolé veuillez renseigner une adresse email valide svp !";
    }
}

// --- on charge la vue
include "./views/layout.phtml";
