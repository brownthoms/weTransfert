<?php

include '../modele/connectDB.php';
$bdd = connectDB();

$reponse = $bdd->query("SELECT * FROM log");
$donnees = $reponse->fetch();
echo $donnees['id'];
