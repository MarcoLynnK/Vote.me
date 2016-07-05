<?php
include ("Main/Session_Check.php");
require_once("Main/ChanceManager.php");
require_once ("Main/VotingManager.php");
require_once("Main/Classes.php");
/*
 * Übergeben der ID_Chance per Post
 */
$ID_Chance= htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");

/*
 * neuer Chancemanager
 */
$chanceManager= new ChanceManager();

/*
 * Auslesen von Chance durch ID mit Methode findById
 */
$chance= $chanceManager->findById($ID_Chance);

/*
 * neuer Votingmanager
 */
$votingManager= new VotingManager();

/*
 * Auslesen des Objektes Voting durch ID, enthalten im Objekt Chance
 */
$voting= $votingManager->findById($chance->ID_Voting);

//Absicherung gegen Hack durch Methode im Chancemanager
$user= $_SESSION["user"];

/*
 * Prüfen des Zugriffs über Methode doesUserOwnthis mit den Parametern User aus der Session und dem objekt Chance
 */
if (!$chanceManager->doesUserOwnThis($user, $chance))
{

    echo "Sie haben keine Befugnis!";
    die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Chance Read</title>
<body>
<?php require_once("include/Navbar.php"); ?>

<?php
/*
 * Darstellung der Chance mit dazugehörigem Voting
 */
echo "<h1 class='topic'><a class='bold'>Chance Nr.</a>$chance->ID_Chance</h1>";
echo "<h3 class='text2'><a class='bold'>Votingthema:</a> $voting->name_Voting</h3>";
echo "<h3 class='text2'><a class='bold'>Antwort:</a> $chance->description_Chance</h3>";

/*
 * Verlinkung zum zugehörigen Voting
 */
echo"<a href='VotingRead.php?ID_Voting=$chance->ID_Voting'><div class='submit'>SHOW VOTING</div></a>";
?>
</body>
</html>