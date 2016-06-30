<?php
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$name_Lecture= htmlspecialchars($_POST["name_Lecture"], ENT_QUOTES, "UTF-8");
$degreecourse = htmlspecialchars($_POST["degreecourse"], ENT_QUOTES, "UTF-8");

if (!empty($name_Lecture) && !empty($degreecourse))
{
    $lecturedata =
        [
            "name_lecture" => $name_Lecture,
            "degreecourse" => $degreecourse,
        ];
    
    $lecture= new Lecture($lecturedata);
    $lectureManager = new LectureManager();
    $lecture= $lectureManager->create ($lecture);
    if ($lecture==null) 
    {
        header('Location: Lecture_Index.php');
        die();
    }
}
else {
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}