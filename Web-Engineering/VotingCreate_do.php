<?php
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$name_Voting= htmlspecialchars($_POST["name_Voting"], ENT_QUOTES, "UTF-8");
$question_Voting = htmlspecialchars($_POST["question_Voting"], ENT_QUOTES, "UTF-8");
$Chance1 = htmlspecialchars($_POST["Chance1"], ENT_QUOTES, "UTF-8");
$Chance2 = htmlspecialchars($_POST["Chance2"], ENT_QUOTES, "UTF-8");
$Chance3 = htmlspecialchars($_POST["Chance3"], ENT_QUOTES, "UTF-8");
$Chance4 = htmlspecialchars($_POST["Chance4"], ENT_QUOTES, "UTF-8");

if (!empty($name_Voting) && !empty($question_Voting) && !empty($Chance1) && !empty($Chance2)  )
{
    $votingManager = new VotingManager();
    $voting = $votingManager->create ($voting);//holt sich das Voting aus der Datenbank durch Suche nach der ID
    if ($voting==null) {
        header('Location: login.php');
        die();
    }
}
else{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}