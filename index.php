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
    <title>Accueil</title>
</head>

<body>
    <div class="page">
        <?php
        if (isset($_SESSION["login"])) {
            echo " <h1> Bonjour " . ucwords($_SESSION['login']) . " !</h1>";
        } else {
            echo "<h1> Bonjour ! </h1>";
        }
        ?>
        <div class="textContainer">
            <h3>Livre d'or</h3>
            <h3>Objectifs du projet</h3>
            <p>Coder un module de connexion permettant aux utilisateurs de créer leur compte, se connecter et modifier leurs informations. <br> Ils pourront également laisser un commentaire et consulter ceux déjà en ligne.</p>
            <ul> Il faudra créer :
                <li>Une base de données et des tables - à l’aide de phpmyadmin</li>
                <li>Une page d’accueil - présentation du site</li>
                <li>Un formulaire d’inscription - les données sont insérées dans la base de
                    données et l’utilisateur est redirigé vers la page de connexion</li>
                <li>Un formulaire de connexion - s’il existe un utilisateur en bdd correspondant à ces informations, alors
                    l’utilisateur devient connecté</li>
                <li>Une page permettant de modifier son profil - possibilité de modifier login et mot de passe de l'utilisateur connecté</li>
                <li>Une page permettant de voir le livre d’or - l’ensemble des commentaires, du plus récent au plus ancien, dans le format : "posté le `jour/mois/année` par `utilisateur`"</li>
                <li>Un formulaire d’ajout de commentaire - accessible uniquement aux utilisateurs connectés.</li>
                <li>Une structure html correcte et un design soigné à l’aide de css</li>
            </ul>

            <ul>Bonus
                <li>Affichage conditionnel de la barre de navigation</li>
                <li>Chiffrement du mot de passe</li>
                <li>Suppression de compte</li>
            </ul>
        </div>
        <?php
        include './includes/footer.php';
        ?>

    </div>
</body>

</html>