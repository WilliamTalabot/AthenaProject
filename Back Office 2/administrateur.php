<!--Cette page permet à l'administrateur de gérer la base de données du site-->
<?php
session_start();
    //On se connecte à la base de données
    include("php/connectDB.php");
?>
    <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                <meta name="author" content="">
                <link rel="icon" href="../../favicon.ico">
                <title>Athena</title>
                <link href="css/back-office.css" rel="stylesheet">
            </head>
            <body>
                <div class="main">
                    <nav class="nav-admin">
                        <ul class="nav">
                            <!--Affichage des liens "Produits", "Clients" et "Types" affecté à une variable-->
                            <li><a href="administrateur.php?admin=1">Produits</a></li>
                            <li><a href="administrateur.php?admin=2">Clients</a></li>
                            <li><a href="administrateur.php?admin=3">Catégories</a></li>
                            <li><a href='administrateur.php?admin=4'>Utilisateurs</a></li>
                            <li><a href='php/deconnexion.php'>Déconnexion</a></li>
                        </ul>
                    </nav>
                    <?php
                        if(isset($_GET["supprime"])) {
                            echo "<p class='msg'>le produit à bien était supprimé "
                            ;
                        }

                    ?>
                    <table class="table">
                    <?php

                    //Si le lien selectionné est "Produits":
                    if (isset($_GET["admin"])) {
                        if ($_GET['admin'] == 1) {
                            //On affiche les libellés des informations dans un tableau:
                            echo "<thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Description</th>
                                        <th>Date Ajout</th>
                                        <th>Date Modification</th>
                                        <th>id_type</th>
                                        <th>id_client</th>
                                        <th>Statut</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                  </thead>
                                  <tbody>";

                                    $query = $db->query('SELECT * FROM produits ORDER BY id DESC');
                                    //On affiche les informations récupérées par la requète SQL dans le tableau:
                                    while ($donnees = $query->fetch()) {

                                    echo "<tr>
                                                    <td>" . $donnees["id"] . "</td>
                                                    <td>" . $donnees["nom"] . "</td>
                                                    <td>" . $donnees["prix"] . " €</td>
                                                    <td>" . $donnees["description"] . "</td>
                                                    <td>" . $donnees["date_ajout"] . "</td>
                                                    <td>" . $donnees["date_modif"] . "</td>
                                                    <td>" . $donnees["id_categorie"] . "</td>
                                                    <td>" . $donnees["id_client"] . "</td>
                                                    <td>" . $donnees["statut"] . "</td>
                                                    <td><a href ='include/formModifProduit.php?modif=" . $donnees["id"] . "'><img src='img/modifier.png' /></a></td>
                                                    <td><a href='php/supprime.php?supProduit=" . $donnees["id"] . "'><img src='img/supprimer.png' /></a></td>
                                                </tr>";

                                    }
                        } //Si le lien selectionné est "Clients":
                        else if ($_GET['admin'] == 2) {
                        //On affiche les libellés des informations dans un tableau:
                            echo "<thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>E-Mail</th>
                                    <th>Mot de Passe</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Code Postal</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $query = $db->query('SELECT * FROM clients ORDER BY nom');
                            //On affiche les informations récupérées par la requète SQL dans le tableau:
                             while ($donnees = $query->fetch()) {

                                echo "<tr>
                                        <td>" . $donnees["id"] . "</td>
                                        <td>" . $donnees["nom"] . "</td>
                                        <td>" . $donnees["prenom"] . "</td>
                                        <td>" . $donnees["mail"] . "</td>
                                        <td>" . $donnees["mp"] . "</td>
                                        <td>" . $donnees["adresse"] . "</td>
                                        <td>" . $donnees["ville"] . "</td>
                                        <td>" . $donnees["cp"] . "</td>
                                        <td><a href='php/supprime.php?supClient=" . $donnees["id"] . "'><img src='img/supprimer.png' /></a></td>
                                    </tr>";

                            }
                        } //Si le lien selectionné est "Catégories":
                        else if ($_GET['admin'] == 3) {
                            //On affiche les libellés des informations dans un tableau:
                            echo "<thead>
                                        <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                 <tbody>";
                                $query = $db->query('SELECT * FROM categories');
                                //On affiche les informations récupérées par la requète SQL dans le tableau:
                                while ($donnees = $query->fetch()) {

                                    echo "<tr>
                                            <td>" . $donnees["id"] . "</td>
                                            <td>" . $donnees["nom"] . "</td>
                                            <td><a href ='include/formModifCategories.php'><img src='img/modifier.png' /></a></td>
                                            <td><a href='php/supprime.php?supType=" . $donnees["id"] . "'><img src='img/supprimer.png' /></a></td>
                                        </tr>";

                        }
                    }
                        else if ($_GET['admin'] == 4) {
                            //On affiche les libellés des informations dans un tableau:
                            echo "<thead>
                                        <tr>
                                        <th>id</th>
                                        <th>log</th>
                                        <th>Mot de passe</th>
                                        <th>Statut</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                 <tbody>";
                            $query = $db->query('SELECT * FROM utilisateurs');
                            //On affiche les informations récupérées par la requète SQL dans le tableau:
                            while ($donnees = $query->fetch()) {

                                echo "<tr>
                                            <td>" . $donnees["id"] . "</td>
                                            <td>" . $donnees["log"] . "</td>
                                            <td>" . $donnees["mp"] . "</td>
                                            <td>" . $donnees["statut"] . "</td>
                                            <td><a href ='include/formModifUtilisateurs.php' ><img src='img/modifier.png' /></a></td>
                                            <td><a href='php/supprime.php?supType=" . $donnees["id"] . "'><img src='img/supprimer.png' /></a></td>
                                        </tr>";

                            }
                        }
                }
            ?>
                    </table>
                </div>
                </div>
                </div>
                </div>

                <footer class="footer-page">
                    <p>&copy;2015 Company, Inc.</p>
                </footer>
            </body>
    </html>
