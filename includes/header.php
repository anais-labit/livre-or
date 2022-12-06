<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css" />
</head>

<body>

    <div class="navContainer">
        <nav>
            <ul>
                <?php
                if (isset($_SESSION['login'])) { ?>
                    <li><a href="./index.php">Accueil</a></li>
                    <li><a href="./profil.php">Gérer mon profil</a></li>
                    <li><a href="./livre-or.php">Voir les commentaires</a></li>
                    <li><a href="./commentaires.php">Ajouter un commentaire</a></li>
                <?php } else { ?>
                    <li><a href="./index.php">Accueil</a></li>
                    <li><a href="./inscription.php">Inscription</a></li>
                    <li><a href="./connexion.php">Connexion</a></li>
                <?php } ?>

            </ul>
        </nav>
    </div>

</body>

</html>