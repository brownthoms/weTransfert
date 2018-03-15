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

        sinUp($log, $pwd, $name);
        session_start();

        $_SESSION['mail'] = $log;
        $_SESSION['nom'] = $name;

        header('location: profile.php');
    }
}else {
    echo "mot de pass invalid";
    //header("location:../index.php");
}
