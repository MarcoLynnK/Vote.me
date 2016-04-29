<?php
require_once ("Main/VotingManager.php");
require_once ("Main/Classes.php");

$ID_Voting = (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($ID_Voting);

?>

<!DOCTYPE html>
<html>
<?php include("include/header.php"); ?>

<body>

<h1>Eintrag # <?php echo ($voting->ID_Voting) ?></h1>

<form action='LectureUpdate_do.php' method='post'>
    <input type='hidden' name='ID_Voting' value='<?php echo ($voting->ID_Voting) ?>' />
    Thema des Votings:<br>
    <input type='text' name='name_Voting' value='<?php echo ($voting->name_Voting) ?>' placeholder="Thema" /><br>
    Frage:
    <input type='text' name='question_Voting' value='<?php echo ($voting->question_Voting) ?>' placeholder="Frage" /><br>
    <input type='submit' value='aktualisieren' />
</form>

</body>
</html>