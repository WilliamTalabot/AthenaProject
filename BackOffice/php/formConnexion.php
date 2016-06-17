<!--Script gérant la connexion d'un utilisateur-->

<?php 
    //connexion à la base de données
    include("connectDB.php");
    //Récupération des champ "Adresse email" et "Mot de passe"
    $adr_email = $_POST["adr_email"];
    $mp_client = $_POST["mp"];
    //Requète SQL permettant de récuperer les information du client (mot de passe, mail, prenom, statut) par rapport au champ que celui-ci a entrer dans les champs
    $req_select = $db->query("SELECT id, mp, mail, prenom FROM clients WHERE mail = '$adr_email' AND mp = '$mp_client'");
    $select_client = $req_select->fetch();
    //Si l'utilisateur appuie sur le bouton de connexion:
    if (isset($_POST["envoie"])) {
        //Si l'adresse mail et le mot de passe sont remplie:
        if(!empty($adr_email) && !empty($mp_client)){
            //Si l'adresse mail et le mot de passe sont correct:
            if ($select_client["mp"] == $mp_client && $select_client["mail"] == $adr_email){
                //Ouvre la variable de session.
                session_start();
                //on entre l'id client dans la variable de session
                $_SESSION["id_client"] = $select_client["id"];
                //on entre le prenom client dans la variable de session
                $_SESSION["prenom_client"] = $select_client["prenom"];
                
                header("location:../index.php");
           }
            //Si l'adresse email ou le mot de passe sont incoreccte, on affiche le message d'erreur "Adresse mail ou mot de passe incorrect"
            else header("location:../connexion.php?erreurCO=1");
        }
        //Si l'adresse email ou le mot de passe ne sont pas renseignés, on affiche le message d'erreur "Veuillez remplir tous les champs""
        else header("location:../connexion.php?erreurCO=2");
    } 
?>