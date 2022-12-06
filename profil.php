<?php
// démarrer une session
session_start();
include './includes/header.php';
include './includes/connect.php';

// récupéer les valeurs de session
$login = $_SESSION['login'];
$pwd = $_SESSION['pwd'];

// modifier les informations
// requete pour récupérer les infos de la DB
$catchInfos = $conn->query("SELECT login, password FROM utilisateurs WHERE login = '$login'");
$displayInfos = $catchInfos->fetch_all();

// si le formulaire est envoyé
if (isset($_POST['submit'])) {
    // les post deviennent les nouvelles valeurs
    $confpwd = ($_POST['confpwd']);
    $newpwd2 = ($_POST['newpwd2']);
    $newpwd = ($_POST['newpwd']);
    $newlogin = ($_POST['login']);

    // si l'ancien pwd est le bon et que les nouveaux pwd correspondent
    if (($confpwd == $pwd) && ($newpwd == $newpwd2)) {
        // faire la requete de mise à jour de la db avec les nouvelles valeurs
        $upInfo = $conn->query("UPDATE utilisateurs SET login ='$newlogin', password = '$newpwd' WHERE login='$login'");
        echo "Les modifications ont bien été prises en compte";
        // et sauver les nouvelles valeurs
        $_SESSION['login'] = $newlogin;
        $_SESSION['pwd'] = $newpwd;
        header("Refresh:2");
    } else {
        echo "Mots de passe invalides";
    }
    // } else {
    //     header('Location: connexion.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon profil</title>
</head>

<body>
    <?php
    // salut personnalisé s'il y a un login
    if (isset($login)) {
        echo " <h1> Salut " . ucwords($login) . " !</h1>";
    } else {
        echo "<h1> Salut ! </h1>";
    }
    ?>
    <h3>Modifier votre profil</h3>

    <div class="formContainer">
        <form action="profil.php" method="post">
            <input type="text" name="login" placeholder="Login : <?= $login ?> ou nouveau ?" required>
            <input type="password" name="confpwd" placeholder="Ancien mot de passe" required>
            <input type="password" name="newpwd" placeholder="Nouveau Mot de passe" required>
            <input type="password" name="newpwd2" placeholder="Confirmation" required>
            <input type="submit" name="submit" value="Sauvegarder les changements">
        </form>
    </div>

    <?php
    include './includes/footer.php';
    ?>
</body>

</html>