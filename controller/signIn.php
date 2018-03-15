<?php
    //on se connecte
    include 'functions.php';


    if (isset($_POST['mail'], $_POST['password'])) {
        $mail = verifMail($_POST['mail']);
        $passWord = verifPassword($_POST['password']);
        $nom = user_name($_POST['mail']);
        if (empty($mail) || empty($passWord)) {
            echo ' mot de passe ou mail invalid ';
        }else if (empty($nom)){
            echo 'veuillez renseigner votre pseudo';
        }else{
            session_start();

            $_SESSION['mail'] = $_POST['mail'];
            $_SESSION['nom'] = $nom;

            header('location: profile.php');

        }
    }

?>
