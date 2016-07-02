<?php

require_once("Main/VotingManager.php");
require_once("Main/VotingChanceManager.php");
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$votingManager= new VotingManager();
$voting= $votingManager->findById($ID_Voting);

$votingchanceManager= new VotingChanceManager();
$chance= $votingchanceManager->findAllChancesByVoting($voting);

/*$voting->ID_Lecture= $ID_Lecture;
$lectureManager= new LectureManager();
$lecture= $lectureManager->findById($ID_Lecture);*/
?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>

<?php include("include/HeadUser.php"); ?>


<body>

<?php

echo "<tr><td class='text'>Vorlesung:</td><td></a> $voting->ID_Voting</td></tr>";
echo "<tr><td class='text'>Topic:</td><td></a> $voting->name_Voting</td></tr>";
echo "<tr><td class='text'>Question:</td><td></a> $voting->question_Voting</td></tr>";

if (count($chance)>0)
{
    $i=1;
    foreach ($chance as $möglichkeiten)
    {
        echo "<tr><td class='text'>Antwort $i: $möglichkeiten->description_Chance</td></tr>";
        $i=$i+1;
    }
}
?>
</body>
</html>