<!--Page d'affichage des produits par catégories-->
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
                        //Si l'utilisateur est connecté, On affiche la liste déroulante correspondant à ses information et intitulé par son nom:
                        //Affichage des liens "Mon compte", "Mes ventes", "Mes achats", "Déconnexion";
                        if (isset($prenom_client)) {
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
        <div classe="container-fluid">
            <div classe ="row">
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
                        //Variable permettant de récupérer la catégorie du produit
                        $id_cat = $_GET["categorie"];
                        //Requète SQL permettant de récupérer les informations sur produit en précisant la catégorie à laquelle il appartient
                        $req = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description, clients.nom AS nom_client, clients.prenom AS prenom_client FROM produits INNER JOIN categories ON produits.id_categorie = categories.id INNER JOIN clients ON produits.id_client = clients.id WHERE categories.id ='.$id_cat.' AND produits.statut = 1');
                        //Affichage des produits et de leurs information (nom, date d'ajout, prix, type)
                        //Bouton "Détails" et "Ajouter"
                        while($cat = $req->fetch()) {
                            
                            

                            switch ($cat['id_categorie']){

                                case 1 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/voiture.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 2 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/moto.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";

                                    break;


                                case 3 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/bateau.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";

                                    break;


                                case 4 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/telephone.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 5 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/ordin.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 6 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/film.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 7 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/animalerie.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 8 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/console.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 9 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/ordin.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 10 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/jeux.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 11 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/ordin.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 12 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/travaux.png' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;

                                case 13 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/vetement.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 14 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/montre.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;


                                case 15 :
                                    echo

                                        "<div class='media'>
    <div class='media-left media-middle'>
        <a href='#'>
            <img class='media-object' src='img/bijoux.jpg' alt=''>
        </a>
        <div class='media-body'>
            <h3 class='media-heading'>".$cat['nom']."</h3>
            <p><strong>Ajoutée le :</strong> ".$cat['date_ajout']."</p>
            <p><strong>Prix :</strong><br>".$cat['prix']." €</p>
            <p><strong>Catégorie :</strong><br><a href='#'>".$cat['titre']."</a></p>
            <p><strong>Vendeur(se) :</strong> ".$cat['prenom_client'].' '.$cat['nom_client']."</a></p>
            <p><a href='afficheProduit.php?produit=".$cat["id_produit"]."&categorie=".$cat["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
        </div>
    </div>
</div>";
                                    break;

                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <footer class="footer-page-affiche-produit">
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