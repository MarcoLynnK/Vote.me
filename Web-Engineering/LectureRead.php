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
$voting = $lecturevotingManager->findAllVotingByLecture($lecture);

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



<body>
<?php require_once("include/Navbar.php"); ?>


<div class="table-container">
    <table>
<?php

echo "<tr><th>Lecture Nr. $ID_Lecture</th></tr>";
echo "<tr><th>Lecture</th><th> $lecture->name_Lecture</th></tr>";
echo "<tr><th>Degreecourse</th><th> $lecture->degreecourse</th></tr>";
echo "<tr><th>Created by</th><th> $user->firstname $user->lastname</th></tr>";
if (count($voting)>0)
{

    print_r($voting);


    $i=1;
    foreach ($voting as $vorlesungen)
    {
        echo "<h3 class='text2'>Voting $i: $vorlesungen->name_Voting</h3>";
        echo "<a href='VotingRead.php?ID_Voting=$voting->ID_Voting'><input type='image' class='editicons' src='img/view.svg'></a>";
        echo "<a href='VotingUpdate_do.php?ID_Voting=$voting->ID_Voting'><input type='image' class='editicons' src='img/edit.svg'></a>";
        echo "<a href='VotingDelete_do.php?ID_Voting=$voting->ID_Voting'><input type='image' class='editicons' src='img/trash.svg'></a>";
        $i++;
    }
}

echo "<h3 class='text2'><a href='VotingCreate_form.php?ID_Lecture=$lecture->ID_Lecture'</a>CREATE VOTING</h3>";
echo "<h3 class='text2'><a href='Lecture_index.php'</a>BACK</h3>";
?>
    </table></br></br>
</div>
</body>
</html>