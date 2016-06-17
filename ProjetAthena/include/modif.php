<!--Script php permettant d'acceder au différentes page d'administrateur-->
<?php 
//connexion à la base de données
    include('php/connectDB.php');
?>
<html>
    <body>
        <?php
        //Si l'utilisateur est admin
            if (isset($_GET['admin'])) {
                //On a le choix entre:
                switch($_GET['admin']) {
                    //Affichage du formulaire pour modifier le produit dans formModifProduit    
                    case 1 : include('formModifProduit.php');
                        break;
                    //Affichage du formulaire pour modifier un client dansformModifClient    
                    case 2 : include('formModifClient.php');
                        break;
                    //Affichage du formulaire pour modifier un type dans formModifType    
                    case 3 : include('formModifType.php');
                        break;
                }
            }
                        
        ?>
    </body>
</html>