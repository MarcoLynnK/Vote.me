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

echo "<h1 class='topic'><a class='bold'>Voting Nr.</a> $voting->ID_Voting</h1>";
echo "<h3 class='text2'><a class='bold'>Topic:</a> $voting->name_Voting</h3>";
echo "<h3 class='text2'><a class='bold'>Question:</a> $voting->question_Voting</h3>";

if (count($chance)>0)
{
    $i=1;
    foreach ($chance as $möglichkeiten)
    {
        echo "<h3 class='text2'>Antwort $i: $möglichkeiten->description_Chance</h3>";
        $i=$i+1;
    }
}
?>
</body>
</html>