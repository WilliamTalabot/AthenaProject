<!--Page permettant la déconnexion de l'utilisateur-->
<?php
//Ouvre la variable de session.
    session_start();
//Ferme la variable de session.
    session_destroy();
//Renvoie à la page d'accueil du site
    header("location:../index.php");
?>