<?php
include ("Main/Session_Check.php");
require_once("Main/Classes.php");
require_once("Main/LectureManager.php");

$ID_Lecture = (int)htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");

$lectureManager = new LectureManager();
$lecture = $lectureManager->findById($ID_Lecture);

$user= $_SESSION["user"];

if (!$lectureManager->doesUserOwnThis($user, $lecture))
{

    echo "Sie haben keine Befugnis!";
    die();
}


$lectureManager->delete($lecture);



header('Location: Lecture_index.php');