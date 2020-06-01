<?php


session_start();

setcookie('email', '', time() - 3600); // pas de cookie destroy donc on le met a vide et temps negatif.
setcookie('mdp', '', time()-3600);
unset($_COOKIE['email']);
unset($_COOKIE['mdp']);
session_unset();
session_destroy();

header('Location: http://localhost/projet-INFO642/connexion.php');
exit();

?>