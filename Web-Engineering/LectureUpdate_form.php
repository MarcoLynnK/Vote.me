<?php
require_once ("Main/LectureManager.php");
require_once ("Main/Classes.php");

$ID_Lecture = (int)htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$LectureManager = new LectureManager();
$lecture = $LectureManager->findById($ID_Lecture);

?>

<!DOCTYPE html>
<html>
<head>
    <?php include("include/NavbarUser.php"); ?>
    
</head>

<body>


<a>Vorlesung Nr.<?php echo ($lecture->ID_Lecture) ?></a>

<form action='LectureUpdate_do.php' method='post'>
    <input class="inputForm" type='hidden' name='ID_Lecture' value='<?php echo ($lecture->ID_Lecture) ?>' />
    Name der Vorlesung:<br>
    <input class="inputForm" type='text' name='name_Lecture' value='<?php echo ($lecture->name_Lecture) ?>' placeholder="Vorlesung" /><br>
    Studiengang:
    <input class="inputForm" type='text' name='degreecourse' value='<?php echo ($lecture->degreecourse) ?>' placeholder="Studiengang" /><br>
    <input class="submit" type='submit' value='UPDATE' />
</form>

</body>
</html>