<?php
/*
 * Dieses Skript führt eine Löschung aus dem Voting_Index aus und verlinkt wieder auf den Voting Index
 */
include ("Main/Session_Check.php");
require_once("Main/Classes.php");
require_once("Main/VotingManager.php");

$ID_Voting = (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

/*
 * Neuer Votingmanager
 */
$votingManager = new VotingManager();
$voting= $votingManager->findById($ID_Voting);

/*
 * Methode gegen hack schützen
 */
$user= $_SESSION["user"];

/*
 * Voting anhand des übergebenen Objekts aus Index Löschen
 */

$votingManager->delete ($ID_Voting);

/*
 * Direkte Weiterleitung auf Voting_Index
 */
header('Location: Voting_Index.php');
