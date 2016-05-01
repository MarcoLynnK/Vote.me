<?php
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");
$ID_Voting= htmlspecialchars($_POST ["ID_Voting"], ENT_QUOTES, "UTF-8");
$name_Voting= htmlspecialchars($_POST["name_Lecture"], ENT_QUOTES, "UTF-8");
$question_Voting = htmlspecialchars($_POST["degreecourse"], ENT_QUOTES, "UTF-8");

    if (!empty ($ID_Voting) && !empty($name_Voting) && !empty($question_Voting))
    {
        $votingManager = new VotingManager();
        $voting = $votingManager->findById($ID_Voting);//holt sich das Voting aus der Datenbank durch Suche nach der ID
        $voting->name_Voting= $name_Voting;
        $voting->question_Voting= $question_Voting;
        $votingManager-> update ($voting);
        header ('Location: index.php');

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

