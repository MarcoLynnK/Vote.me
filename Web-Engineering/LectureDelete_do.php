<?php include("include/session_check.php"); ?>

<?php
require_once("Main/Classes.php");
require_once("Main/LectureManager.php");

$ID_Lecture = (int)htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");

$lectureManager = new LectureManager();
$lecture = $lectureManager->findById($ID_Lecture);
$lectureManager->delete($lecture);

header('Location: Lecture_Index.php');