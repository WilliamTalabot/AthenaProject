<?php 
                                        //Requète SQL permettant de selectionné toutes les informations concernant un client
                                        $query = $db->query('SELECT nom, prix FROM produits WHERE id_client = '.$id_client);
                                            while($info_client = $query->fetch()) {
                                            //Affichage des informations du client (nom, prénom, mail, adresse, ville, code postal) et bouton "Modifier";
                                                echo "<div class='thumbnail'>
                                                        <div class='caption'>
                                                            <h3 class='title-info-perso'>Mes Ventes</h3>
                                                        </div>
                                                        <div class='table-responsive'>
                                                            <table class='table table-striped'>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nom</th>
                                                                        <th>Prix</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>".$info_client["nom"]."</td>
                                                                        <td>".$info_client["prix"]."</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                </div>";       
                                            }$query->closeCursor();
    
                                        
?>