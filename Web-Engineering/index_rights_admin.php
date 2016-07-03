<?php
/*include ("include/RightsCheck.php");
include ("include/Session_Check.php");*/
?>
!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>
<?php include("include/NavbarUser.php") ?>

<h1>Sie sind Admin:</h1>
<a href="User_Index.php">User</a><br><br>
<a href="Lecture_Index.php">Vorlesungen</a><br><br>
<a href="Voting_Index.php">Votings</a><br><br>
<a href="Chance_Index.php">Chance</a>

</body>
</html>
