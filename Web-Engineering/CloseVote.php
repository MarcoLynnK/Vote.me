<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Close Voting</title>
<body>
<?php require_once("include/Navbar.php"); ?>

<?php


// Dieses Skript öffnet das Voting und erzeugt den Teilnahmelink für Studenten.
require "Main/Manager.php";
require "Main/VotingManager.php";

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

// VotingManager erstellen
$votingManager = new VotingManager();

// Voting holen
$voting = $votingManager->findById($ID_Voting);

// Status prüfen
if ($voting->Status == 0) {

    echo "<p class='topic'>Voting is closed!</p><br><br>";

} else {

    // Voting öffnen wenn aktuell geschlossen
    echo "<p class='topic'>Open voting.</p>";
    $voting = $votingManager->closeVote($voting);

}

// Link abrufen
echo "<a href='Voting_Index.php'><div class='submit'>BACK</div></a>";
?>


</body>
</html>