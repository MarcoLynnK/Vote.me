<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Impressum</title>
<body>
<div id="navbar">
    <img src="img/logo2.svg" id="logo">
</div>


<?php
require "qrCode.php";
require "Main/Manager.php";
require "Main/VotingManager.php";

echo '<img src="qrCode.php?Voting_ID=' . $ID_Voting . '">';?>



</body>

<footer>
    <div>
        <p>© 2016 by Vote.me GmbH - <a href="mailto:support@vote.me">Contact</a> - <a href="impressum.php">Impressum</a></p>
    </div>
</footer>

</html>