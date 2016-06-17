<!--Page permettant de mettre des produits en ligne-->
<?php 
    //connexion à la base de données
    include("php/connectDB.php");
    //Ouvre la variable de session.
    session_start();
    //On vérifie que l'utilisateur est connecté
    if (isset($_SESSION["prenom_client"])) $prenom_client = $_SESSION["prenom_client"];
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
                        <li><a href="produit.php">Produits<span class="sr-only">(current)</span></a></li>
                        <!--Bouton Déposer un article-->
                        <li class="active"><a href='deposeArticle.php'>Déposer un article</a></li>
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
                      <ul class='dropdown-menu'>
                        <!--Affichage des liens "Mon compte", "Mes ventes", "Mes achats", "Déconnexion";-->
                        <li><a href='monCompte.php'>Mon compte</a></li>
                        <li><a href='mesVentes.php'>Mes ventes</a></li>
                        <li><a href='php/deconnexion.php'>Déconnexion</a></li>
                      </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
        <div class="container">
            <header class="header-depose-article">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-header"><strong>Déposer une annonce sur Athena.fr est GRATUIT.</strong><br/>
Votre annonce va être contrôlée dans les 24h, et vous recevrez un email de validation une fois votre annonce en ligne. Elle restera sur le site pendant 60 jours</p>  
                    </div>
                </div>
            </header>
            <!--Formulaire de dépot d'article-->
            <form class="form-depose-article" method="post" action="php/formDeposeArticle.php">
                <div class="row">
                    <h2>Déposer un Article</h2>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Titre de l'annonce</label>
                          <!--Champ "Titre de l'annonce"-->
                          <input type="text" class="form-control" placeholder="Titre de l'annonce" name="titre_annonce">
                          <?php 
                            //Vérification du remplissage du champ "Titre de l'annonce" (champ obligatoire);
                            if (isset($_GET["erreur"])) {
                                if ($_GET["erreur"] == 2) echo "<div class='alert alert-danger' role='alert'><p>Vous devez mettre un titre à votre annonce</p></div>";
                            }
                          ?>
                      </div>
                    </div>
                </div>
                     <div class="row">
                         <div class="col-md-3">
                              <div class="form-group">
                                  <label>Prix</label>
                                  <input type="text" class="form-control" placeholder="Prix" name="prix_annonce">
                                  <?php
                                    //Vérification du remplissage du champ "Prix" (champ obligatoire);
                                    if (isset($_GET["erreur"])) {
                                        if ($_GET["erreur"] == 3) echo "<div class='alert alert-danger' role='alert'><p>Vous devez mettre un prix à votre annonce</p></div>";
                                    }
                                  ?>
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <!--Selection du type-->
                                <label>Catégories</label>
                                <select class="form-control" name=type>
                                   <?php
                                        //Requète SQL permettant de récupérer toutes les informations sur les types;
                                        $req_type = $db -> query("SELECT * FROM categories ORDER BY nom");
                                        
                                        //Affichage des types dans une liste déroulante;
                                        while ($select_type = $req_type->fetch()){
                                            $type_id = $select_type['id'];
                                            $type_nom = $select_type['nom'];

                                            echo "<option value=".$type_id.">".$type_nom."</option>";

                                        }
                                        $req_type->closeCursor();

                                    ?>
                                </select>
                                <?php
                                    //Vérification de la sélection d'un type pour le produit (obligatoire);
                                    if (isset($_GET["erreur"])) {
                                        if ($_GET["erreur"] == 4) echo "<div class='alert alert-danger' role='alert'><p>Vous devez choisir une catégorie pour votre annonce</p></div>";
                                    }
                                  ?>
                            </div>
                         </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6">
                              <div class="form-group">
                                  <label>Description</label>
                                  <!--Champs "Description"-->
                                  <textarea class="form-control" rows="3" name="desc_annonce"></textarea>
                                  <?php
                                    //Vérification du remplissage du champ "Description" (champ obligatoire);
                                    if (isset($_GET["erreur"])) {
                                        if ($_GET["erreur"] == 5) echo "<div class='alert alert-danger' role='alert'><p>Vous devez mettre une déscription à votre annonce</p></div>";
                                        }
                                  ?>
                              </div>
                         </div>
                    </div>
                        <!--Bouton "Envoyer"-->
                        <input type="submit" value="Envoyer" name="envoie_forme">
                         <?php
                            //Message de confirmation de l'enregistrement de l'annonce 
                            if (isset($_GET["depose"])) echo "<div class='alert alert-success' role='alert'><p>Votre annonce à bien été enregistrée</p></div>";
                            if (isset($_GET["erreur"])) {
                                if ($_GET["erreur"] == 1) echo "<div class='alert alert-danger' role='alert'><p>Vous devez remplir le formulaire pour déposer un article</p></div>";
                            }
                        ?>
                </form>
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