<?php
    include '../modele/connectDB.php';

    function logIn(){
        $log = $_POST['mail'];
        $pwd = $_POST['password'];

        if (isset($log) && isset($pwd)){
            session_start();
            $_SESSION['login'] = $_POST['mail'];
            $_SESSION['password'] = $_POST['password'];
            header('location : index.php');
        } else {
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        }
    }


    function recupNonLog($bdd){
        $reponse = $bdd->query('SELECT * FROM nonlog');
        while ($donnees = $reponse->fetch()) {
            echo $donnees['id'];
            echo $donnees['file'];
        }

    }

    function recupLog($bdd){
        $reponse = $bdd->query('SELECT * FROM `log`');
        while ($donnees = $reponse->fetch()){
            echo $donnees['id'];
        }
    }


    }
    recupNonLog($bdd);
    recupLog($bdd);


    // $array = array("mail"=> "", "password" => "", "mailError" => "", "passwordError"=> "", "reussi" => false);
    //
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $array["mail"] = verification($_POST["mail"]);
    //     $array["password"] = verification($_POST["password"]);
    //     $array["reussi"] = true;
    //
    //     if (!validMail($array["mail"])) {
    //         $array["mailError"] = "Entrez un e-mail valide svp";
    //         $array["reussi"] = false;
    //     }
    //     if (empty($array["password"])) {
    //         $array["passwordError"] = "Invalid password";
    //         $array["reussi"] = false;
    //     }
    //     echo json_encode($array);
    //
    // function validMail($var){
    //     return filter_var($var, FILTER_VALIDATE_EMAIL);
    // }
    //
    // function verification($var){
    //     $var = trim($var);
    //     $var = stripslashes($var);
    //     $var = htmlspecialchars($var);
    //     return $var;
    // }
