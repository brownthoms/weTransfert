<?php
/* upload bis + size 31 48 62*/

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
function taille(){
    if ($_FILES["fichier"]["size"] > 300000)
        {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        header("location: ../index.php");

    }
    taille();
    include '../modele/connectDB.php';

    // Check si $uploadOk est à 0
    if ($uploadOk == 0)
    {
        echo "Sorry, your file was NOT uploaded.";
        // si tout est ok on upload
    } else
    {
        if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
            $bdd = connectDB();
            $file = $_FILES['fichier']['name'];
            $heure = date("H:i");
            $newFile = "INSERT INTO nonlog(file, heure) VALUES ('$file', '$heure')";
            $bdd->exec($newFile);
            echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
            header("location: ../index.php");
        } else
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }

function delete(){
    $req = mysql_query("SELECT * FROM membres WHERE actif='0'"); //On récupère tous les membres pas actifs
        while ($donnees = mysql_fetch_array($req))
        {
            $date_inscription = $donnees['ta_colonne_date_inscription'];
            $date = time();
            $difference = $date - $date_inscription;
            $nbreSecondesEn2Jours = (3600*24)*2;
            if ($difference > $nbreSecondesEn2Jours)//On supprime le membre
            {
            $id = $donnees['id'];
            mysql_query("DELETE FROM membres WHERE id='$id'");
            }
        }
}
