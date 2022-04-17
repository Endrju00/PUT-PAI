<?php session_start(); ?>
<?php
    require("funkcje.php");
    
    if($osoba1->login == test_input($_POST["login"]) && $osoba1->haslo == test_input($_POST["haslo"])) {
        $_SESSION["zalogowanyImie"] = $osoba1->imieNazwisko;
        $SESSION["zalogowany"] = 1;
        header("Location: user.php");

    } else if ($osoba2->login == test_input($_POST["login"]) && $osoba2->haslo == test_input($_POST["haslo"])) {
        $_SESSION["zalogowanyImie"] = $osoba2->imieNazwisko;
        $_SESSION["zalogowany"] = 1;
        header("Location: user.php");

    } else {
        $_SESSION["zalogowany"] = 0;
        header("Location: index.php");
    }
