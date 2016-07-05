<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Voting</title>
<body>
<div id="navbar">
    <img src="img/logo2.svg" id="logo">
</div>

<?php

// Dieses Skript öffnet das Voting und erzeugt den Teilnahmelink für Studenten.
require "qrCode.php";
require "Main/Manager.php";
require "Main/VotingManager.php";

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

/*
 * neuen VotingManager erstellen
 */
$votingManager = new VotingManager();

/*
 * Voting aus der DB holen
 */
$voting = $votingManager->findById($ID_Voting);

// Votingstatus prüfen (1 für offen, 0 für geschlossen)
if ($voting->Status == 1) {

    echo "Voting bereits offen. Generiere Link";

} else {

    // Voting öffnen wenn aktuell geschlossen
    echo "Öffne Voting.";
    $voting = $votingManager->openVote($voting);

}
//QR-Code
echo '<img src="qrCode.php?Voting_ID=' . $ID_Voting . '">';?>'


// Link abrufen
echo "Link für Voting: mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/Voting.php?ID_Voting=".$ID_Voting;
?>

</body>

<footer>
    <div>
        <p>© 2016 by Vote.me GmbH - <a href="mailto:support@vote.me">Contact</a> - <a href="impressum.php">Impressum</a></p>
    </div>
</footer>

</html>