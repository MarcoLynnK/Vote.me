<?php

require_once("Main/VotingManager.php");
require_once("Main/VotingChanceManager.php");
require_once("Main/Classes.php");

$ID_Voting= (int) htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
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
print_r ($voting);
echo "<h1>Voting: $ID_Voting</h1><br>";
echo "<h3>Topic: $name_Voting</h3><br>";
echo "<h3>Question: $question_Voting</h3><br><br>";

if (count($chance))
{
    $i=1;
    foreach ($chance as $möglichkeiten)
    {
        echo "<h3>Antwort $i: $chance->$description_Chance</h3><br>";
        $i=$i+1;
    }
}
?>
</body>
</html>
