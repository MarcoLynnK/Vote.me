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


<?php include("include/NavbarUser.php"); ?>


<body>
<?php
print_r($chance);
echo "<h1 class='topic'><a class='bold'>Votingthema:</a> $voting->name_Voting</h1>";
echo "<h3 class='text2'><a class='bold'>Antwort:</a> $chance->description_Chance</h3>";
?>
</body>
</html>