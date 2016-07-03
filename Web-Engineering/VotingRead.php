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

<?php include("include/NavbarUser.php"); ?>


<body>
<table>
<?php

echo "<tr><td class='text'>Voting No.</td><td></a> $voting->ID_Voting</a></td></tr>";
echo "<tr><td class='text'>Topic:</td><td></a> $voting->name_Voting</a></td></tr>";
echo "<tr><td class='text'>Question:</td><td></a> $voting->question_Voting</a></td></tr>";

if (count($chance)>0)
{
    $i=1;
    foreach ($chance as $möglichkeiten)
    {
        echo "<tr><td class='text'>Antwort</td><tr><a> $i: $möglichkeiten->description_Chance</a></td></tr>";
        $i=$i+1;
    }
}
echo "<h3 class='text2'><a href='ChanceCreateform.php?ID_Voting=$voting->ID_Voting'</a>CREATE CHANCE</h3>";
echo "<h3 class='text2'><a href='Voting_Index.php'</a>BACK</h3>";
?>

</table>
</body>
</html>