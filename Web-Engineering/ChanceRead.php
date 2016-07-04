<?php
include ("Main/Session_Check.php");
require_once("Main/ChanceManager.php");
require_once ("Main/VotingManager.php");
require_once("Main/Classes.php");

$ID_Chance= htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");
$chanceManager= new ChanceManager();
$chance= $chanceManager->findById($ID_Chance);

$votingManager= new VotingManager();
$voting= $votingManager->findById($chance->ID_Voting);
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

<?php
echo "<h1 class='topic'><a class='bold'>Chance Nr.</a>$chance->ID_Chance</h1>";
echo "<h3 class='text2'><a class='bold'>Votingthema:</a> $voting->name_Voting</h3>";
echo "<h3 class='text2'><a class='bold'>Antwort:</a> $chance->description_Chance</h3>";

echo"<a href='VotingRead.php?ID_Voting=$chance->ID_Voting'><div class='submit'>SHOW VOTING</div></a>";
?>
</body>
</html>