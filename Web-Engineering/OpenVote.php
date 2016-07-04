<?php

// Dieses Skript öffnet das Voting und erzeugt den Teilnahmelink für Studenten.

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

// Link abrufen
echo "Link für Voting: mars.iuk.hdm-stuttgart.de/~mk235/Voting.php?ID_Voting=".$ID_Voting;
