<?php
    //on se connecte
    include 'functions.php';

    $mail = $_POST['mail'];


    if (isset($_POST['mail'], $_POST['password'])) {
        $mail = verifMail($_POST['mail']);
        $passWord = verifPassword($_POST['password']);
        if (empty($mail) || empty($passWord)) {
            echo ' mot de passe ou mail invalid ';
        }else{
            session_start();

            $_SESSION['mail'] = $_POST['mail'];
            $_SESSION['password'] = "mon mot de passe";

            header('location: profile.php');

        }
    }

?>
