<!--Page d'affichage des informations du compte du client et modification de celles-ci-->
<?php 
    //connexion à la base de données
    include("php/connectDB.php");
    //Ouvre la variable de session.
    session_start();
    //On vérifie que l'utilisateur est connecté
    if (isset($_SESSION["prenom_client"])) $prenom_client = $_SESSION["prenom_client"];
    if (isset($_SESSION["id_client"])) $id_client = $_SESSION["id_client"];
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
            <!--Barre de navigation-->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--Bouton d'accueil-->
                        <a class="navbar-brand logo" href="index.php">Athena</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <!--Bouton Produits-->
                            <li><a href="produit.php">Produits</a></li>
                            <!--Bouton Déposer un article-->
                            <li><a href='deposeArticle.php'>Déposer un article</a></li>
                        </ul>
                        <!--Barre et bouton de recherche-->
                        <form class="navbar-form navbar-nav" action="afficheSearch.php" method="post">
                            <div class="form-group">
                                <input type="text" placeholder="Rechercher" class="form-control input-search" name="search">
                            </div>
                            <input type="submit" class="btn btn-success btn-search" name="envoie_form" value="Rechercher">
                        </form> 
                        <ul class='nav navbar-nav navbar-right'>
                            <!--Affichage la liste déroulante correspondant à ses information et intitulé par son nom:-->
                            <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Bienvenue <?php echo $prenom_client; ?><span class='caret'></span></a>
                                <!--Affichage des liens "Mon compte", "Mes ventes", "Mes achats", "Déconnexion";-->
                                    <ul class='dropdown-menu'>
                                        <li class="active"><a href='monCompte.php'>Mon compte</a></li>
                                            <li><a href='mesVentes.php'>Mes ventes</a></li>
                                            <li><a href='php/deconnexion.php'>Déconnexion</a></li>
                                    </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 blog-sidebar">
                        <div class="sidebar-module">
                            <a href="#"><img src="img/avatar.png" alt=""></a>
                            <!--Affichage du prenom du client-->
                                <h4><strong><?php echo $prenom_client; ?></strong></h4>

                        </div>
                   </div>
                   <div class="col-md-10">
                       <div class="container-fluid">
                           <div class="row">
                               <div class="col-md-3 case-info">
                                  
                                   <?php 
                                        include("include/afficheInfosPerso.php");
                                   ?>
                                   
                               </div>
                                <div class="col-md-3 case-info">
                                  
                                   <?php 
                                        include("include/afficheMesVentes.php");
                                   ?>
                                   
                               </div>
                               
                           </div>
                           
                       </div>
                   
                   </div>
               </div>
            </div>


            <footer class="footer-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <p>2015 Company, Inc.</p>
                        </div>
                        <div class="col-md-6">
                            <nav class="navbar">
                                <ul class="nav navbar-nav navbar-right ul-nav">
                                    <li><a href="nous-contacter.php">Nous contacter</a></li>
                                    <li><a href="qui_sommes_nous.php">Qui sommes-nous</a></li>
                                    <li><a href="cgu.php">Conditions générales d'utilisations</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </footer>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </body>
</html>