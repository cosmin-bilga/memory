<?php

if (isset($_GET["action"]) and $_GET["action"] === "disconnect") {
    session_unset();
    header("Location: login.php");
}

// REGISTER
if (isset($_POST['register-submit'])) {
    echo "ici";
    if ($_POST['password'] !== $_POST['password-confirm'])
        header("Location: login.php");
    $player = Player::create($_POST['login'], $_POST['password'], $_POST['name']);
    if ($player)
        header("Location: login.php");
    header("Location: register.php");
}

//LOGIN
if (isset($_POST['login-submit'])) {
    $player = Player::connect($_POST['login'], $_POST['password']);
    if ($player) {
        $_SESSION['player'] = $player;
        header("Location: index.php");
    }
    header("Location: login.php");
}
