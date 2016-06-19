<!--Script permettant la modification d'un produit-->
<?php 
    //connexion à la base de données
    include('connectDB.php');
    
    //récupère l'id du roduit envoyé dans l'url 
    $id_produit = $_GET["modif"];
    //récupère ce que l'utilisateur entre dans le champ "Titre"
    $titre_produit = $_POST['nom'];
    //récupère ce que l'utilisateur entre dans le champ "Prix"
    $prix_produit = $_POST['prix'];
    //récupère ce que l'utilisateur entre dans le champ "Description"
    $desc_produit = $_POST['desc_annonce'];
    //Requète SQL permettant de mettre à jour dans la base de données les champs entré par l'utilisateur
    

    //Si l'utilisateur appuie sur le bouton "envoyé"
    if (isset($_POST['envoieModifProduit'])) {
        $query = $db->prepare("UPDATE produits SET nom = :titre, prix = :prix, description = :description, date_ajout = NOW() WHERE id =".$id_produit);
        //On execute la requète
        $query->execute(array(
        //On rentre les informations dans un tableau    
        'titre' => $titre_produit,
        'prix' => $prix_produit,
        'description' => $desc_produit
        ));
        echo $query;
        //Renvoie à la page administrateur
        header('location:../admin.php?modif=1');
    }






?>