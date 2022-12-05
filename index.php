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
    include './includes/header.php';


    session_start();
    if (isset($_SESSION["login"])) {
        echo " <h1> Salut " . ucwords($_SESSION['login']) . " !</h1>";
    } else {
        echo "<h1> Salut ! </h1>";
    }
    ?>
    <h1>Bienvenue sur mon super site </h1>





    <?php
    include './includes/footer.php';
    ?>
</body>

</html>