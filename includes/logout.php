<!-- détruire la session à la deconnexion -->
<?php
session_start();
unset($_SESSION['login']);
session_destroy();
header('Location:../connexion.php');
