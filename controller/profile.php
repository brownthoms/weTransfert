<?php
    include 'connexion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>weTransfert</title>
        <?php include '../includes/header.php'; ?>

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
                session_start();
                echo $_SESSION['mail'];
                echo  $_SESSION['password'];
                ?>
            </div>
        </div>



        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
