<div class="victory-screen">
    <h1>Partie Terminée</h1>
    <p>Total actions: <?php echo $gameLogic->getMoves(); ?></p>
    <p>Temps requis: <?php echo $gameLogic->getGameTime(); ?></p>
    <p>Classement:

        <!-- <form action="index.php" method="post">
        <input type="button" name="scoreboard" value="Scoreboard">
    </form> -->
    </p>
    <a href="index.php?page=high_score">Voir les meilleurs scores:</a>
    <?php //echo Player::getHighScores(6); 
    ?>
</div>