<?php
        $select_info = $db ->query("SELECT clients.nom, clients.prenom, mail, telephone, ville, cp FROM clients INNER JOIN produits ON produits.id_client = clients.id WHERE produits.id = '$id_produit'");

         while($info_vendeur = $select_info->fetch()) {
                                            //Affichage des informations du client (nom, prénom, mail, adresse, ville, code postal) et bouton "Modifier";
                                            echo "
                                                  <p>".$info_vendeur["nom"]." ".$info_vendeur["prenom"]."</p>
                                                  <p>".$info_vendeur["mail"]."</p>
                                                  <p>".$info_vendeur["telephone"]."</p>
                                                  <p>".$info_vendeur["ville"]." ".$info_vendeur["cp"]."</p>";       
                                        }
    
                                        $select_info ->closeCursor();
?>