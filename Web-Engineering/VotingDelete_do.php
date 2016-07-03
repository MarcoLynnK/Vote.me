<?php include("include/Session_Check.php"); ?>

<?php
require_once("Main/Classes.php");
require_once("Main/VotingManager.php");

$ID_Voting = (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

$votingManager = new VotingManager();
$voting = $votingManager->findById($ID_Voting);
$votingManager->delete($voting);

header('Location: Voting_Index.php');