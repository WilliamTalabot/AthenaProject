<?php 
    //connexion à la base de données
    include("php/connectDB.php");
    //Ouvre la variable de session.
    session_start();
    //On vérifie que l'utilisateur est connecté
    if (isset($_SESSION["prenom_client"])) $prenom_client = $_SESSION["prenom_client"];
    include("php/ajoutPanier.php")
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Athena</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/athena-style.css" rel="stylesheet">
    </head>   
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="index.php">Athena</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="produit.php">Produits</a></li>
                        <?php 
                            if (isset($prenom_client)) echo "<li><a href='deposeArticle.php'>Déposer un article</a></li>"
                        ?>
                    </ul>
                    <form class="navbar-form navbar-nav" action="afficheSearch.php" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Rechercher" class="form-control input-search" name="search">
                        </div>
                        <input type="submit" class="btn btn-success btn-search" name="envoie_form" value="Rechercher">
                    </form>
                    <?php
                                if(!isset($prenom_client)) echo "<a class='btn btn-success btn-link-co' href='connexion.php' role='button'>Connexion</a><a    class='btn btn-success btn-link-ins' href='inscription.php' role='button'>Inscription</a>"; 
                    ?>
                    <?php  
                        if (isset($prenom_client)) {
                            echo "<ul class='nav navbar-nav navbar-right'>
                                    <li class='dropdown'>
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Bienvenue ".$prenom_client."<span class='caret'></span></a>
                                        <ul class='dropdown-menu'>
                                            <li><a href='monCompte.php'>Mon compte</a></li>
                                            <li><a href='mesVentes.php'>Mes ventes</a></li>
                                            <li><a href='mesAchats.php'>Mes achats</a></li>
                                            <li><a href='php/deconnexion.php'>Déconnexion</a></li>
                                        </ul>
                                    </li>
                                </ul>";
                        }
                    ?>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><?php if(isset($_SESSION["panier"])) include('include/affichePanier.php');
                        else echo"<div class='alert alert-danger' role='danger'><p>Votre Panier est vide</p></div>"?></p>
                </div>
            </div>
        </div>
        
        <footer class="footer-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <p>2015 Company, Inc.</p>
                        <!--Lien vers la page d'administrateur, présent seulement si l'utilisateur à le statut d'administrateur (1)-->
                                                <?php if (isset($_SESSION["admin"])) {
                                    if ($_SESSION["admin"] == 1) echo"<p><a href='admin.php'>Administrateur</a><p>";
                                }                       
                        ?>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>