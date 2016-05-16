<html>
<head>
    <?php require_once ("include/Head.php")?>

</head>
<body>
<?php
/*
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$name_Voting= htmlspecialchars($_GET["name_Voting"], ENT_QUOTES, "UTF-8");
$question_Voting= htmlspecialchars($_GET["question_Voting"], ENT_QUOTES, "UTF-8");

if (!empty($ID_Voting) && !empty($name_Voting) && !empty($question_Voting))
{
    $votingManager = new VotingManager();
    $voting = $votingManager->findById($ID_Voting);//holt sich das Voting aus der Datenbank durch Suche nach der ID
    if ($voting==null)
    {
        header('Location: Chance_Index.php');
        die();
    }
    return $voting;
}
*/
?>

<h1> Neues Voting anlegen:</h1>

<form action="VotingCreate_do.php" method="post">
    Votingthema:<br>
    <input type="text" name="name_Voting" id="name_Voting" placeholder="Votingthema"><br><br>
    Frage:
    <input type="text" name="question_Voting" id="question_Voting" placeholder="Frage"><br><br>
    <input type='submit' value='anlegen'>
</form>

</body>