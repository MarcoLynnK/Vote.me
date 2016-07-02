<?php
require_once ("Main/VotingManager.php");
require_once ("Main/Classes.php");

$ID_Voting = (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($ID_Voting);

?>

<!DOCTYPE html>
<html>
<head>

<?php include("include/HeadUser.php"); ?>

</head>
<body>


<a>Voting Nr. <?php echo ($voting->ID_Voting) ?></a>

<form action='VotingUpdate_do.php' method='post'>
    <input class="inputForm" type='hidden' name='ID_Voting' value='<?php echo ($voting->ID_Voting) ?>' />
    <a class="text">Thema des Votings:</a><br>
    <input class="inputForm" type='text' name='name_Voting' value='<?php echo ($voting->name_Voting) ?>' placeholder="Thema" /><br>
    <a class="text">Frage:</a></br>
    <input class="inputForm" type='text' name='question_Voting' value='<?php echo ($voting->question_Voting) ?>' placeholder="Frage" /><br>
    <input class="submit" type='submit' value='aktualisieren' />
</form>

</body>
</html>