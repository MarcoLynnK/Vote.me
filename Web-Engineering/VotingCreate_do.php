<?php
include ("Main/Session_Check.php");
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$name_Voting= htmlspecialchars($_POST["name_Voting"], ENT_QUOTES, "UTF-8");
$question_Voting = htmlspecialchars($_POST["question_Voting"], ENT_QUOTES, "UTF-8");


if (!empty($name_Voting) && !empty($question_Voting))
{
    $votingdata= 
        [
            "name_Voting" => $name_Voting,
            "question_Voting" => $question_Voting,
            "ID_User" =>$ID_User,
        ];
    
    $voting= new Voting();
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