<!--Connexion à la base de données-->
<?php 
    try
        {
            $db = new PDO('mysql:host=localhost;dbname=projet_athena;charset=utf8','root','');
        }
    catch (Exeption $e)
        {
            die('Erreur :' .$e->getMessage());
        }
?>