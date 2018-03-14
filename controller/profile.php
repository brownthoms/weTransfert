<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile de <?php echo $login_session;?></title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <div class="container">

        <div id="profile">
            <b id="bienvenue">Bienvenue : <i><?php echo $login_session; ?></i></b>
            <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>

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
                $user = $bdd->query("SELECT mail, name FROM user WHERE mail='$log'");
                $donnees = $user->fetch();


            ?>
        </div>
    </div>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
