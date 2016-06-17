<!--Script permettant la modification d'un produit-->
<?php 
    //connexion à la base de données
    include('connectDB.php');
    
    //récupère l'id du roduit envoyé dans l'url 
    $id_produit = $_GET["modif"];
    //récupère ce que l'utilisateur entre dans le champ "Titre"
    $titre_categories = $_POST['nom'];
    

    //Si l'utilisateur appuie sur le bouton "envoyé"
    if (isset($_POST['envoieModifProduit'])) {
        $query = $db->prepare("UPDATE categories SET nom = :nom WHERE id =".$id_produit);
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