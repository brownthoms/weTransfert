<?php
    session_start();
    if (isset($_SESSION['mail'], $_SESSION['nom'])) { ?>
        <html>
            <head>
                <meta charset="utf-8">
                <title>weTransfert</title>
                <link rel="stylesheet" href="../css/bootstrap.min.css">
                <link rel="stylesheet" href="../css/style.css">
                <link href='http://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet' type='text/css'>
                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
                <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
                <script type="text/javascript" src="../js/script.js"></script>
                <?php include 'functions.php';
                ?>
            </head>
            <body>
            <?php include '../includes/navuser.php'; ?>
                <div class="text-center mb-5 Kaushan">
                    <span class="texte">Welcome </span><span class="name_session"><?php echo $_SESSION['nom']; ?></span>
                </div>
                <div class="container">

                    <form class="form-inline onglet" method="post" action="uploadLog.php" enctype="multipart/form-data">
                        <div class="">
                            <input type="hidden" name="MAX_FILE_SIZE" value="7000000">
                            <input id='upFile' type="file" name="fichier"></input>
                            <input type="hidden" name="mail" value='<?php $mail = $_SESSION['mail']; echo $mail; ?>'>
                        </div>
                        <div class="text-right mb-2 mt-2">
                            <button class="btn btn-info my-2 my-sm-0" type="submit">Upload</button>
                        </div>
                    </form>
                    <div class="jumbotron bug">
                        <?php
                        $nb_files = 0;
                        //echo "<ul>";
                        $req = afficherFichier($_SESSION['mail']);
                        while ($donnees = $req->fetch()){
                            $nb_files++;

                            echo '<div><a class="nomfile" href="../files/users/' . $donnees['fichier'] .'">' . $donnees['fichier'] . ' - <span class="open">Open</span></a> -<a href="../files/users/' . $donnees['fichier'] . '"download="../files/users/' . $donnees['fichier'] . '"><span class="download">Download</span></a></div>';
                        }
                        echo "<br>";
                        echo "<strong>$nb_files</strong> file(s) uploaded";
                        ?>
                    </div>
                </div>
                <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
            </body>
        </html>
    <?php }else header("location: ../index.php")
?>
