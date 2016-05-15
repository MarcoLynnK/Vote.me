<html>
<head>
    <?php
    require_once('include/Head.php')
    ?>
</head>
<body>
<?php
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$name_Voting = htmlspecialchars($_GET["name_Voting"], ENT_QUOTES, "UTF-8");

if (!empty($ID_Voting) && !empty($name_Voting))
{
        $votingManager = new VotingManager($voting);
        $voting = $votingManager->findAll();//holt sich das Voting aus der Datenbank durch Suche nach der ID
        if ($voting==null)
        {
        header('Location: login.php');
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
    <?php echo '<option value="$voting->ID_Voting.$voting->name_Voting"></option>'?>
    <input type='submit' value='anlegen'>
</form>

</body>