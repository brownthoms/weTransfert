<?php
    include 'functions.php';
    $bdd = connectDB();

    //demarrer la session
    session_start();

    // enregistrer la session
    $name = $_POST['name'];
    $log = $_POST['mail'];
    $pwd = $_POST['password'];

    $user_check=$_SESSION['login_user'];

    // SQL Query To Fetch Complete Information Of User
    $ses_sql = $bdd->query("SELECT mail FROM user WHERE mail='$log'");
    $donnees = $reponse->fetch();
    $row = fetch($ses_sql);
    $login_session =$row['mail'];
        if(!isset($login_session)){
            //fermer la session
            mysql_close($bdd);
            // Redirecting sur la page d'assueil
            header('Location: profile.php');
        }
?>
