<?php
require_once ("Main/LectureManager.php");
require_once ("Main/Classes.php");

$ID_Lecture = (int)htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$ChanceManager = new LectureManager();
$lecture = $LectureManager->findById($ID_Lecture);

?>

<!DOCTYPE html>
<html>
<?php include("include/header.php"); ?>

<body>

<h1>Eintrag # <?php echo ($lecture->ID_Lecture) ?></h1>

    <form action='LectureUpdate_do.php' method='post'>
        <input type='hidden' name='ID_Lecture' value='<?php echo ($lecture->ID_Lecture) ?>' />
        Name der Vorlesung:<br>
        <input type='text' name='name_Lecture' value='<?php echo ($lecture->name_Lecture) ?>' placeholder="Name der Vorlesung" /><br>
        Studiengang:
        <input type='text' name='degreecourse' value='<?php echo ($lecture->degreecourse) ?>' placeholder="Studiengang" /><br>
        <input type='submit' value='aktualisieren' />
    </form>

</body>
</html>