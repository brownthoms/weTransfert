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
                <?php include '../controller/functions.php';
                ?>
            </head>
            <body>
            <?php include '../includes/navuser.php'; ?>
                <div class="text-center mb-5 Kaushan">
                    <span class="texte">Welcome </span><span class="name_session"><?php echo $_SESSION['nom']; ?></span>,
                </div>
                <div class="container">


                    <div class="jumbotron bug">
                        <?php
                        $img = $_POST['postimg'];
                        echo "<div>" . $img . "</div>";
                        echo '<img class="text-center" src="../files/users'. $img .'">';
                        echo '<div class="nomfile text-center"><a href="../files/users/' . $donnees['fichier'] . '" download="../files/users/' . $donnees['fichier'] . '"><button class="btn btn-info downloadopen">Download</button></a></div>';

                        ?>
                    </div>
                </div>
                <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
            </body>
        </html>
    <?php }else header("location: ../index.php")
?>
