<?php
// démarrer une session
session_start();
include './includes/header.php';
include './includes/connect.php';

// attribution d'une valeur par défaut aux POST pour éviter les erreurs
if (!isset($_POST["login"])) {
    $_POST["login"] = "";
    $_POST["pwd"] = "";
    $_POST["pwd2"] = "";
};

// création des variables issues des POST
$login = $_POST["login"];
$pwd = $_POST["pwd"];
$pwd2 = $_POST["pwd2"];

// requete pour récupérer le contenu de la DB
$catchUsers = $conn->query("SELECT * FROM utilisateurs WHERE login='$login';");
// et verifier si le login existe déjà en comptant les éventuels doublons
$users = mysqli_num_rows($catchUsers);

// si le login n'existe pas, qu'il y a une valeur à login et pwd et que les pwd correspondent
if (($users === 0) && ($login != NULL) && ($pwd != NULL) && ($pwd === $pwd2)) {
    // requete pour ajouter utilisateur dans la DB
    $newUser = $conn->query("INSERT INTO utilisateurs (`login`, `password`) VALUES ('$login','$pwd')");
    echo "Félicitations ! Votre compte a été créé avec succès";
    // refresh et redirection vers connexion
    header("refresh:2; url=connexion.php");
    // si le login existe
} elseif ($users === 1) {
    echo "Erreur lors de la création du compte: Login déjà utilisé ";
} elseif ($pwd !== $pwd2) {
    echo "Erreur lors de la création du compte: mots de passe différents";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Inscription</title>
</head>

<body>

    <div class="formContainer">
        <form action="inscription.php" method="post">
            <input type="text" name="login" placeholder="Choisissez un login" required>
            <input type="password" name="pwd" placeholder="Saississez un mot de passe" required>
            <input type="password" name="pwd2" placeholder="Confirmez votre mot de passe" required>
            <input type="submit" name="submit" value="Créer le compte">
        </form>
    </div>

    <?php include './includes/footer.php' ?>

</body>

</html>