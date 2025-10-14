<?php
if (isset($_SESSION["nb_of_pairs"])) { ?>
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
<?php }
require_once "launch_options.php" ?>