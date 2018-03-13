<?php

//on se connecte
include 'functions.php';
$bdd = connectDB();

// variables user

$log = $_POST['mail'];
$pwd = $_POST['password'];
$pwdControl = $_POST['passwordControl'];
$reponse = $bdd->query("SELECT mail FROM user WHERE mail='$log'");
$donnees = $reponse->fetch();

if (!isset($pwd == $pwdControl)) {
    echo "Faux";
}

if ($log == $donnees['mail']) {
    echo "Mail déjà utilisé";
    //header("location: ../includes/nav.php#exampleModal");
    } else {
        $newUser = "INSERT INTO user(mail, mdp) VALUES ('$log', '$pwd')";
        $bdd->exec($newUser);

    }
