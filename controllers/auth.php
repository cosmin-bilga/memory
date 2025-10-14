<?php

if (isset($_GET["action"]) and $_GET["action"] === "disconnect") {
    session_unset();
    header("Location: login.php");
}
//print_r($_POST);
// REGISTER
if (isset($_POST['register-submit'])) {
    //echo "ici";
    if ($_POST['password'] !== $_POST['password-confirm'])
        header("Location: register.php");
    $player = Player::create($_POST['login'], $_POST['password'], $_POST['name']);
    if ($player !== false)
        header("Location: login.php");
    else
        header("Location: register.php");
}

//LOGIN
if (isset($_POST['login-submit'])) {
    $player = Player::connect($_POST['login'], $_POST['password']);
    if ($player !== false) {
        $_SESSION['player'] = $player;
        header("Location: index.php");
    } else
        header("Location: login.php");
}
