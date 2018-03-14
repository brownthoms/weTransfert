<?php
//on se connecte
include 'functions.php';
$bdd = connectDB();

// variables user
$name = $_POST['name'];
$log = $_POST['mail'];
$pwd = $_POST['password'];
$pwdControl = $_POST['passwordControl'];
$reponse = $bdd->query("SELECT mail FROM user WHERE mail='$log'");
$donnees = $reponse->fetch();

if (isset($pwd, $pwdControl) && $pwd == $pwdControl){
    if ($log == $donnees['mail'] && isset($name)) {
        echo "Mail already used";
    } else {
        $newUser = "INSERT INTO user(nom, mail, mdp) VALUES ('$name', '$log', '$pwd')";
        $bdd->exec($newUser);
        echo "Welcome !";
        //header("location:../index.php");
    }
}else {
    echo "mot de pass invalid";
    //header("location:../index.php");
}
