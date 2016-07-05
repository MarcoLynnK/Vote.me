<?php
/*
 * Dieses Skript führt eine Löschung aus dem Voting_Index aus und verlinkt wieder auf den Voting Index
 */
include ("Main/Session_Check.php");
require_once("Main/Classes.php");
require_once("Main/VotingManager.php");
require_once("Main/LectureManager.php");

$voting = (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

/*
 * Neuer Votingmanager für methode Delete
 */
$votingManager = new VotingManager();
/*
 * Voting anhand des übergebenen Objekts aus Index Löschen
 */
$votingManager->delete ($voting);


/*
 * Neuer Votingmanager zum auslesen des Objekts Voting, um die LectureID zu finden
 */
$votingmanager= new VotingManager();

/*
 * Methode findById holt das objekt Voting anhand der ID
 */
$voting= $votingManager->findById($ID_Voting);


/*
 * neuer LectureManager
 */
$lectureManager= new LectureManager();
/*
 * Auslesen des Objekts Lecture durch die ID, die in dem Objekt Voting gespeichert ist
 */
$lecture= $lectureManager->findById($voting->ID_Lecture);


/*
 * Direkte Weiterleitung auf Voting_Index
 */
header("Location: LectureRead.php?lecture={$lecture}");