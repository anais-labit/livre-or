<?php
include './includes/header.php';
include './includes/connect.php';

// attribution d'une valeur par défaut aux POST pour éviter les erreurs
if (!isset($_POST["login"])) {
    $_POST["login"] = "";
    $_POST["pwd"] = "";
};

// création des variables issues des POST
$login = $_POST["login"];
$pwd = $_POST["pwd"];

// requete pour récupérer le contenu de la DB
$catchUsers = $conn->query("SELECT * FROM utilisateurs WHERE login='$login';");
// et verifier si le login existe déjà en comptant les éventuels doublons
$users = mysqli_num_rows($catchUsers);

// si le login existe, qu'il y a une valeur à login et pwd 
if (($users === 1) && ($login != NULL) && ($pwd != NULL)) {
    // définir les valeurs de session
    $_SESSION["login"] = $login;
    $_SESSION["pwd"] = $pwd;
    // puis valider la connexion en redirigeant vers profil.php
    echo "Connexion réussie";
    header("refresh:2; url=profil.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <div class="formContainer">
        <form action="connexion.php" method="post">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="pwd" placeholder="Mot de passe" required>
            <input type="submit" name="submit" value="Connexion">
        </form>
    </div>

    <?php
    include './includes/footer.php';
    ?>
</body>

</html>