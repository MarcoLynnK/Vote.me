<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 03.07.16
 * Time: 20:22
 */

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

    echo "Voting ist Geschlossen!";

} else {

    // Voting öffnen wenn aktuell geschlossen
    echo "Öffne Voting.";
    $voting = $votingManager->closeVote($voting);

}

// Link abrufen
echo "Sie haben das Voting geschlossen";

echo "<a href='VotingResult.php?ID_Voting=$voting->ID_Voting'><div class='submit'>SHOW RESULT</div></a><br><br>";