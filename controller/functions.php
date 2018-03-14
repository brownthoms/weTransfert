<?php
    include '../modele/connectDB.php';
    $bdd = connectDB();

    function logIn(){
        $log = $_POST['mail'];
        $pwd = $_POST['password'];

        if (isset($log) && isset($pwd)){
            session_start();
            $_SESSION['login'] = $_POST['mail'];
            $_SESSION['password'] = $_POST['password'];
            header('location : index.php');
        } else {
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        }
    }


    function recupNonLog($bdd){
        $reponse = $bdd->query('SELECT * FROM nonlog');
        while ($donnees = $reponse->fetch()) {
            echo $donnees['id'];
            echo $donnees['file'];
        }

    }

    function recupLog($bdd){
        $reponse = $bdd->query('SELECT * FROM `log`');
        while ($donnees = $reponse->fetch()){
            echo $donnees['id'];
        }
    }
