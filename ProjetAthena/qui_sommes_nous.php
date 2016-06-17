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
    <div class="row">
        <div class="col-md-12">
            <div class="qui">
            <h1>Qui sommes-nous</h1>
            <br/><br><p>Découvrir Athena, c’est avant tout découvrir une société que l’on espère à part. Depuis le </p>
            <br/>lancement, nous essayons de faire les choses un peu différemment. C’est l’avantage quand on
            <br/>part d’une feuille blanche… Et parce qu’une « société » c’est avant tout des personnes qui
            <br/>entretiennent des relations et des manières d’être communes, nous cherchons en permanence à
            <br/>ce que chacun au sein de la société se sente responsable de cet état d’esprit.
            <br/><br/>Athena, c’est une histoire de proximité. C’est comme une place de village : on se retrouve au «
            <br/>coin de la rue » ou au « café du coin » pour conclure une vente entre voisins. On partage avec un
            <br/>inconnu un moment de connivence autour d’une passion commune, à l’image d’une rencontre
            <br/>vue à la télé entre un fan de guitare pour gauchers et une rock star internationale. Cette
            <br/>proximité, on la cultive au quotidien chez Athena, à Paris, là où nous avons ouvert nos bureaux
            <br/><br/>Chez Athéna, nous nous côtoyons chaque jour pour contribuer, via nos métiers respectifs, à
            <br/>créer la meilleure expérience possible pour nos utilisateurs. On se retrouve chaque matin, on
            <br/>échange sur les nouvelles fonctionnalités du site, on rit de blagues de geeks, on se dispute une
            <br/>place dans la roadmap, on partage un moment convivial… A chacun ses défis, ses convictions,
            <br/>ses envies, sa personnalité : la société grandit de nos petites différences, dans un cadre que
            <br/>chacun comprend, partage et défend. C’est ce contexte qui nous permet d’exercer au mieux
            <br/>notre métier, et c’est de cette recherche d’excellence que se nourrit la confiance dans laquelle
            <br/>nous évoluons quotidiennement.</p>
            <br/><br/><br/><h3>ATHENA EST PLUS QU’UN SIMPLE SITE INTERNET… VENEZ VOIR PAR VOUS-MÊME !</h3>
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
<script src="js/athena.js"></script>
</body>
</html>