<?php

require_once("Main/LectureManager.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$ID_Lecture = htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$lectureManager = new LectureManager();
$lecture= $lectureManager->findById($ID_Lecture);

$userManager= new UserManager();
$user= $userManager->findById($lecture->ID_User);
?>

<!DOCTYPE html>
<html>

<?php include("include/NavbarUser.php"); ?>

<body>

<?php

echo "<h1 class='topic'><a class='bold'>Vorlesung Nr. $ID_Lecture</h1>";
echo "<h3 class='text2'><a class='bold'>Lecture:</a> $lecture->name_Lecture</h3>";
echo "<h3 class='text2'><a class='bold'>Degreecourse:</a> $lecture->degreecourse</h3>";
echo "<h3 class='text2'><a class='bold'>Created by:</a> $user->firstname $user->lastname</h3>"

?>
</body>
</html>