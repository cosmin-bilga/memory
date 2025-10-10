<div class="card-container">
    <?php
    if ($gameLogic->checkVictory()) {
        include "templates/victory_screen.php";
    } else {
        $index = 0;
        foreach ($gameLogic->getCardList() as $card) {
            echo $card->toHtml($index);
            $index += 1;
        }
    }
    ?>
</div>
<form action="index.php" method="post">
    <input type="submit" name="reset" value="Redemarrer Partie">
</form>