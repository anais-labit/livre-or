<?php
// démarrer une session
session_start();
include './includes/header.php';
include './includes/connect.php';

// requete pour récupérer les commentaires, leur date au bon format et les logins des utilisateurs en associant l'id utilisateur du commentaire à l'id de l'utilisateur qui l'a posté + les trier par ordre décroissant
$catchComm = $conn->query("SELECT DATE_FORMAT(commentaires.date, '%d/%m/%Y'), utilisateurs.login, commentaires.commentaire FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id ORDER BY date DESC");
// fetech les données de la requete
$displayComm = $catchComm->fetch_all();
// var_dump($displayComm);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Livre d'or</title>
</head>

<body>
    <div class="page">
        <h1>Livre d'or</h1>
        <div class="livreContainer">
            <table>
                <tbody>
                    <td>
                        <?php
                        $i = -1;
                        // boucle 1 qui parcourt les différents tableaux de commentaire
                        foreach ($displayComm as $ligne) {
                            // boucle 2 qui parcourt les cases du tableau
                            foreach ($ligne as $value) {
                                $i++;
                                // echo les valeurs du tableau en fonction de leur index (0 = date, 1=login, 2=commentaire)
                                echo 'Posté le ' . $displayComm[$i][0] . ' par ' . $displayComm[$i][1] . "<br>" . $displayComm[$i][2] . '</p><br><br>';
                                // arrêter lorsqu'il n'y a plus de valeur à parcourir
                                break;
                            }
                        }
                        ?>
                    </td>
                </tbody>
            </table>
        </div>
        <?php
        // donner la possibilité de laisser un commentaire si on est connécté
        if (isset($_SESSION['login'])) { ?>
            <button><a href="commentaires.php">Laisser un commentaire</a></button>
        <?php }    ?>
    </div>
    <?php
    include './includes/footer.php';
    ?>



</body>

</html>