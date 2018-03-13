<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>weTransfert</title>
        <?php include 'includes/header.php'; ?>


        <!-- <script type="text/javascript" src="js/script.js"></script> -->
    </head>
    <body>
        <?php include 'includes/nav.php'; ?>

        <div class="container">

            <form class="form-inline" method="post" action="controller/upload.php" enctype="multipart/form-data">
                <div class="">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                    <input id='upFile' type="file" name="fichier"></input>
                </div>
                <div class="text-right mb-2">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Upload</button>
                </div>
            </form>
            <div class="jumbotron">
                <?php

                    $nb_fichier = 0;
                    $dir = "./files/public";
                    echo '<ul>';


                    if($dossier = opendir($dir))
                    {
                        while(false !== ($fichier = readdir($dossier)))
                        {
                            if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
                            {

                                $nb_fichier++; // On incrémente le compteur de 1
                                echo '<li><a href="./files/public/' . $fichier . '">' . $fichier . '</a></li>';
                            } // On ferme le if (qui permet de ne pas afficher index.php, etc.)

                    } // On termine la boucle

                    echo '</ul><br />';
                    echo '<strong>' . $nb_fichier .'</strong> file(s) in the folder';

                    closedir($dossier);

                    }

                    else {
                        echo 'The file was not able to be opened'
                    }

                    $req = mysql_query("SELECT * FROM membres WHERE actif='0'"); //On récupère tous les membres pas actifs
                        while ($donnees = mysql_fetch_array($req))
                        {
                            $date_inscription = $donnees['ta_colonne_date_inscription'];
                            $date = time();
                            $difference = $date - $date_inscription;
                            $nbreSecondesEn2Jours = (3600*24)*2;
                            if ($difference > $nbreSecondesEn2Jours)//On supprime le membre
                            {
                            $id = $donnees['id'];
                            mysql_query("DELETE FROM membres WHERE id='$id'");
                            }
                        }

                ?>
            </div>
        </div>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
