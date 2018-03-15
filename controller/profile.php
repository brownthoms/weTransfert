<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>weTransfert</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
        <?php include 'functions.php';
        ?>
    </head>
    <body>
    <?php include '../includes/navuser.php'; ?>
        <div class="container">

            <form class="form-inline" method="post" action="controller/upload.php" enctype="multipart/form-data">
                <div class="">
                    <input type="hidden" name="MAX_FILE_SIZE" value="7000000">
                    <input id='upFile' type="file" name="fichier"></input>
                </div>
                <div class="text-right mb-2">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Upload</button>
                </div>
            </form>

            <div class="jumbotron">
                <?php

                    $nb_fichier = 0;
                    $dir = "../files/users";
                    echo '<ul>';


                    if($dossier = opendir($dir))
                    {
                        while(false !== ($fichier = readdir($dossier)))
                        {
                            if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
                            {

                                $nb_fichier++; // On incrémente le compteur de 1
                                echo '<li><a href="./files/users/' . $fichier . '">' . $fichier . '</a></li>';
                            } // On ferme le if (qui permet de ne pas afficher index.php, etc.)

                    } // On termine la boucle

                    echo '</ul><br />';
                    echo '<strong>' . $nb_fichier .'</strong> file(s) in the folder';

                    closedir($dossier);

                    }
                ?>
            </div>
        </div>



        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
