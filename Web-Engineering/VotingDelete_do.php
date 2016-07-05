<?php
include ("Main/Session_Check.php");
require_once("Main/Classes.php");
require_once("Main/VotingManager.php");

$voting = (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

$votingManager = new VotingManager();
$votingManager->delete ($voting);

header('Location: Voting_Index.php');
