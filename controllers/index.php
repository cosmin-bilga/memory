<?php

if (!isset($_SESSION["gameLogic"])) {
    $player = new Player(1, "Cosmin", "mdp", "Cosmin");
    $gameLogic = new GameLogic($player, 6);
    $_SESSION["gameLogic"] = $gameLogic;
    $_SESSION["player"] = $player;
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
