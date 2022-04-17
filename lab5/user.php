<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    require_once("funkcje.php");
    echo "<a href=\"index.php\">Index</a><br>";
    if ($_SESSION["zalogowany"] == 1) {
        echo "Zalogowano uzytkownika " . $_SESSION["zalogowanyImie"];
    } else {
        header("Location: index.php");
    }
    ?>
    <form action="index.php" method="post" enctype='multipart/form-data'>
        <input type="submit" name="wyloguj" value="Wyloguj">
    </form>
</body>

</html>