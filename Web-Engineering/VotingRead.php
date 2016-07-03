<?php
include ("Main/Session_Check.php");
require_once("Main/VotingManager.php");
require_once("Main/VotingChanceManager.php");
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$votingManager= new VotingManager();
$voting= $votingManager->findById($ID_Voting);

$votingchanceManager= new VotingChanceManager();
$chance= $votingchanceManager->findAllChancesByVoting($voting);

$lectureManager= new LectureManager();
$lecture= $lectureManager->findById($voting->ID_Lecture);
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
    echo "<tr><th>Lecture</th><td> $lecture->name_Lecture</td></tr>";
    echo "<tr><td>Voting No.</td><td> $voting->ID_Voting</td></tr>";
    echo "<tr><td>Topic:</td><td> $voting->name_Voting</td></tr>";
    echo "<tr><td>Question:</td><td> $voting->question_Voting</td></tr>";

    if (count($chance)>0)
    {
        $i=1;
        foreach ($chance as $möglichkeiten)
        {
            echo "<tr><td>Antwort $i:</td><td><a> $möglichkeiten->description_Chance</a></td></tr></br></br>";
            $i=$i+1;
        }
    }
?>
</table></br></br>
</div>

<div class="container">
<?php
echo "<a href='LectureRead.php?ID_Lecture=$voting->ID_Lecture'><div class='submit'>SHOW LECTURE</div></a></br></br>";
echo "<a href='ChanceCreateform.php?ID_Voting=$voting->ID_Voting'><div class='submit'>CREATE CHANCE</div></a></br></br>";
echo "<a href='Voting_Index.php'><div class='submit'>BACK</div></a>"
?>
</div>
</body>
</html>