<?php
include ("Main/Session_Check.php");
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$name_Lecture= htmlspecialchars($_POST["name_Lecture"], ENT_QUOTES, "UTF-8");
$degreecourse = htmlspecialchars($_POST["degreecourse"], ENT_QUOTES, "UTF-8");

$user = $_SESSION["user"];

if (!empty($name_Lecture) && !empty($degreecourse))
{
    $lecturedata =
        [
            "name_Lecture" => $name_Lecture,
            "degreecourse" => $degreecourse,
            "ID_User" => $user->ID_User
        ];

    $lecture= new Lecture($lecturedata);
    $lectureManager = new LectureManager();
    $lecture = $lectureManager->create($lecture);
    
    print_r($user);
    print_r($lecture);
    
    
    header('Location: Lecture_index.php');
}
else 
{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}