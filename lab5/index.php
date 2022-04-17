<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    require("funkcje.php");
    echo "<a href=\"user.php\">User</a><br>";
    echo "<h1>Nasz system</h1>";
    // if(isset($_POST["zaloguj"])) {
    //     echo "Przesłany login: " . test_input($_POST["login"]);
    //     echo "<br>Przesłane hasło: " . test_input($_POST["haslo"]);
    // }
    if (isset($_POST["wyloguj"])) {
        $_SESSION["zalogowany"] = 0;
    }

    if (isset($_COOKIE["nazwa"])) {
        echo "Cookie: " . $_COOKIE["nazwa"];
    }
    ?>
    <form action="logowanie.php" method="post">
        <label for="logowanie">Formularz logowania</label>
        <fieldset name="logowanie">
            <label for="login">Login: </label>
            <input type="text" name="login"><br>

            <label for="password">Hasło: </label>
            <input type="password" name="haslo"><br>
            <input type="submit" name="zaloguj" value="Zaloguj">
        </fieldset>
    </form>
    <br>
    <form action="cookie.php" method="post">
        <label for="cookies">Ciasteczka</label>
        <fieldset name="cookies">
            <input type="number" name="czas"><br>
            <input type="submit" name="utworzCookie" value="Utworz cookie">
        </fieldset>
    </form>
</body>

</html>