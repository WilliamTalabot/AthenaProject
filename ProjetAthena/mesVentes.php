<!--Page des ventes de l'utilisateur (non fonctionnelle)-->
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
        <!--<link rel="icon" href="../../favicon.ico">-->
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
                        <li class='dropdown'>
                            <!--Affichage la liste déroulante correspondant à ses information et intitulé par son nom:-->
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Bienvenue <?php echo $prenom_client; ?><span class='caret'></span></a>
                            <ul class='dropdown-menu'>
                                <!--Affichage des liens "Mon compte", "Mes ventes", "Mes achats", "Déconnexion";-->
                                <li><a href='monCompte.php'>Mon compte</a></li>
                                <li class="active"><a href='mesVentes.php'>Mes ventes</a></li>
                                <li><a href='php/deconnexion.php'>Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Description</th>
                                        <th>Date Ajout</th>
                                        <th>Date Modification</th>
                                        <th>Statut</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //Requète SQL permettant de selectionné toutes les informations concernant un client
                                    $query = $db->query('SELECT * FROM produits WHERE id_client = '.$id_client);
                                        while($info_client = $query->fetch()) {
                                        //Affichage des informations du client (nom, prénom, mail, adresse, ville, code postal) et bouton "Modifier";
                                            echo "<tr>
                                                    <td>".$info_client["nom"]."</td>
                                                    <td>".$info_client["prix"]."</td>
                                                    <td>".$info_client["description"]."</td>
                                                    <td>".$info_client["date_ajout"]."</td>
                                                    <td>".$info_client["date_modif"]."</td>
                                                    <td>".$info_client["statut"]."</td>
                                                </tr>";
                                        }$query->closeCursor();
                                    ?>
                                </tbody>
                            </table>
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