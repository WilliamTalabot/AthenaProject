<?php
    require_once("connectDB.php");

    $log = $_POST["nom"];
    $mp = $_POST["mp"];
    $envoie = $_POST["envoie"];

    if (isset($envoie)) {
        
        if(!empty($log) && !empty($mp)) {
            $query = $db ->query("SELECT log, mp, id, statut FROM utilisateurs WHERE log = '$log' AND mp = '$mp'");
            $verif = $query -> fetch();
            session_start();
            $_SESSION["satut"] = $verif["statut"];
            if ($verif["log"] == $log && $verif["mp"] == $mp) {
                switch($verif["statut"]) {
                    case 1: header("location: ../administrateur.php");
                        break;
                    case 2: header("location: ../commercial.php");
                        break;
                }
                
            }else header("location: ../index.php?erreur=1");
        }else header("location: ../index.php?erreur=2");
    }



?>