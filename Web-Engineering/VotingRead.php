<?php

require_once("Main/VotingManager.php");
require_once("Main/VotingChanceManager.php");
require_once("Main/Classes.php");

$ID_Voting= (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$votingManager= new VotingManager();
$voting= $votingManager->findById($ID_Voting);

$votingchanceManager= new VotingChanceManager();
$chance= $votingchanceManager->findAllChancesByVoting($voting);
?>

<!DOCTYPE html>
<html>

<?php include("include/HeadUser.php"); ?>

<body>

<?php
print_r($chance);

echo "<h1>Voting: $voting->ID_Voting</h1>";
echo "<h3>Topic: $voting->name_Voting</h3>";
echo "<h3>Question: $voting->question_Voting</h3>";

if (count($chance))
{
    $i=1;
    foreach ($chance as $möglichkeiten)
    {
        echo "<h3>Antwort $i: $chance->description_Chance</h3>";
        $i=$i+1;
    }
}
?>
</body>
</html>