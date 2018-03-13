<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Thomas Araujo - Développeur Front-End en Formation</title>
    <link rel="stylesheet" href="css/styledesk.css">
    <link rel="stylesheet" href="css/styletab.css">
    <link rel="stylesheet" href="css/styletel.css">
    <link rel="stylesheet" type="text/css" href="fullPage/jquery.fullPage.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- This following line is optional. Only necessary if you use the option css3:false and you want to use other easing effects rather than "linear", "swing" or "easeInOutCubic". -->
    <script src="fullPage/vendors/jquery.easings.min.js"></script>
    <!-- This following line is only necessary in the case of using the option `scrollOverflow:true` -->
    <script type="text/javascript" src="fullPage/vendors/scrolloverflow.min.js"></script>
    <script type="text/javascript" src="fullPage/jquery.fullPage.js"></script>
    <!-- <script type="text/javascript" src="vendors/scrolloverflow.min.js"></script>
        <script type="text/javascript" src="jquery.fullPage.js"></script>
        <script type="text/javascript" src="fullpage.continuousHorizontal.min.js"></script>
        <script type="text/javascript" src="fullpage/jquery.fullpage.extensions.min.js"></script> -->
</head>

<body>
    <div id="fullpage">
        <div class="part1 section" data-anchor="slide1">
            <div class="nominfo">
                <div class="nom">Thomas Araujo</div>
                <div class="info">Développeur Front-End en Formation</div>
            </div>
            <a href="info.php"><button type="button" name="button" class="boutonabout">A propos</button></a>
            <ul id="myMenu">
                <a href="#firstPage">
                    <li data-menuanchor="firstPage" class="active"></li>
                </a>
                <a href="#secondPage">
                    <li data-menuanchor="secondPage"></li>
                </a>
                <a href="#thirdPage">
                    <li data-menuanchor="thirdPage"></li>
                </a>
                <a href="#fourthPage">
                    <li data-menuanchor="fourthPage"></li>
                </a>
            </ul>
            <div>
                <img class="imgmoi" src="img/moi.JPG">
            </div>
            <div class="intro">
                <p class="bjrintro">Bonjour !</p>
                <p class="textintro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="myMail">
                thomas.araujo87@gmail.com
            </div>
        </div>




        <div class="section" data-anchor="slide2">Some section</div>
        <div class="section" data-anchor="slide3">Some section</div>
        <div class="section" data-anchor="slide4">Some section</div>
    </div>
</body>

</html>
