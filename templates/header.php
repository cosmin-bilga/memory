<header>
    <nav>
        <a href="index.php">Jeu</a>
        <?php if (!isset($_SESSION['player'])) { ?>
            <a href="register.php">Inscription</a>
            <a href="login.php">Connexion</a>
        <?php } ?>
        <a href="highscores.php">Meilleurs scores</a>
        <?php if (isset($_SESSION['player'])) { ?>
            <a href="login.php?action=disconnect">Déconnexion</a>
        <?php } ?>
    </nav>
    <?php if (isset($_SESSION['flash_message'])) { ?>
        <div class="flash-message"><?php echo $_SESSION['flash_message']; ?></div>
    <?php } ?>
</header>