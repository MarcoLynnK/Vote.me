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
<center><a class="topic">Sie sind Dozent:</a></center><br><br>
<button class="submit" href="Lecture_Index.php">Vorlesungen</button><br><br>
<button class="submit" href="Voting_Index.php">Votings</button><br><br>
<button class="submit" href="Chance_Index.php">Antworten</button>
</div>
</body>
</html>
