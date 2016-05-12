<html>
<head>
    <?php
    require_once('include/Head.php')
    ?>
</head>
<body>
<?php
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Lecture= htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$name_Lecture = htmlspecialchars($_GET["name_Lecture"], ENT_QUOTES, "UTF-8");

if (!empty($ID_Lecture) && !empty($name_Lecture))
{
    $lectureManager = new LectureManager($lecture);
    $lecture = $lectureManager->findAll();//holt sich das Voting aus der Datenbank durch Suche nach der ID
    if ($lecture==null)
    {
        header('Location: login.php');
        die();
    }
    return $lecture;
}
?>

<h1> Neue Möglichkeit anlegen:</h1>

<form action="VotingCreate_do.php" method="post">
    Möglichkeit:<br>
    <input type="text" name="description_Chance" id="description_Chance" placeholder="Beschreibung"><br><br>
    Zu Voting zuweisen:
    <?php echo '<option value="$lecture->ID_Lecture.$lecture->name_Lecture"></option>'?>
    <input type='submit' value='anlegen'>
</form>

</body>