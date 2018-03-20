<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>weTransfert</title>
        <?php include 'includes/header.php'; ?>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <?php include 'includes/nav.php'; ?>
        <div class="fond-body">
            <div class="container">
                <form class="form-inline col-12 onglet" method="post" action="controller/upload.php" enctype="multipart/form-data">
                    <div class="">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                        <input id='upFile' class='drag' type="file" name="fichier"></input>
                    </div>
                    <div class="text-right mb-2 mt-2">
                        <button class="btn btn-info my-2 my-sm-0 " type="submit">Upload</button>
                    </div>
                </form>
                <div class="jumbotron zone" ondrop="drop(event)" ondragover="allowDrop(event)" ondragover="allowDrop(event)">
                    <?php
                        $nb_fichier = 0;
                        $dir = "./files/public";
                        if($dossier = opendir($dir)) {
                            while(false !== ($fichier = readdir($dossier))) {
                                if($fichier != '.' && $fichier != '..' && $fichier != 'index.php') {
                                    $nb_fichier++; // On incrémente le compteur de 1

                                    echo '<div><a class="nomfile" href="files/public/' . $fichier .'">' . $fichier . ' - <span class="open">Open</span></a> -<a href="files/public/' . $fichier . '"download="files/public/' . $fichier . '"><span class="download">Download</span></a></div>';


                                } // On ferme le if (qui permet de ne pas afficher index.php, etc.)
                            } // On termine la boucle
                            echo '<br />';
                            echo '<strong>' . $nb_fichier .'</strong> file(s) uploaded';
                            closedir($dossier);
                        }
                    ?>

                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
