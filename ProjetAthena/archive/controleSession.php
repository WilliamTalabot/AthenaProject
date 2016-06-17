<!--Page permettant de vérifier si l'utilisateur a le statut administrateur ou simple utilisateur-->
<?php 
    session_start();

    //Si le statut est 1, l'utilisateur est administrateur sinon il est simple utilisateur et un message d'erreur s'affiche si il tente d'entrer sur la page d'admin via l'url 
    if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1 || !isset($_SESSION["prenom_client"])) {
        header("location:connexion.php?erreurCO=3");
        exit();
}

?>
