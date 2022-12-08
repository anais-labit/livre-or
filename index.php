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
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Accueil</title>
</head>

<body>
    <div class="page">
        <?php
        if (isset($_SESSION["login"])) {
            echo " <h1> Bienvenue " . ucwords($_SESSION['login']) . " !</h1>";
        } else {
            echo "<h1> Bienvenue ! </h1>";
        }
        ?>
        <div class="textContainer">
            <h3>Livre d'or : présentation et objectifs du projet</h3>
            <p>Coder un module de connexion permettant aux utilisateurs de créer leur compte, se connecter et modifier leurs informations. Ils pourront également laisser un commentaire et consulter ceux déjà en ligne.</p>
            <ul>Il fallait créer : <br><br>
                <li><i class="fa-solid fa-check"></i> Une base de données et des tables - à l’aide de phpmyadmin</li>
                <li><i class="fa-solid fa-check"></i> Une page d’accueil - présentation du site</li>
                <li><i class="fa-solid fa-check"></i> Un formulaire d’inscription - les données sont insérées dans la base de
                    données et l’utilisateur est redirigé vers la page de connexion</li>
                <li><i class="fa-solid fa-check"></i> Un formulaire de connexion - s’il existe un utilisateur en bdd correspondant à ces informations, alors
                    l’utilisateur devient connecté</li>
                <li><i class="fa-solid fa-check"></i> Une page permettant de modifier son profil - possibilité de modifier login et mot de passe de l'utilisateur connecté</li>
                <li><i class="fa-solid fa-check"></i> Une page permettant de voir le livre d’or - l’ensemble des commentaires, du plus récent au plus ancien, dans le format</li>
                <li><i class="fa-solid fa-check"></i> Un formulaire d’ajout de commentaire - accessible uniquement aux utilisateurs connectés</li>
                <li><i class="fa-solid fa-check"></i> Une structure html correcte et un design soigné à l’aide de css</li>
            </ul>
            <!-- <br> </br> -->
            <ul>Bonus <br><br>
                <li><i class="fa-solid fa-check"></i> Affichage conditionnel de la barre de navigation</li>
                <li><i class="fa-solid fa-check"></i> Suppression de compte</li>
            </ul>
        </div>
    </div>
    <?php
    include './includes/footer.php';
    ?>
</body>

</html>