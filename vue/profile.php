<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile utilisateur</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="profile">
        <b id="bienvenue">Bienvenue : <i><?php echo $login_session; ?></i></b>
        <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
</body>
</html>
