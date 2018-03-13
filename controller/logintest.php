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

if (isset($pwd, $pwdControl) && $pwd == $pwdControl){
    if ($log == $donnees['mail']) {
        echo "Mail already used";
        //header("location: ../includes/nav.php#exampleModal");
    } else {
        $newUser = "INSERT INTO user(mail, mdp) VALUES ('$log', '$pwd')";
        $bdd->exec($newUser);

    }
} else {
    echo	"<script type=\"text/javascript\">
                window.alert('mot de pas non identique');
                window.location.href = '../index.php';
                </script>";
        exit;
}
