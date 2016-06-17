<!--Page de connexion au site-->
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Projet Athena - Connexion</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/athena-style.css" rel="stylesheet">
  </head>

  <body class="body-connexion">
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
                    </ul>
                    <!--Barre de recherche et bouton-->
                    <form class="navbar-form navbar-nav" action="afficheSearch.php" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Rechercher" class="form-control input-search" name="search">
                        </div>
                        <input type="submit" class="btn btn-success btn-search" name="envoie_form" value="Rechercher">
                    </form>
                </div>
            </div>
        </nav>

    <div class="container">
        <!--Formulaire de connexion-->
        <form class="form-connexion" action="php/formConnexion.php" method="post">
            <h2 class="form-connexion-heading">Connexion</h2>
            <label class="sr-only">Adresse Email</label>
            <!--Champ adresse email-->
            <input type="email" class="form-control input-input" placeholder="adresse Email" name="adr_email">
            <!--Champ mot de passe-->
            <label class="sr-only">Mot de Passe</label>
            <input type="password" class="form-control input-input" placeholder="Mot de Passe" name="mp">
            <!--Bouton de validation "Connexion"-->
            <input class="btn btn-lg btn-primary btn-block btn-envoie" type="submit" value="Connexion" name="envoie">
            <?php 
            if (isset($_GET["erreurCO"])) {
                if($_GET["erreurCO"] == 1) {
                    //Message d'erreur "Adresse mail ou mot de passe incorrect"
                    echo "<div class='alert alert-danger' role='alert'><p>Adresse mail ou mot de passe incorrect</p></div>";
                }
                else if ($_GET["erreurCO"] == 2) {
                    //Message d'erreur "Veuillez remplir tous les champs"
                    echo "<div class='alert alert-danger' role='alert'><p>Veuillez remplir tous les champs</p></div>";
                }
                else if ($_GET["erreurCO"] == 3) {
                    //Message d'erreur "Vous devez avoir un compte administrateur pour accéder à cette page" si un utilisateur souhaite accéder à la page administrateur
                    echo "<div class='alert alert-danger' role='alert'><p>Vous devez avoir un compte administrateur pour accéder à cette page</p></div>";
                }
                else if ($_GET["erreurCO"] == 4) {
                    //Message d'erreur "Vous devez avoir un compte administrateur pour accéder à cette page" si un utilisateur souhaite accéder à la page administrateur
                    echo "<div class='alert alert-danger' role='alert'><p>Connecter vous pour pouvoir acceder à cette page</p></div>";
                }
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
