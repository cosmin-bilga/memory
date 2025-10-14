<div class="endgame-panel">
    <div class="victory-panel">
        <h1>Partie Terminée</h1>
        <p>Total actions: <?php echo $gameLogic->getMoves(); ?></p>
        <p>Temps requis: <?php echo $gameLogic->getGameTime(); ?></p>
    </div>
    <div class="highscore-panel">
        <h1>Classement:

            <!-- <form action="index.php" method="post">
        <input type="button" name="scoreboard" value="Scoreboard">
    </form> -->
        </h1>
        <?php echo Player::getHighScores($_SESSION['nb_of_pairs']); ?>
    </div>
</div>