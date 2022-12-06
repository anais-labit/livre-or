<?php
// démarrer une session
session_start();
include './includes/header.php';
include './includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <?php
    if (isset($_SESSION["login"])) {
        echo " <h1> Salut " . ucwords($_SESSION['login']) . " !</h1>";
    } else {
        echo "<h1> Salut ! </h1>";
    }
    ?>
    <h3>Bienvenue sur mon super site </h3>


    <?php
    include './includes/footer.php';
    ?>
</body>

</html>