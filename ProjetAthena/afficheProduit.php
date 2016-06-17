<!--Page d'affichage des produits-->
<?php
    //connexion à la base de données
    include("php/connectDB.php");
    //Ouvre la variable de session.
    session_start();
    //On vérifie que l'utilisateur est connecté
    if (isset($_SESSION["prenom_client"])) $prenom_client = $_SESSION["prenom_client"];
    //On met les information récupéré de la table produit dans une variable
    $id_produit= $_GET["produit"];
    $id_categorie= $_GET["categorie"];

    //Requète SQL permettant de récupérer les information sur le produit
    $query = $db->query('SELECT categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description, clients.nom AS nom_client, clients.prenom AS prenom_client FROM produits INNER JOIN categories ON produits.id_categorie = categories.id INNER JOIN clients ON produits.id_client = clients.id WHERE produits.id = '.$id_produit);
    $produit = $query->fetch();

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
                                    if(!isset($prenom_client)) echo "<a class='btn btn-success btn-link-co' href='connexion.php' role='button'>Connexion</a><a class='btn btn-success btn-link-ins' href='connexion.php' role='button'>Inscription</a>"; ?>
                        <?php  
                            if (isset($prenom_client)) {
                                //Si l'utilisateur est connecté, On affiche la liste déroulante correspondant à ses information et intitulé par son nom:
                                //Affichage des liens "Mon compte", "Mes ventes", "Mes achats", "Déconnexion";
                                echo "<ul class='nav navbar-nav navbar-right'>
                                        <li class='dropdown'>
                                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Bienvenue ".$prenom_client."<span class='caret'></span></a>
                                                <ul class='dropdown-menu'>
                                                    <li><a href='monCompte.php'>Mon compte</a></li>
                                                    <li><a href='mesVentes.php'>Mes ventes</a></li>
                                                    <li><a href='php/deconnexion.php'>Déconnexion</a></li>
                                                </ul>
                                        </li>
                                    </ul>";
                            }
                        ?>
                    </div>
                </div>
            </nav>



                <div class="container ">
                        <div class="row section-1">


                      <?php switch ($id_categorie) {
                          case 1:
                              echo "<div class='col-md-5'>
                                       <img src='img/voiture.jpg'>
                                    </div>
                                    <div class='col-md-7'>
                                   <!--Affichage des infos du produit (nom,description,type,prix)-->
                                     <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                     <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                     <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                     <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                     <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                    <!--Bouton'Ajouter'-->
                                    <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                  </div>";
                              break;


                          case 2:
                              echo "<div class='col-md-5'>
                                       <img src='img/moto.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                    <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                    </div>";
                              break;


                          case 3:
                              echo "<div class='col-md-5'>
                                       <img src='img/bateau.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                   <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                    </div>";
                              break;


                          case 4:
                              echo "<div class='col-md-5'>
                                      <img src='img/telephone.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                    <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                    </div>";
                              break;


                          case 5:
                              echo "<div class='col-md-5'>
                                      <img src='img/ordin.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                    <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                     </div>";
                              break;


                          case 6:
                              echo "<div class='col-md-5'>
                                       <img src='img/livre.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                      <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                      </div>";
                              break;

                          case 7:
                              echo "<div class='col-md-5'>
                                       <img src='img/film.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                      <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                      </div>";
                              break;


                          case 8:
                              echo "<div class='col-md-5'>
                                      <img src='img/animalerie.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                      <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                      </div>";
                              break;


                          case 9:
                              echo "<div class='col-md-5'>
                                      <img src='img/console.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                      <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                      </div>";
                              break;


                          case 10:
                              echo "<div class='col-md-5'>
                                      <img src='img/jeux.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                    <!--Affichage des infos du produit (nom,description,type,prix)-->
                                    <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                    <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                    <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                    <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                    <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                    <!--Bouton'Ajouter'-->
                                    <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                    </div>";
                              break;


                          case 11:
                              echo "<div class='col-md-5'>
                                      <img src='img/travaux.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                      <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                      </div>";
                              break;


                          case 12:
                              echo "<div class='col-md-5'>
                                      <img src='img/vetement.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                      <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                      </div>";
                              break;


                          case 13:
                              echo "<div class='col-md-5'>
                                      <img src='img/chaussures.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                      <!--Affichage des infos du produit (nom,description,type,prix)-->
                                      <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                      <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                      <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                      <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                      <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                      <!--Bouton'Ajouter'-->
                                      <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                      </div>";
                              break;


                          case 14:
                              echo "<div class='col-md-5'>
                                      <img src='img/montre.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                    <!--Affichage des infos du produit (nom,description,type,prix)-->
                                <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                  <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                  <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                  <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                  <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                  <!--Bouton'Ajouter'-->
                                  <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                  </div>";
                              break;


                          case 15:
                              echo "<div class='col-md-5'>
                                      <img src='img/bijoux.jpg'>
                                    </div>
                                    <div class='col-md-7'\>
                                    <!--Affichage des infos du produit (nom,description,type,prix)-->
                                    <h3 class='title-produit'>" . $produit['nom'] . "</h3>
                                    <p><strong>Déscription :</strong><br>" . $produit["description"] . "</p>
                                    <p><strong>Catégorie :</strong><br>" . $produit["titre"] . "</p>
                                    <p><strong>Prix :</strong><br>" . $produit["prix"] . " €</p>
                                    <p><strong>Vendeur(se) :</strong><br>" . $produit["prenom_client"] . " " . $produit["nom_client"] . "</p>
                                    <!--Bouton'Ajouter'-->
                                    <a href='contactVendeur.php?produit'=" . $id_produit . "' class='btn btn-primary btn-link' role='button'>Contacter le vendeur</a>
                                    </div>";
                              break;

                      }
                      ?>

                    </div>
            </div>


            <footer class="footer-page">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <p>2015 Company, Inc.</p>
                                <!--Lien vers la page d'administrateur, présent seulement si l'utilisateur à le statut d'administrateur (1)-->
                                <?php 
                                        if (isset($_SESSION["admin"])) {
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