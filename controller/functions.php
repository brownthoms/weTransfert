<?php
    include '../modele/connectDB.php';
    $bdd = connectDB();

    function createUser($bdd){
        $log = $_POST['mail'];
        $pwd = $_POST['password'];
        $reponse = $bdd->query("SELECT mail FROM user WHERE mail");
        $donnees = $response->fetch();

        if ($donnees['mail'] == $log){
            echo "Mail déjà utilisé";
        } else {
            $newUser = "INSERT INTO user(mail, mdp) VALUES ('$log', '$pwd')";
            $bdd->exec($newUser);
        }
    }

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


    //uplaod public




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
