<?php
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$name_Lecture= htmlspecialchars($_POST["name_Lecture"], ENT_QUOTES, "UTF-8");
$degreecourse = htmlspecialchars($_POST["degreecourse"], ENT_QUOTES, "UTF-8");

if (!empty($name_Lecture) && !empty($degreecourse))
{
    $lectureManager = new LectureManager($lecture);
    $lecture = $lectureManager->create ($lecture);//holt sich das Voting aus der Datenbank durch Suche nach der ID
    if ($lecture==null) {
        header('Location: login.php');
        die();
    }
}
else {
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}