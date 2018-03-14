<?php

include '../modele/connectDB.php';

$bdd = connectDB();

// effacer les nom de fichiers dans la BDD nonLog = PUBLIC
function deleteFileFromDB($bdd) {
    $stmt = $bdd->prepare("DELETE FROM nonlog
    WHERE DATEDIFF(CURDATE(), date) < 7");

    $stmt->execute();

}

// effacer les fichiers PUBLIC sur le disque
function selectFileAndDeleteFile($bdd){
     $stmt = $bdd->prepare("SELECT heure FROM nonlog
     WHERE DATEDIFF(CURDATE(), date) < 1");

     $stmt->execute();
     $table = array();

     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $i = 0;

     while($row = $stmt->fetch()) {
         $table[$i] = "../files/public/".$row['file'];
         unlink($table[$i]);
         $i++;
     }
 }

// effacer les nom de fichiers sur le disque avant la base de donnée impératif
 selectFileAndDeleteFile($bdd);


// effacer les nom de fichiers dans la BDD
 deleteFileFromDB($bdd);

 ?>
