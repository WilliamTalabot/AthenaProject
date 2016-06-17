<!--Script gérant le formulaire d'inscription de la page Inscription-->
<?php
    //connexion à la base de données
    include("connectDB.php");

    //récupère ce que l'utilisateur entre dans le champ "Nom"
    $nom_client = $_POST["nom_client"];
    //récupère ce que l'utilisateur entre dans le champ "Prénom"
    $prenom_client = $_POST["prenom_client"];
    //récupère ce que l'utilisateur entre dans le champ "Adresse email"
    $adr_email = $_POST["adr_email"];
    //récupère ce que l'utilisateur entre dans le champ "Téléphone"
    $tel = $_POST["tel"];
    //récupère ce que l'utilisateur entre dans le champ "Mot de passe"
    $mp_client = $_POST["mp"];
    //récupère ce que l'utilisateur entre dans le champ "Confirmation du mot de passe"
    $confirm_mp = $_POST["confirm_mp"];
    //récupère ce que l'utilisateur entre dans le champ "Adresse"
    $adr_client = $_POST["adr_client"];
    //récupère ce que l'utilisateur entre dans le champ "Ville"
    $ville_client = $_POST["ville_client"];
    //récupère ce que l'utilisateur entre dans le champ "Code postale"
    $cp_client = $_POST["cp_client"];
    //récupère le fait que l'utilisateur appuie sur le bouton "Envoyer"
    $envoie_form = $_POST["envoie"];

    
    
    //Si l'utilisateur appuie sur le bouton "Envoyer"
    if (isset($envoie_form)) {
        //Si les champs "Nom", "Prénom", "Adresse email", "Mot de passe", "Confirmation du mot de passe", "Adresse", "Ville", "Code postale" sont remplie: 
        if (!empty($nom_client) && !empty($prenom_client) && !empty($adr_email) && !empty($mp_client) && !empty($confirm_mp) && !empty($adr_client) && !empty($ville_client) && !empty($cp_client)) {
            //Si le champ "Mot de passe" correspond au champ "Confirmation du mot de passe"
            if($mp_client == $confirm_mp) {
                //Requète SQL permettant de préparer l'insertion dans la base de données, dans la table "client" des informations remplies par l'utilisateur
                $enregistrement_client = $db->prepare("INSERT INTO clients(nom, prenom, mail, telephone, mp, adresse, ville, cp) VALUES(:nom, :prenom, :mail, :tel, :mp, :adresse, :ville, :cp)");
                //Insertion dans la base de données, dans la table "client" des informations remplies par l'utilisateur
                $enregistrement_client -> execute(array(
                                'nom' => $nom_client,
                                'prenom' => $prenom_client,
                                'mail' => $adr_email,
                                'tel' => $tel,
                                'mp' => $mp_client,
                                'adresse' => $adr_client,
                                'ville' => $ville_client,
                                'cp' => $cp_client
                            ));
                //Ouvre la variable de session.
                session_start();
                $_SESSION["id_client"] = $db -> lastInsertId();
                //on entre le prenom client dans la variable de session
                $_SESSION["prenom_client"] = $prenom_client;
                //Renvoie à la page d'accueil du site
                header("location:../index.php");
            }   
            //Si le champ "Mot de passe" ne correspond pas au champ "Confirmation du mot de passe", message d'erreur: "Les mot de passe ne sont pas identique"
            else header("location:../inscription.php?erreurCO=1");
        }
        //Si les champs "Nom", "Prénom", "Adresse email", "Mot de passe", "Confirmation du mot de passe", "Adresse", "Ville", "Code postale" ne sont pas remplie, message d'erreur: "Veuillez remplir tous les champs"
        else header("location:../inscription.php?erreurCO=2");
    }
?>