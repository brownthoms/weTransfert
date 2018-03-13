<?php
/*$uploaddir = '../files/public/';
$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);
//print_r($_POST);




echo '<pre>';

    if (move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé
               avec succès. Voici plus d'informations :\n";
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.
              Voici plus d'informations :\n";
    }

echo 'Voici quelques informations de débogage :';
print_r($_FILES);


echo '</pre>';*/




/* upload bis + size */

$target_dir = "../files/public/";
$target_file = $target_dir . basename($_FILES["fichier"]["name"]);
$uploadOk = 1;

//echo $_POST["submit"];
// Check le fichier
if(isset($_POST["submit"]))
    {
        $check = getfilesize($_FILES["fichier"]["tmp_name"]);
        if($check == true) {
            $uploadOk = 1;

        } else {
            $uploadOk = 0;
        }
    }

// Verif de la taille
if ($_FILES["fichier"]["size"] > 300000)
    {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


// Check si $uploadOk est à 0
if ($uploadOk == 0)
    {
        echo "Sorry, your file was NOT uploaded.";
        // si tout est ok on upload
    } else
        {
            if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
                $newUser = "INSERT INTO user(mail, mdp) VALUES ('$log', '$pwd')";
                $bdd->exec($newUser);
        } else
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
