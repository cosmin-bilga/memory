<div class="card-container">
    <?php
    if (isset($_SESSION['victory'])) {
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
<form action="index.php" method="post" class="options-form">
    <input type="submit" name="reset" value="Redemarrer Partie">
</form>