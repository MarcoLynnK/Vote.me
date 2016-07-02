<?php

require_once("Main/VotingManager.php");
require_once("Main/VotingChanceManager.php");
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Chance= htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");
$chanceManager= new VotingManager();
$chance= $chanceManager->findById($ID_Chance);

$chance->ID_Voting= $ID_Voting;

$votingManager= new VotingManager();
$voting= $votingManager->findById($ID_Voting);
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

<?php require_once("include/HeadUser.php") ?>

<?php
print_r($chance);
echo "<h1 class='topic'><a class='bold'>Votingthema:</a> $voting->name_Voting</h1>";
echo "<h3 class='text2'><a class='bold'>Antwort:</a> $chance->description_Chance</h3>";
?>
</body>
</html>