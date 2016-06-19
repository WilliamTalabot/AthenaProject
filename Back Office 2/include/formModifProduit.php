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

            <label>Nom : </label>
            <input type="text" name="nom">

            <label>Prix : </label>
            <input type="text" name="prix">

            <label>Description : </label>
            <input type="text" name="desc">

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
if (isset($_POST['envoieModifProduit'])) {
//récupère ce que l'utilisateur entre dans le champ "Titre"
$titre_produit = $_POST['nom'];
//récupère ce que l'utilisateur entre dans le champ "Prix"
$prix_produit = $_POST['prix'];
//récupère ce que l'utilisateur entre dans le champ "Description"
$desc_produit = $_POST['desc'];
//Requète SQL permettant de mettre à jour dans la base de données les champs entré par l'utilisateur
$statut = $_POST['statut'];




    $query = $db->prepare("UPDATE produits SET nom = :titre, prix = :prix, description = :description, statut = :statut, date_ajout = NOW() WHERE id =".$id_produit);
    //On execute la requète
    $query->execute(array(
        //On rentre les informations dans un tableau
        'titre' => $titre_produit,
        'prix' => $prix_produit,
        'description' => $desc_produit,
        'statut' => $statut
    ));
    echo $query;
    //Renvoie à la page administrateur
    header('location:../admin.php?modif=1');
}
?>