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

  <body class="body-inscription">
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
                    </ul>
                    <form class="navbar-form navbar-nav" action="afficheSearch.php" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Rechercher" class="form-control" name="search">
                        </div>
                        <input type="submit" class="btn btn-success btn-search" name="envoie_form" value="Rechercher">
                    </form>
                </div>
            </div>
        </nav>

    <div class="container">
        <form class="form-inscription" action="php/formInscription.php" method="post">
            <h2 class="form-inscription-heading">Inscription</h2>
            <label class="sr-only">Nom</label>
            <input type="text" class="form-control input-input" placeholder="Nom" name="nom_client">
            
            <label class="sr-only">Prenom</label>
            <input type="text" class="form-control input-input" placeholder="Prenom" name="prenom_client">
            
            
            <label class="sr-only">Adresse Email</label>
            <input type="email" class="form-control input-input" placeholder="adresse Email" name="adr_email">
            
            <label class="sr-only">Téléphone</label>
            <input type="text" class="form-control input-input" placeholder="Numéro de téléphone" name="tel">
            
             
            <label class="sr-only">Mot de Passe</label>
            <input type="password" class="form-control input-input" placeholder="Mot de passe" name="mp">
            
             
            <label class="sr-only">Confirmer Mot de Passe</label>
            <input type="password" class="form-control input-input" placeholder="Confirmer Mot de Passe" name="confirm_mp">
            <?php 
                if (isset($_GET["erreurCO"])) {
                    if($_GET["erreurCO"] == 1) {
                        echo "<div class='alert alert-danger' role='alert'><p>Les mot de passe ne sont pas identique</p></div>"; 
                    }
                }
            
            ?>
            
            <label class="sr-only">Adresse</label>
            <input type="text" class="form-control input-input" placeholder="Adresse" name="adr_client">
            
            <label class="sr-only">Ville</label>
            <input type="text" class="form-control input-input" placeholder="Ville" name="ville_client">
            
            <label for="inputEmail" class="sr-only">Code postal</label>
            <input type="text" class="form-control input-input" placeholder="Code Postal" name="cp_client">
            
            <input type="submit" class="btn btn-lg btn-primary btn-block btn-envoie" value="Inscription" name="envoie">
            <?php 
                if (isset($_GET["erreurCO"])) {
                    if ($_GET["erreurCO"] == 2) {
                        echo "<div class='alert alert-danger' role='alert'><p>Veuillez remplir tous les champs</p></div>";
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
  </body>
</html>
