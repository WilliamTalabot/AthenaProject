<?php 

    function ajout($produit) {
            $_SESSION['panier']['id'] = $produit['id'];
            $_SESSION['panier']['nom'] = $produit['nom'];
            $_SESSION['panier']['prix'] = $produit['prix'];
    }
    include("connectDB.php");
    if (isset($_GET["produit"])) {
        $id_produit = $_GET["produit"];
        $query = $db->query('SELECT id, nom, prix FROM produits WHERE id='.$id_produit);
        $produit = $query -> fetch();
            if (!isset($_SESSION['panier'])) {

                $_SESSION['panier'] = array();
                $_SESSION['panier']['id'] = array(); 
                $_SESSION['panier']['nom'] = array(); 
                $_SESSION['panier']['prix'] = array();
                ajout($produit);

            }
    }           
?>