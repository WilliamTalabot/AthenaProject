<?php 
                                        //Requète SQL permettant de selectionné toutes les informations concernant un client
                                        $select_info = $db ->query("SELECT * FROM clients WHERE id = '$id_client'");
                                        while($info_client = $select_info->fetch()) {
                                            //Affichage des informations du client (nom, prénom, mail, adresse, ville, code postal) et bouton "Modifier";
                                            echo "<div class='thumbnail'>
                                                    <div class='caption'>
                                                        <h3 class='title-info-perso'>Mes info</h3>
                                                           <p>".$info_client["nom"]." ".$info_client["prenom"]."</p>
                                                  <p>".$info_client["mail"]."</p>
                                                  <p>".$info_client["telephone"]."</p>
                                                  <p>".$info_client["adresse"]."</p>
                                                  <p>".$info_client["ville"]." ".$info_client["cp"]."</p>
                                                  <p><a href='#' class='btn btn-primary btn-link' role='button'>Modifier</a></p>
                                                </div>
                                            </div>";       
                                        }
    
                                        $select_info ->closeCursor();
?>