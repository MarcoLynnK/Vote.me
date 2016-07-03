<?php
include ("Main/Session_Check.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>
<?php require_once("include/Navbar.php"); ?>

<div class="container">
    <center><a class="topic">You are Lecturer</a></center><br><br>
    <a href="Lecture_index.php"><div class='submit'>Lecture</div></a><br><br>
    <a href="Voting_Index.php"><div class='submit'>Votings</div></a><br><br>
    <a href="Chance_Index.php"><div class='submit'>Chance</div></a>
</div>
</body>
</html>
