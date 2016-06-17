<!--Page d'affichage des produits disponible sur le site-->

<?php
    //connexion à la base de données
    include("php/connectDB.php");
    //Ouvre la variable de session.
    session_start();
    //On vérifie que l'utilisateur est connecté
    if(isset($_SESSION["prenom_client"])) $prenom_client = $_SESSION["prenom_client"]; 
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
                        <li class="active"><a href="produit.php">Produits<span class="sr-only">(current)</span></a></li>
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
                         //Si l'utilisateur n'est pas connecté, on affiche le bouton connexion:            
                         if(!isset($prenom_client)) echo "<a href=connexion.php class='btn btn-success btn-link-co' role='button'>Connexion</a> <a href=inscription.php class='btn btn-success btn-link-ins' role='button'>Inscription</a>" ?>
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
        
            <div class="container-fluid">
                <div class ="row">
                    <div class="col-md-3 sidebar blog-sidebar">
                        <div class="sidebar-module">
                            <!--Affichage des différents types-->
                            <h4><strong>Type :</strong></h4>
                                <ol class="list-unstyled">
                                    <?php
                                        //Requète SQL permettant de récupérer les types via la table "type"
                                        $req_type = $db -> query("SELECT * FROM categories ORDER BY nom");
                                        //Affichage des liens premettant de selectionner des types
                                        while ($select_type = $req_type->fetch()){

                                            echo "<li><a href='afficheProduitCat.php?categorie=".$select_type["id"]."'>".$select_type['nom']."</a></li>";
                                        }
                                        $req_type->closeCursor();
                                    ?>
                                </ol>
                        </div>
                    </div>
                    <!--Affichage des produits-->
                    <div class="col-md-6"><br><br>
                        <?php 
                        //Requète SQL permettant de récupérer les informations sur le produit
                        $reponse = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description, clients.nom AS nom_client, clients.prenom AS prenom_client FROM produits INNER JOIN categories ON produits.id_categorie = categories.id INNER JOIN clients ON produits.id_client = clients.id WHERE produits.statut = 1 ORDER BY date_ajout DESC');
                        //$reponse2 = $db->query('SELECT id AS id_categorie FROM categories');
                        //Affichage des produits et de leurs information (nom, date d'ajout, prix, type)
                        //Bouton "Détails" et "Ajouter"
                        //$id_categorie = $reponse2->fetch();
                        while ($donnees = $reponse->fetch()){

                            switch ($donnees['id_categorie']) {

                                case 1 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/voiture.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;

                                case 2 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/moto.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>  ";

                                    break;


                                case 3 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/bateau.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                                case 4 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/telephone.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;



                                case 5 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/ordin.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                                case 6 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/livre.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                                case 7 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/film.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                                case 8 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/animalerie.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;



                                case 9 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/console.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                                case 10 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/jeux.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                                case 11 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/travaux.png'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                                case 12 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/vetement.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                                case 13 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/chaussures.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;



                                case 14 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/montre.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;



                                case 15 :
                                    echo "
    <div class='media'>
      <div class='media-left media-middle'>    
        <a href='#'>
        <img class='media-object' src='img/montre.jpg'>
        </a>
      </div>
      <div class='media-body'>
        <h3 class='media-heading'>" . $donnees['nom'] . "</h3>
        <p><strong>Ajoutée le :</strong> " . $donnees['date_ajout'] . "</p>
        <p><strong>Prix :</strong><br>" . $donnees['prix'] . " €</p>
        <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=" . $donnees["id_categorie"] . "'>" . $donnees['titre'] . "</a></p>
        <p><strong>Vendeur(se) :</strong><br>" . $donnees['prenom_client'] . ' ' . $donnees['nom_client'] . "</a></p>
        <p><a href='afficheProduit.php?produit=" . $donnees["id_produit"] . "&categorie=" . $donnees["id_categorie"] . "' class='btn btn-primary btn-link' role='button'>Détails</a>
      </div>
    </div>";

                                    break;


                            }







                        }
                        $reponse->closeCursor();
                    
                        ?>
               </div>
            </div>
        </div>

        <footer class="footer-index">
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
        <script src="js/athena.js"></script>
    </body>
</html>