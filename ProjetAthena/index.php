<?php
    include("php/connectDB.php");
    session_start();
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
                                if(!isset($prenom_client)) echo "<a class='btn btn-success btn-link-co' href='connexion.php' role='button'>Connexion</a><a class='btn btn-success btn-link-ins' href='inscription.php' role='button'>Inscription</a>"; 
                    ?>
                    <?php  
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
        <div class="container">
            <div class="row section-1">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="9"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="10"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="11"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="12"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="13"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="14"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Besoin d'une voiture, cherchez parmi les offres de nos particulier en ligne.</p>
                                            <p><a href="afficheProduitCat.php?categorie=1" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/voiture.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Une balade en mer? Découvrez les bateaux que nous avons à proposer.</p>
                                            <p><a href="afficheProduitCat.php?categorie=3" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/bateau.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Envie de prendre l'air? Trouvez le deux roues de vos rêves.</p>
                                            <p><a href="afficheProduitCat.php?categorie=2" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/moto.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Souvent en retard? Pensez à acheter une montre.</p>
                                            <p><a href="afficheProduitCat.php?categorie=14" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/montre.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Accro du cellulaire? Dénichez le smartphone qu'il vous faut.</p>
                                            <p><a href="afficheProduitCat.php?categorie=4" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/telephone.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Classe, relax, hipster, ou simplement vous, trouvez les vêtement qui vous mettent en valeur.</p>
                                            <p><a href="afficheProduitCat.php?categorie=12" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/vetement.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Vous avez toujours revé de devenir une princesse? Trouvez la parure qui vous ira à ravir.</p>
                                            <p><a href="afficheProduitCat.php?categorie=15" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/bijoux.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Besoin d'une nouvelle console de jeux? Entrez dans la Next Gen grâce aux produit proposés par nos particulier.</p>
                                            <p><a href="afficheProduitCat.php?categorie=9" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/console.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Et vous , vous êtes plutôt chien ou chat?.</p>
                                            <p><a href="afficheProduitCat.php?categorie=8" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/animalerie.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Pour travailler, jouer ou simplement surfer sur le web, consultez notre catégorie ordinateur.</p>
                                            <p><a href="afficheProduitCat.php?categorie=5" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/ordin.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> De Mario à call of duty, retrouvez les meilleurs titres du jeux vidéo.</p>
                                            <p><a href="afficheProduitCat.php?categorie=10" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/jeux.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Vos film préférés sont surement en vente sur notre plateforme, profitez-en pour refaire votre DVDtech.</p>
                                            <p><a href="afficheProduitCat.php?categorie=7" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/film.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Faite parler votre créativité grâce au outils de bricolage disponible à l'achat.</p>
                                            <p><a href="afficheProduitCat.php?categorie=11" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/travaux.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Il y a toujours soulier à votre taille, vous le trouverez sûrement ici.</p>
                                            <p><a href="afficheProduitCat.php?categorie=13" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/chaussures.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p> Hugo, Musso, Orwell, il est toujours apaisant de se plonger dans un bon livre.</p>
                                            <p><a href="afficheProduitCat.php?categorie=6" class="btn btn-primary btn-link" role="button">Voir</a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="thumbnail">
                                                <img src="img/livre.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-2">
                <h2>Voiture</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 1 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/voiture.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
            </div>
            <div class="row section-3">
                <h2>Moto</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 2 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/moto.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                $query->closeCursor();
                ?>
            </div>
            <div class="row section-4">
                <h2>Bateau</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 3 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/bateau.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
            </div>
                <div class="row section-5">
                    <h2>Telephone</h2>
                    <?php
                        $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 4 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                        while ($donnees = $query->fetch()) {
                            echo "<div class='col-md-4'>
                                    <div class='thumbnail'>
                                        <img src='img/telephone.jpg' alt=''>
                                        <div class='caption'>
                                            <h3>".$donnees['nom']."</h3>
                                            <p>".$donnees['prix']." €</p>
                                            <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                        </div>
                                    </div>
                                </div>";
                        }
                    $query->closeCursor();
                    ?>
            </div>
            <div class="row section-3">
                <h2>Ordinateur</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 5 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                        while ($donnees = $query->fetch()){
                            echo "<div class='col-md-4'>
                                    <div class='thumbnail'>
                                        <img src='img/ordin.jpg' alt=''>
                                        <div class='caption'>
                                            <h3>".$donnees['nom']."</h3>
                                            <p>".$donnees['prix']." €</p>
                                            <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                        </div>
                                    </div>
                                </div>";
                        }
                $query->closeCursor();
                ?>
            </div>
            <div class="row section-3">
                <h2>Livre</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 6 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/livre.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
            </div>
            <div class="row section-3">
                <h2>DVD/Bluray</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 7 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()) {
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/film.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
            </div>
            <div class="row section-3">
                <h2>Animalerie</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 8 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/animalerie.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
            </div>
                <div class="row section-3">
                    <h2>Console de Jeux</h2>
                    <?php
                        $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 9 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                        while ($donnees = $query->fetch()){
                            echo "<div class='col-md-4'>
                                    <div class='thumbnail'>
                                        <img src='img/console.jpg' alt=''>
                                        <div class='caption'>
                                            <h3>".$donnees['nom']."</h3>
                                            <p>".$donnees['prix']." €</p>
                                            <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                        </div>
                                    </div>
                                </div>";
                            }
                         $query->closeCursor();
                    ?>
                </div>
                <div class="row section-3">
                    <h2>Jeux Video</h2>
                    <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 10 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()) {
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/jeux.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                    ?>
            </div>
            <div class="row section-3">
                <h2>Ouitillage/Bricolage</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 11 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/travaux.png' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                    ?>
            </div>
            <div class="row section-3">
                <h2>Vétements</h2>
                <?php
                $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 12 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                 while ($donnees = $query->fetch()){
                     echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/vetement.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
            </div>
            <div class="row section-3">
                <h2>Chaussures</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 13 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/chaussures.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                    ?>
            </div>
            <div class="row section-3">
                <h2>Montres</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 14 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/montre.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
            </div>
            <div class="row section-3">
                <h2>Bijoux</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 15 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/bijoux.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
            </div>
            <div class="section-16">
                <h2>Bijoux</h2>
                <?php
                    $query = $db->query('SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE categories.id = 16 AND produits.statut=1 ORDER BY date_ajout DESC LIMIT 3');
                    while ($donnees = $query->fetch()){
                        echo "<div class='col-md-4'>
                                <div class='thumbnail'>
                                    <img src='img/image1.jpg' alt=''>
                                    <div class='caption'>
                                        <h3>".$donnees['nom']."</h3>
                                        <p>".$donnees['prix']." €</p>
                                        <a href='afficheProduit.php?produit=".$donnees['id_produit']."&categorie=".$donnees["id_categorie"]."' class='btn btn-primary btn-link' role='button'>Détail</a>
                                    </div>
                                </div>
                            </div>";
                    }
                    $query->closeCursor();
                ?>
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