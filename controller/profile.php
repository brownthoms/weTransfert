<?php //include 'functions.php'?>
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
            <form class="form-inline" method="post" action="uploadLog.php" enctype="multipart/form-data">
                <div class="">
                    <input type="hidden" name="MAX_FILE_SIZE" value="7000000">
                    <input id='upFile' type="file" name="fichier"></input>
                    <input type="hidden" name="mail" value='<?php $mail = $_SESSION['mail']; echo $mail; ?>'>
                </div>
                <div class="text-right mb-2">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Upload</button>
                </div>
            </form>
            <div class="jumbotron">
                <?php
                $nb_files = 0;
                echo "<ul>";
                $req = afficherFichier($_SESSION['mail']);
                while ($donnees = $req->fetch()){
                    $nb_files++;
                    echo '<li><a href="../files/users/' . $donnees['fichier'] . '">' . $donnees['fichier'] . '</a></li>';
                }
                echo "</ul><br>";
                echo "<strong>$nb_files</strong> file(s) uploaded";
                ?>
            </div>
        </div>
        <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>
