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

    function user_name($mail){
        $bdd = connectDB();
        try{
            $reponse = $bdd->query("SELECT nom FROM user WHERE user.mail = '$mail'");
            $row = $reponse->fetch();
            $nom = $row['nom'];
            return $nom;
        }catch(Exception $e){
            die("request error");
        }
    }
    function sinUp($mail, $mdp, $nom){
        $bdd = connectDB();
        try {
            $req = $bdd->prepare('INSERT INTO user(mail, mdp, nom) VALUES(?,?,?)');
            $req->execute(array($mail, $mdp, $nom));
        } catch (\Exception $e) {
            die("erreur d'insertion dans la table");
        }

    }

    function afficherFichier($mail){
        $bdd = connectDB();
        try{
			$req = $bdd->query("SELECT fichier, mail
								FROM log
								INNER JOIN user ON user.id = log.user_id
                                WHERE user.mail = '$mail'");
			return $req;
		}catch (Exception $e) {
			die("reque error");
		}
    }

    function user_id($mail){
        $bdd = connectDB();
        try{
            $reponse = $bdd->query("SELECT id FROM user WHERE user.mail = '$mail'");
            $row = $reponse->fetch();
            $nom = $row['id'];
            return $nom;
        }catch(Exception $e){
            die("request error");
        }
    }

    function upload($user_Id, $file){
        $bdd = connectDB();
		$req = $bdd->prepare('INSERT INTO log(user_id, fichier) VALUES (?,?)');
		$req->execute(array($user_Id, $file));
	}
