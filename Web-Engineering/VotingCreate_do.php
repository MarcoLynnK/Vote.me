<?php
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$votingthema= htmlspecialchars($_POST["namevot"], ENT_QUOTES, "UTF-8");
$question = htmlspecialchars($_POST["question"], ENT_QUOTES, "UTF-8");

if (!empty($votingthema) && !empty($question))
{
    $votingManager = new VotingManager($con);
    $voting = $votingManager->create ($voting);//holt sich das Voting aus der Datenbank durch Suche nach der ID
    if ($voting==null) {
        header('Location: login.php');
        die();
    }
}
else{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}