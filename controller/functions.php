<?php
    include '../modele/connectDB.php';

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
    function logIn(){
        
    }
    recupNonLog($bdd);
    recupLog($bdd);
