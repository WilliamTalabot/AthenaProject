<?php 

$repertoir = "../img/upload/";    
$img = $_FILES["image"]["name"];
$tmp_img = $_FILES["image"]["tmp_name"];
$type_img = $_FILES["image"]["type"];


    if (!is_uploaded_file($tmp_img)) {
        echo "<div class='alert alert-danger' role='danger'><p>Image introuvable</p></div>";
    }
    
    if( !strstr($type_img, 'jpg') && !strstr($type_img, 'jpeg') && !strstr($type_img, 'bmp') && !strstr($type_img, 'gif') && !strstr($type_img, 'png') )
    {
        exit("Le fichier n'est pas une image");
    }
    
    
    if (move_uploaded_file($tmp_img, $repertoir . $img)) {
        echo "Le fichier est valide, et a été téléchargé
               avec succès";
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.
              Voici plus d'informations :\n";
    }

?>