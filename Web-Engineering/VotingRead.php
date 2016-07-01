<?php

require_once("Main/VotingManager.php");
require_once("Main/VotingChanceManager.php");
require_once("Main/LectureVotingManager.php");
require_once("Main/Classes.php");

$ID_Voting= (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$votingManager= new VotingManager();
$voting= $votingManager->findById($ID_Voting);

$lecturevotingManager= new LectureVotingManager();
$lecture= $lecturevotingManager->findAllLectureByVoting($voting);

$votingchanceManager= new VotingChanceManager();
$chance= $votingchanceManager->findAllChancesByVoting($voting);
?>

<!DOCTYPE html>
<html>


<?php include("include/HeadUser.php"); ?>


<body>


<?php
echo "<h1>Vorlesung: $lecture->name_Lecture</h1>";
echo "<h3>Topic: $voting->name_Voting</h3>";
echo "<h3>Question: $voting->question_Voting</h3>";

if (count($chance)>0)
{
    $i=1;
    foreach ($chance as $möglichkeiten)
    {
        echo "<h3>Antwort $i: $möglichkeiten->description_Chance</h3>";
        $i=$i+1;
    }
}
//blabla
?>
</body>
</html>