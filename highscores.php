<?php
require_once "models/Player.php";
require_once "models/GameLogic.php";

if (session_status() === PHP_SESSION_NONE)
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include "templates/header.php"; ?>

<body><?php
        include "templates/highscore_page.php"; ?>
</body>

</html>