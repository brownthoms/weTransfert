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

// if (isset($pwd, $pwdControl) && $pwd == $pwdControl){
//     if ($log == $donnees['mail']) {
//         echo "Mail already used";
//     } else {
//         $newUser = "INSERT INTO user(mail, mdp) VALUES ('$log', '$pwd')";
//         $bdd->exec($newUser);
//         echo "Welcome !";
//     }
// } else {
//     echo "Invalid password";
// }
    $array = array("mail"=> "", "password" => "", "passwordControl" => "", "mailError"=> "", "passwordError" => "", "passwordControlError" => "", "reussi" => false);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array["mail"] = verification($_POST["mail"]);
        $array["password"] = verification($_POST["password"]);
        $array["passwordControl"] = verification($_POST["passwordControl"]);
        $array["reussi"] = true;

        if (!validMail($array["mail"])) {
            $array["mailError"] = "Invalid mail";
            $array["reussi"] = false;
        }
        else if (empty($array["password"])) {
            $array["passwordError"] = "Champs vide";
            $array["reussi"] = false;
        }
        else if (empty($array["passwordControl"])) {
            $array["passwordControlError"] = "Champs vide";
            $array["reussi"] = false;
        }
        else if (isset($array["password"], $array["passwordControl"])) {
            if ($array["password"] != $array["passwordControl"]) {
                $array["passwordError"] = "Mdp non identique";
            }
        }
        echo json_encode($array);
    } else {
        $newUser = "INSERT INTO user(mail, mdp) VALUES ('$log', '$pwd')";
        $bdd->exec($newUser);
    }

    function validMail($var){
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function validTel($var){
        return preg_match("/^[0-9 ]*$/" , $var);
    }

    function verification($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
