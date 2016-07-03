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
if ($voting->Status == 1) {

    echo "Voting bereits offen. Generiere Link";

} else {

    // Voting öffnen wenn aktuell geschlossen
    echo "Öffne Voting.";
    $voting = $votingManager->openVote($voting);

}

// Link abrufen
echo "Link für Voting: mars.iuk.hdm-stuttgart.de/~mk235/Voting.php?ID_Voting=".$ID_Voting;

