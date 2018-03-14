<?php
    include '../modele/connectDB.php';

    function verifMail($mail){
        $bdd = connectDB();
        $reponse = $bdd->query("SELECT mail FROM user WHERE user.mail = '$mail'");
        $row = $reponse->fetch();
        $mail = $row['mail'];
        return $mail;

    }

    function verifPassword($passWord){
        $bdd = connectDB();
        $reponse = $bdd->query("SELECT mdp FROM user WHERE user.mdp = '$passWord'");
        $row = $reponse->fetch();
        $mdp = $row['mdp'];
        return $mdp;
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
