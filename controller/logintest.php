<?php

//on se connecte
include 'functions.php';
$bdd = connectDB();

// variables user

$log = $_POST['mail'];
$pwd = $_POST['password'];
$reponse = $bdd->query("SELECT mail FROM user WHERE mail");
$donnees = $reponse->fetch();

if ($donnees['mail'] == $log){
    echo "Mail déjà utilisé";
    } else {
        $newUser = "INSERT INTO user(mail, mdp) VALUES ('$log', '$pwd')";
        $bdd->exec($newUser);

    }

?>
