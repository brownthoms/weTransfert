<?php
    include '../modele/connectDB.php';

    function verifMail($mail){
        $bdd = connectDB();
        try{
            $reponse = $bdd->query("SELECT mail FROM user WHERE user.mail = '$mail'");
            $row = $reponse->fetch();
            $mail = $row['mail'];
            return $mail;
        }catch(Exception $e){
            die("request error");
        }
    }

    function verifPassword($passWord){
        $bdd = connectDB();
        try{
            $reponse = $bdd->query("SELECT mdp FROM user WHERE user.mdp = '$passWord'");
            $row = $reponse->fetch();
            $mdp = $row['mdp'];
            return $mdp;
        }catch(Exception $e){
            die("request error");
        }
    }

    function afficherFichier($mail){
        $bdd = connectDB();
        try{
			$req = $bdd->query("SELECT fichier, mail
								FROM `log`
								INNER JOIN user ON user.id = user_id
                                WHERE user.mail = '$mail'");
            $reponse = $req->fetch();
			return $reponse;
		}catch (Exception $e) {
			die("reque error");
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
