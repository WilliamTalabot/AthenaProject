<!--Cette page permet à l'administrateur de gérer la base de données du site-->

<?php
    //On vérifie que l'utilisateur est bien administrateur
    require("php/controleSession.php");
    //On se connecte à la base de données
    include("php/connectDB.php");
    //On vérifie que l'utilisateur est connecté
    if (isset($_SESSION["prenom_client"])) $prenom_client = $_SESSION["prenom_client"];
    //Permet le contrôle du rôle d'administrateur
    include("include/modif.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Athena</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/athena-style.css" rel="stylesheet">
        <link href="dashboard.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                        <?php 
                            //On affiche le bouton "Déposer un article" seulement si l'utilisateur est inscrit et connecté
                            if (isset($prenom_client)) echo "<li><a href='deposeArticle.php'>Déposer un article</a></li>"
                        ?>
                    </ul>
                    <!--Barre et bouton de recherche-->
                    <form class="navbar-form navbar-nav" action="afficheSearch.php" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Rechercher" class="form-control input-search" name="search">
                        </div>
                        <input type="submit" class="btn btn-success btn-search" name="envoie_form" value="Rechercher">
                    </form>
                    <?php
                        //Si l'utilisateur n'est pas inscrit ou pas connecté, on affiche les boutons connexion et inscription:        
                         if(!isset($prenom_client)) echo "<a class='btn btn-success btn-link-co' href='connexion.php' role='button'>Connexion</a><a    class='btn btn-success btn-link-ins' href='connexion.php' role='button'>Inscription</a>"; ?>
                    <?php  
                        //Si l'utilisateur est connecté, On affiche la liste déroulante correspondant à ses information et intitulé par son nom:
                        //Affichage des liens "Mon compte", "Mes ventes", "Mes achats", "Déconnexion";
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
                                    <li><a href='panier.php'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>()</span></a></li>
                                </ul>";
                        }
                    ?>
                </div>
            </div>
        </nav>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar-admin">
                    <ul class="nav nav-sidebar">
                        <!--Affichage des liens "Produits", "Clients" et "Types" affecté à une variable-->
                        <li><a href="admin.php?admin=1">Produits <span class="sr-only">(current)</span></a></li>
                        <li><a href="admin.php?admin=2">Clients</a></li>
                        <li><a href="admin.php?admin=3">Catégories</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <?php 
                        // Si la variable "supprime" est présente;
                        if(isset($_GET['supprime'])) {
                            //On affiche les différents messages selon l'action de suppression effectuée:
                            switch($_GET['supprime']) { 
                                //Cas de suppression d'un produit de la base    
                                case 1: echo "<div class='alert alert-success' role='success'><p>le Produits à bien etait supprimé</p></div>";
                                    break;
                                //Cas de suppression d'un client de la base    
                                case 2 : echo "<div class='alert alert-success' role='success'><p>le Client à bien etait supprimé</p></div>";
                                    break;
                                //Cas de suppression d'une catégorie de la base      
                                case 3 : echo "<div class='alert alert-success' role='success'><p>la Catégorie à bien etait supprimé</p></div>";
                                    break;
                            }
                        }
                    
                        // Si la variable "modif" est présente;
                        if(isset($_GET['modif'])) {
                                //On affiche les différents messages selon l'action de modification effectuée:
                                switch($_GET['modif']) {
                                    //Cas de modification d'un produit de la base    
                                    case 1: echo "<div class='alert alert-success' role='success'><p>le Produits à bien etait modifié</p></div>";
                                        break;
                                    //Cas de modification d'un client de la base     
                                    case 2 : echo "<div class='alert alert-success' role='success'><p>le Client à bien etait modifié</p></div>";
                                        break;
                                    //Cas de modification d'une catégorie de la base     
                                    case 3 : echo "<div class='alert alert-success' role='success'><p>la Catégorie à bien etait modifié</p></div>";
                                        break;
                                }
                            }
                    
                    
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <?php 
                                //Si la variable admin est présente:
                                if(isset($_GET['admin'])) {
                                    //Si le lien selectionné est "Produits":
                                    if($_GET['admin'] == 1) {
                                        //On affiche les libellés des informations dans un tableau:
                                        echo "<thead>
                                                        <tr>
                                                          <th>id</th>
                                                          <th>Nom</th>
                                                          <th>Prix</th>
                                                          <th>Description</th>
                                                          <th>Date Ajout</th>
                                                          <th>Date Modification</th>
                                                          <th>id_type</th>
                                                          <th>id_client</th>
                                                          <th>Statut</th>
                                                          <th>Modifier</th>
                                                          <th>Supprimer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                        $query = $db->query('SELECT * FROM produits ORDER BY id DESC');
                                        //On affiche les informations récupérées par la requète SQL dans le tableau:
                                        while($donnees = $query->fetch()) {
                                            
                                            echo "<tr>
                                                        <td>".$donnees["id"]."</td>
                                                        <td>".$donnees["nom"]."</td>
                                                        <td>".$donnees["prix"]."</td>
                                                        <td>".$donnees["description"]."</td>
                                                        <td>".$donnees["date_ajout"]."</td>
                                                        <td>".$donnees["date_modif"]."</td>
                                                        <td>".$donnees["id_categorie"]."</td>
                                                        <td>".$donnees["id_client"]."</td>
                                                        <td>".$donnees["statut"]."</td>
                                                        <td><a href ='modifProduit.php?modif=".$donnees["id"]."' data-toggle='modal' data-target='#myModal'><img src='img/modifier.png' /></a></td>
                                                        <td><a href='php/supprime.php?supProduit=".$donnees["id"]."'><img src='img/supprimer.png' /></a></td>
                                                </tr>";
                                             
                                        }                                        
                                    }
                                    //Si le lien selectionné est "Clients":
                                    else if($_GET['admin'] == 2) {
                                        //On affiche les libellés des informations dans un tableau:
                                        echo "<thead>
                                                        <tr>
                                                          <th>id</th>
                                                          <th>Nom</th>
                                                          <th>Prénom</th>
                                                          <th>E-Mail</th>
                                                          <th>Mot de Passe</th>
                                                          <th>Adresse</th>
                                                          <th>Ville</th>
                                                          <th>Code Postal</th>
                                                          <th>Statut</th>
                                                          <th>Modifier</th>
                                                          <th>Supprimer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                        $query = $db->query('SELECT * FROM clients ORDER BY nom');
                                        //On affiche les informations récupérées par la requète SQL dans le tableau:
                                        while($donnees = $query->fetch()) {
                                            
                                            echo "<tr>
                                                        <td>".$donnees["id"]."</td>
                                                        <td>".$donnees["nom"]."</td>
                                                        <td>".$donnees["prenom"]."</td>
                                                        <td>".$donnees["mail"]."</td>
                                                        <td>".$donnees["mp"]."</td>
                                                        <td>".$donnees["adresse"]."</td>
                                                        <td>".$donnees["ville"]."</td>
                                                        <td>".$donnees["cp"]."</td>
                                                        <td>".$donnees["statut"]."</td>
                                                        <td><a href ='' data-toggle='modal' data-target='#myModal'><img src='img/modifier.png' /></a></td>
                                                        <td><a href='php/supprime.php?supClient=".$donnees["id"]."'><img src='img/supprimer.png' /></a></td>
                                                </tr>";
                                             
                                        }                                        
                                    }
                                    
                                    //Si le lien selectionné est "Catégories":
                                    else if($_GET['admin'] == 3) {
                                        //On affiche les libellés des informations dans un tableau:
                                        echo "<thead>
                                                        <tr>
                                                          <th>id</th>
                                                          <th>Nom</th>
                                                          <th>Modifier</th>
                                                          <th>Supprimer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                        $query = $db->query('SELECT * FROM categories');
                                        //On affiche les informations récupérées par la requète SQL dans le tableau:
                                        while($donnees = $query->fetch()) {
                                            
                                            echo "<tr>
                                                        <td>".$donnees["id"]."</td>
                                                        <td>".$donnees["nom"]."</td>
                                                        <td><a href ='' data-toggle='modal' data-target='#myModal'><img src='img/modifier.png' /></a></td>
                                                        <td><a href='php/supprime.php?supType=".$donnees["id"]."'><img src='img/supprimer.png' /></a></td>
                                                </tr>";
                                             
                                        }                                        
                                    }
                                }
                            ?>
            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
                <footer class="footer-page">
                <div class="row">
                    <div class="col-md-12">
                        <p>&copy;2015 Company, Inc.</p>
                        <!--Lien vers la page d'administrateur, présent seulement si l'utilisateur à le statut d'administrateur (1)-->
                        <?php 
                                if (isset($_SESSION["admin"])) {
                                    if ($_SESSION["admin"] == 1) echo"<p><a href='admin.php'>Administrateur</a><p>";
                                }                       
                        ?>
                    </div>
                </div>
            </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>