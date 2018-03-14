<?php
    include 'connexion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>weTransfert</title>
        <?php include 'includes/header.php'; ?>
    </head>
    <body>
        <p>Bienvenue
            <?php
                session_start();
                echo $_SESSION['mail'];
                echo  $_SESSION['password'];
            ?>
        </p>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
