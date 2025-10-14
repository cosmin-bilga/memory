<?php

if (isset($_GET["action"]) and $_GET["action"] === "disconnect") {
    session_unset();
    $_SESSION['flash_message'] = "Vous êtes desormais déconnecté";
    header("Location: login.php");
}
//print_r($_POST);
// REGISTER
if (isset($_POST['register-submit'])) {
    //echo "ici";
    if ($_POST['password'] !== $_POST['password-confirm']) {
        $_SESSION['flash_message'] = "Les mots de passe ne sont pas identiques.";
        header("Location: register.php");
    }
    $player = Player::create($_POST['login'], $_POST['password'], $_POST['name']);
    if ($player !== false) {
        $_SESSION['flash_message'] = "Erreur création utilisateur, veuillez réesayer";
        header("Location: login.php");
    } else {
        $_SESSION['flash_message'] = "Utilisateur crée! Veuillez vous connecter";
        header("Location: register.php");
    }
}

//LOGIN
if (isset($_POST['login-submit'])) {
    $player = Player::connect($_POST['login'], $_POST['password']);
    if ($player !== false) {
        $_SESSION['player'] = $player;
        $_SESSION['flash_message'] = "Bienvenue " . $player->getName();
        header("Location: index.php");
    } else {
        $_SESSION['flash_message'] = "Veuillez verifier les identifients de connexion";
        header("Location: login.php");
    }
}
