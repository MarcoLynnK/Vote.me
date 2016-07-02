<?php

require_once("Main/LectureManager.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$ID_Lecture = htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$lectureManager = new LectureManager();
$lecture = $lectureManager->findById($ID_Lecture);

$lecture->ID_User= $ID_User;
$userManager= new UserManager();
$user= $userManager->findById($ID_user);
?>

<!DOCTYPE html>
<html>

<?php include("include/HeadUser.php"); ?>

<body>

<?php
echo "<h2>Vorlesung Nr. $ID_Lecture:</h2>";
echo "<h1 class='topic'><a class='bold'>Username:</a> $lecture->name_Lecture</h1>";
echo "<h3 class='text2'><a class='bold'>Firstname:</a> $lecture->degreecourse</h3>";
echo "<h3 class='text2'><a class='bold'>Firstname:</a> $user->firstname, $user->lastname</h3>";
?>
</body>
</html>