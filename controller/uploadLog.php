<?php
include '../modele/connectDB.php';
$target_dir = "../files/users/";

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
function tailleLog(){
    if ($_FILES["fichier"]["size"] > 700000)
        {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        header("location: profile.php");

    }
    tailleLog();

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



            $id_user = $_SESSION['mail'];
            $sql="SELECT user.id FROM user
                  INNER JOIN log.user_id = user.id WHERE mail = '$userName'";

            $resultat=mysqli_query($bdd,$sql);
            $row=mysqli_fetch_assoc($resultat);
            $userId = $row['mail'];


            $newFile = "INSERT INTO log(user_id, fichier, date) VALUES ('$userId', '$file')";
            $bdd->exec($newFile);

            header("location: ../controller/profile.php");
        } else
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }
