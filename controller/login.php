<?php
// démarrage de la session
session_start();
//variable pour les messages d'erreur
$error='';

if (isset($_POST['submit'])) {
if (empty($_POST['mail']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
    }
    else
    {

        $log=$_POST['mail'];
        $pwd=$_POST['password'];

        // on se connecte a la BDD
        $bdd = connectDB();

        // on protege mysql
        $name = stripslashes($name);
        $log = stripslashes($log);
        $pwd = stripslashes($pwd);
        $log = mysql_real_escape_string($log);
        $pwd = mysql_real_escape_string($pwd);

        // on recupere les infos user
        $user = $bdd->query("SELECT mail, name FROM user WHERE mail='$log'");
        $donnees = $user->fetch();

        if ($rows == 1) {
            // initialiser la session
            $_SESSION['login_user']=$log;
            //on redirige vers une page
            header("location: profile.php");
        } else {
            $error = "Mail ou Mot de passe invalide";
        }
    //fermer la connexion
    mysql_close($bdd);
    }
}
?>
