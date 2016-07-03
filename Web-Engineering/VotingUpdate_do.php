<?php
include ("Main/Session_Check.php");
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$ID_Voting= (int)htmlspecialchars($_POST ["ID_Voting"], ENT_QUOTES, "UTF-8");
$name_Voting= htmlspecialchars($_POST["name_Voting"], ENT_QUOTES, "UTF-8");
$question_Voting = htmlspecialchars($_POST["question_Voting"], ENT_QUOTES, "UTF-8");


if (!empty ($ID_Voting) && !empty($name_Voting) && !empty($question_Voting))
{
    $votingManager = new VotingManager();
    $voting = $votingManager->findById($ID_Voting);//holt sich das Voting aus der Datenbank durch Suche nach der ID
    $voting->name_Voting= $name_Voting;
    $voting->question_Voting= $question_Voting;
    $votingManager-> update ($voting);//Update der Datensätze in der DB anhand der Voting ID
    header ('Location: Voting_Index.php');

    if ($voting==null)
    {
        header('Location: login.php');
        die();
    }
}

else 
{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}

?>