<?php
$bdd = connectDB();

//demarrer la session
session_start();

// enregistrer la session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
    //fermer la session
    mysql_close($bdd);
    // Redirecting sur la page d'assueil
    header('Location: index.php');
}
?>
