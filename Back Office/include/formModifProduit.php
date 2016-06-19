<?php
    $id_produit = $_GET["modif"];
?>

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
        <form method="post" action="formModifProduit.php">

            <label>Statut </label>
            <input type="text" name="statut">

            <input name="envoie" type="submit" value="Envoyer">
        </form>
    </section>
</div>
</body>
</html>



    <!--Script permettant la modification d'un produit-->
<?php
//connexion à la base de données
include('../php/connectDB.php');
//Si l'utilisateur appuie sur le bouton "envoyé"
if (isset($_POST['envoie'])) {

$statut = $_POST['statut'];




    $query = $db->prepare("UPDATE produits SET statut = :statut, date_ajout = NOW() WHERE id =".$id_produit);
    //On execute la requète
    $query->execute(array(
        //On rentre les informations dans un tableau
        'statut' => $statut
    ));
    //Renvoie à la page administrateur
    header('location:../administrateur.php?modif=1');
}
?>