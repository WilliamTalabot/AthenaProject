<!--Script permettant la suppression de données dans la base-->
<?php
    //connexion à la base de données
    include('connectDB.php');
    //Récupère une valeur envoyé dans l'url:
    //Récupère la suppression de produit
    $id_produit = $_GET['supProduit'];
    //Récupère la suppression de client
    $id_client = $_GET['supClient'];
    //Récupère la suppression de Type
    $id_type = $_GET['supType'];


        //Si l'administrateur fait une supression de produit:
        if (isset($id_produit)) {
            //Requète SQL permettant d'effacer un produit de la base de donnée
            $query = $db->prepare('DELETE FROM produits WHERE id = :id');
            $query->execute(array(
                'id'=>$id_produit
            ));
            //Renvoie un message de confirmation
            header("location:../administrateur.php?supprime=1");
        } 
        //Si l'administrateur fait une supression de client:    
        else if (isset($id_client)) {
            //Requète SQL permettant d'effacer un client de la base de donnée
            $query = $db->prepare('DELETE FROM clients WHERE id = :id');
            $query->execute(array(
                'id'=>$id_client
            ));
            //Renvoie un message de confirmation
            header("location:../administrateur.php?supprime=2");
        }
        //Si l'administrateur fait une supression de type:
        else if (isset($id_type)) {
            //Si l'administrateur fait une supression de type:
            $query = $db->prepare('DELETE FROM type WHERE id = :id');
            $query->execute(array(
                'id'=>$id_type
            ));
            //Renvoie un message de confirmation
            header("location:../administrateur.php?supprime=4");
        }
?>