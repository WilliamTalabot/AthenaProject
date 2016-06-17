<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="../css/back-office.css" rel="stylesheet">
    <title>Athena - back office</title>
</head>
<body>
<div class="main">
    <section class="log">
        <h1>Modification</h1>
        <form method="post" action="../php/modifProduit.php">
            <label>Nom : </label>
            <input type="text" name="nom">

            <label>Mot de passe : </label>
            <input type="text" name="prenom">

            <input name="envoie" type="submit" value="Envoyer">
        </form>
    </section>
</div>
</body>
</html>