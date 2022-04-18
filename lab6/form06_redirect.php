<?php
$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}
 if (isset($_POST['id_prac']) &&
    is_numeric($_POST['id_prac']) &&
    is_string($_POST['nazwisko']))
 {
    try {
        $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
        $result = $stmt->execute();
        if (!$result) {
            printf("Query failed: %s\n", mysqli_error($link));
        } else {
            $stmt->close();
            printf("Dodano nowy rekord!");
            echo '<meta http-equiv="refresh" content="3; URL=form06_get.php" />';
        }
    } catch (Exception) {
        printf("Błędne dane!");
        echo '<meta http-equiv="refresh" content="3; URL=form06_post.php" />';
    }
 } else {
    printf("Błędne dane!");
    echo '<meta http-equiv="refresh" content="1; URL=form06_post.php" />';
 }
?>