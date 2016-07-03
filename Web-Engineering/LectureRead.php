<?php
include ("Main/Session_Check.php");
require_once("Main/LectureManager.php");
require_once("Main/LectureVotingManager.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$ID_Lecture = htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$lectureManager = new LectureManager();
$lecture= $lectureManager->findById($ID_Lecture);

$lecturevotingManager= new LectureVotingManager();
$voting= $lecturevotingManager->findAllVotingBylecture($lecture);

$userManager= new UserManager();
$user= $userManager->findById($lecture->ID_User);
?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>

<?php include("include/NavbarUser.php"); ?>

<body>

<?php

echo "<h1 class='topic'><a class='bold'>Vorlesung Nr. $ID_Lecture</h1>";
echo "<h3 class='text2'><a class='bold'>Lecture:</a> $lecture->name_Lecture</h3>";
echo "<h3 class='text2'><a class='bold'>Degreecourse:</a> $lecture->degreecourse</h3>";
echo "<h3 class='text2'><a class='bold'>Created by:</a> $user->firstname $user->lastname</h3>";
if (count($voting)>0)
{
    $i=1;
    foreach ($voting as $vorlesungen)
    {
        echo "<h3 class='text2'>Voting $i: $vorlesungen->name_Voting</h3>";
        echo "<a href='VotingRead.php?ID_Voting=$voting->ID_Voting'>zeige</a>";
        echo "<a href='VotingDelete_do.php?ID_Voting=$voting->ID_Voting'>l&ouml;sche</a>";
        $i=$i+1;
    }
}

echo "<h3 class='text2'><a href='VotingCreate_form.php?ID_Lecture=$lecture->ID_Lecture'</a>CREATE VOTING</h3>";
echo "<h3 class='text2'><a href='Lecture_index.php'</a>BACK</h3>";
?>
</body>
</html>