<?php
include ("Main/Session_Check.php");
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Lecture= (int)htmlspecialchars($_POST ["ID_Lecture"], ENT_QUOTES, "UTF-8");
$name_Lecture= htmlspecialchars($_POST["name_Lecture"], ENT_QUOTES, "UTF-8");
$degreecourse = htmlspecialchars($_POST["degreecourse"], ENT_QUOTES, "UTF-8");


if (!empty($ID_Lecture) && !empty($name_Lecture) && !empty($degreecourse))
{
    $lectureManager = new LectureManager();
    $lecture = $lectureManager->findById($ID_Lecture);//holt sich das Voting aus der Datenbank durch Suche nach der ID
    $lecture->ID_Lecture= $ID_Lecture;
    $lecture->name_Lecture= $name_Lecture;
    $lecture->degreecourse= $degreecourse;
    $lectureManager-> update ($lecture);
    header ('Location: Lecture_index.php');
    
    if ($lecture==null) 
    {
        header('Location: login.php');
        die();
    }
}
    
else 
{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}
