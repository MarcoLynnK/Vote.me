<?php
require_once ("Main/LectureManager.php");
require_once ("Main/Classes.php");

$ID_Lecture = (int)htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$LectureManager = new LectureManager();
$lecture = $LectureManager->findById($ID_Lecture);

?>

<!DOCTYPE html>
<html>
<?php include("include/header.php"); ?>

<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


<body>

<div id="navbar">

    <img src="pic/logo2.svg" id="logo">

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="#">VOTINGS</a>
            <a href="#">SETTINGS</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>

<a>Eintrag # <?php echo ($lecture->ID_Lecture) ?></a>

    <form action='LectureUpdate_do.php' method='post'>
        <input class="inputForm" type='hidden' name='ID_Lecture' value='<?php echo ($lecture->ID_Lecture) ?>' />
        Name der Vorlesung:<br>
        <input class="inputForm" type='text' name='name_Lecture' value='<?php echo ($lecture->name_Lecture) ?>' placeholder="Name der Vorlesung" /><br>
        Studiengang:
        <input class="inputForm" type='text' name='degreecourse' value='<?php echo ($lecture->degreecourse) ?>' placeholder="Studiengang" /><br>
        <input class="submit" type='submit' value='aktualisieren' />
    </form>

</body>
</html>