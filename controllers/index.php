<?php

if (!isset($_SESSION["player"])) {
    header('Location: login.php');
}


if (isset($_POST["nb_of_pairs"])) {
    $_SESSION["nb_of_pairs"] = $_POST["nb_of_pairs"];
}



$player = $_SESSION["player"];
if (!isset($_SESSION["gameLogic"])) {
    //$player = new Player(1, "Cosmin", "mdp", "Cosmin");
    if (isset($_SESSION["nb_of_pairs"]))
        $gameLogic = new GameLogic($player, $_SESSION["nb_of_pairs"]);
    else
        $gameLogic = new GameLogic($player, 6);
    $_SESSION["gameLogic"] = $gameLogic;
} elseif (isset($_POST["reset"])) {
    $_SESSION['victory'] = null;
    $_SESSION["gameLogic"] = null;
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
