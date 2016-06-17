<?php 
    include('connectDB.php');

    $search = $_POST["search"];
    if(isset($_POST["envoie_form"])) {
        if (!empty($search)) {
            $query = $db->query("SELECT categories.id AS id_categorie, categories.nom AS titre, produits.id AS id_produit, produits.nom, produits.prix, produits.date_ajout, produits.description FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE produits.nom LIKE '%$search%' AND produits.statut = 1 ORDER BY date_ajout DESC");


            if (!empty($query)) {
                while($result = $query->fetch()) {
                         echo 
                            "<div class='media'>
                               <div class='media-left media-middle'>
                                  <a href='#'>
                                    <img class='media-object' src='img/avatar.png' alt=''>
                                  </a>
                               </div>
                               <div class='media-body'>
                                 <h3 class='media-heading'>".$result['nom']."</h3>
                                 <p><strong>Ajoutée le :</strong> ".$result['date_ajout']."</p>
                                 <p><strong>Prix :</strong><br>".$result['prix']." €</p>
                                 <p><strong>Catégorie :</strong><br><a href='afficheProduitCat.php?categorie=".$result['id_categorie']."'>".$result['titre']."</a></p>
                                 <p><a href='afficheProduit.php?produit=".$result['id_produit']."' class='btn btn-primary btn-link' role='button'>Détails</a></p>
                               </div>

                            </div>";
                }
            }
            else echo "<div class='alert alert-danger' role='danger'><p>Aucun produit ne correspont à votre recherche</p></div>";
        }
        else echo"<div class='alert alert-danger' role='danger'><p>Veuillez entrer un nom de produit à rechercher</p></div>";
    }
?>