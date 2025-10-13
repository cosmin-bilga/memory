<?php

if (!isset($_SESSION["player"])) {
    header('Location: login.php');
}

if (!isset($_SESSION["gameLogic"])) {
    //$player = new Player(1, "Cosmin", "mdp", "Cosmin");
    $player = $_SESSION["player"];
    $gameLogic = new GameLogic($player, 6);
    $_SESSION["gameLogic"] = $gameLogic;
} elseif (isset($_POST["reset"])) {
    session_unset();
    header('Location: index.php');
} else
    $gameLogic = $_SESSION["gameLogic"];

//echo "DEBUG";
//echo $gameLogic->getSelected();
//var_dump($_SESSION["gameLogic"]->getCardList());

if (isset($_POST["index"])) {
    if ($gameLogic->getSelected() === -1)
        $gameLogic->selectCard($_POST["index"]);
    else
        $gameLogic->checkPair($_POST["index"]);
}

if (!isset($_SESSION['victory'])) {
    if ($gameLogic->checkVictory())
        $_SESSION['victory'] = True;
}
