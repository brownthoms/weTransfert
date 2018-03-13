<?php

$uploaddir = '../files/public/';
$uploadfile = $uploaddir . basename($_FILES[$_POST['fichier']]['name']);

echo '<pre>';
if (move_uploaded_file($_FILES[$_POST['fichier']]['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
} else {
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}

echo 'Voici quelques informations de débogage :';
print_r($_FILES);

echo '</pre>';

?>
