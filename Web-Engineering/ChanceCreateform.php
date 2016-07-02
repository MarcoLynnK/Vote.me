<html>
<head>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>

</head>
<body>

<?php require_once("include/HeadUser.php") ?>


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
    Möglichkeit:<br>
    <input type="text" name="description_Chance" id="description_Chance" placeholder="Beschreibung"><br><br>
    Zu Voting zuweisen:
    <?php echo "<option value='$voting->ID_Voting'></option>"?>
    <input type='submit' value='anlegen'>
    </form>
</body>