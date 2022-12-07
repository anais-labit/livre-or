<?php
session_start();

include 'connect.php';

$login = $_SESSION['login'];
$eraseUser = $conn->query("DELETE FROM `utilisateurs` WHERE login='$login';"); 
echo "<p>" . "Votre compte a bien été supprimé" . "</p>" ; 
// détruire la session
unset($_SESSION['login']);
session_destroy();

// rediriger vers le formulaire d'inscription
header("refresh:3;url=../inscription.php");
