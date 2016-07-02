<html>
<head>
    <?php include("include/NavbarUser.php") ?>
    </head>
<body>
<?php

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
?>

<h1> Neue Möglichkeit anlegen:</h1>

<form action="ChanceCreate_do.php" method="post">
    New Chance:<br>
    <input type="text" name="description_Chance" id="description_Chance" placeholder="Beschreibung"><br><br>
    <input type='submit' value='anlegen'>
    </form>
</body>