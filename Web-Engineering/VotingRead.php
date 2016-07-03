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
<?php include("include/NavbarUser.php"); ?>

<div class="table-container">
<table>
<?php
    echo "<tr><th>Lecture</th><th></a> $lecture->name_Lecture</a></th></tr>";
    echo "<tr><th>Voting No.</th><th></a> $voting->ID_Voting</a></th></tr>";
    echo "<tr><td>Topic:</td><td></a> $voting->name_Voting</a></td></tr>";
    echo "<tr><td>Question:</td><td></a> $voting->question_Voting</a></td></tr>";

    if (count($chance)>0)
    {
        $i=1;
        foreach ($chance as $möglichkeiten)
        {
            echo "<tr><td>Antwort</td><td><a> $i: $möglichkeiten->description_Chance</a></td></tr></br></br>";
            $i=$i+1;
        }
    }
?>
</table>
</div>
<?php
echo"<h2><a href='LectureRead.php?ID_Lecture=$voting->ID_Lecture'>SHOW LECTURE</a></h2>";
echo "<button class='submit' name='submit'><a href='ChanceCreateform.php?ID_Voting=$voting->ID_Voting'</a>CREATE CHANCE</button></br></br>";
echo "<button class='submit' name='submit'><a href='Voting_Index.php'</a>BACK</button>"
?>
</body>
</html>