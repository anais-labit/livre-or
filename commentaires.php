<?php
// démarrer une session
session_start();
include './includes/header.php';
include './includes/connect.php';


// attribution d'une valeur par défaut aux POST pour éviter les erreurs avant la saisie de données
if (!isset($_POST["submit"])) {
    $_POST["commentaire"] = "";
    $_POST["login"] = "";
};

// création de la variable commentaire issue du POST en le formatant de telle sorte à ce que l'on puisse mettre des ' et caractères spéciaux dans le post
$commentaire = htmlspecialchars($_POST["commentaire"]);

// requete pour récupérer le contenu de la DB de l'utilisateur connecté
$login = $_SESSION["login"];
$catchUsers = $conn->query("SELECT * FROM utilisateurs WHERE login='$login';");
// fetch le contenu de la requête
$userInfo = $catchUsers->fetch_all();
// assigner id de l'user à une variable
$id = $userInfo[0][0];
// var_dump($id);
// et le mettre au on type (int)
$intId = (int)$id;
// echo $intId;


// création d'une requete pour ajouter le commentaire en DB si le bouton a été cliqué
if (isset($_POST['submit'])) {

    // definir le format de la date compatible avec la DB
    $date = date('Y-m-d H:i:s');
    // requete pour l'ajout du commentaire avec les valeurs de l'utilisateur associé + date 
    $newComm = $conn->query("INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$commentaire', '$intId', '$date')");
    echo "Votre commentaire a bien été publié. Merci " . $_SESSION['login'] . " !";
    // rediriger vers la page avec tous les commentaires déjà postés
    header("refresh:2; url=livre-or.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>Ajout de commentaire</title>
</head>

<body>
    <h3>Ajouter un commentaire</h3>
    <div class="formContainer">
        <form action="commentaires.php" method="post">
            <textarea name="commentaire" placeholder="Écrire ici..." style="height: 100px" required></textarea>
            <input type="submit" name="submit" value="Publier votre commentaire">
        </form>
    </div>


    <?php
    include './includes/footer.php';
    ?>

</body>

</html>