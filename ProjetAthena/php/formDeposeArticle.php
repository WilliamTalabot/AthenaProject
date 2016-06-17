

<!--Script gérant l'action déposer un article sur la page Dépose article-->

<?php
    //connexion à la base de données
    include("connectDB.php");
    session_start();
    $id_client = $_SESSION["id_client"];

    //récupère ce que l'utilisateur entre dans le champ "Titre de l'annonce"
    $titre_annonce = $_POST["titre_annonce"];
    //récupère ce que l'utilisateur entre dans le champ "Prix"
    $prix_annonce = $_POST["prix_annonce"];
    //récupère ce que l'utilisateur entre dans le champ "Type"
    $categorie = $_POST["type"];
    //récupère ce que l'utilisateur entre dans le champ "Description"
    $desc_annonce = $_POST["desc_annonce"];
    //récupère le fait que l'utilisateur appuie sur le bouton "Envoyer"
    $envoie_forme = $_POST["envoie_forme"];


    //Si l'utilisateur appuie sur le bouton "Envoyer"
    if(isset($envoie_forme)) {
        //Si l'utilisateur a renseigné le champ "Titre de l'annonce"
        if (!empty($titre_annonce) && !empty($prix_annonce) && !empty($categorie) && !empty($desc_annonce)) {

            //Requète SQL permettant de préparer l'insertion dans la base de données, dans la table "produit" les informations remplies par l'utilisateur
            $depose_produit = $db->prepare("INSERT INTO produits (nom, prix, description, date_ajout, id_categorie, id_client, statut) VALUES (:titre, :prix, :description, NOW(), :categorie, :client, 0 )");
            //Insertion dans la base de données, dans la table "produit" des informations remplies par l'utilisateur
            try {
                $depose_produit->execute(array(
                    'titre' => $titre_annonce ,
                    'prix' => $prix_annonce ,
                    'description' => $desc_annonce ,
                    'categorie' => $categorie ,
                    'client' => $id_client
                ));
            } catch (Exception $e) {
                echo 'Exception : ' , $e->getMessage() , "\n";
            }
            //Message de confirmation de l'enregistrement de l'annonce
            header('location:../deposeArticle.php?depose=1');
        } else header("location:../deposeArticle.php?erreur=1");
    }
    








?>