<?php
    include 'functions.php';
    $target_dir = "../files/users/";

    $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
    $uploadOk = 1;

    if(isset($_POST["submit"])){
        $check = getfilesize($_FILES["fichier"]["tmp_name"]);
        if($check == true) {
            $uploadOk = 1;

        } else {
            $uploadOk = 0;
        }
    }

    // Verif de la taille
    function tailleLog(){
        if ($_FILES["fichier"]["size"] > 700000){
            echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }
        header("location: profile.php");

    }
    tailleLog();

    // Check si $uploadOk est à 0
    if ($uploadOk == 0){
        echo "Sorry, your file was NOT uploaded.";
        // si tout est ok on upload
    } else{
        if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
            session_start();
            $file = $_FILES['fichier']['name'];
            $user_Id = user_id($_POST['mail']);
            upload($user_Id, $file);
        } else{
            echo "Sorry, there was an error uploading your file.";
        }
    }
