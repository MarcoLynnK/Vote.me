<?php
include ("Main/Session_Check.php");
require_once("Main/Classes.php");
require_once("Main/LectureManager.php");
/*
 * ID aus Post holen
 */
$ID_Lecture = (int)htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");

/*
 * neuer Lecturemanager
 */
$lectureManager = new LectureManager();

/*
 * Erstellen des Objekts Lecture durch Methode mit ID
 */
$lecture = $lectureManager->findById($ID_Lecture);

$user= $_SESSION["user"];

/*
 * Check der Rechte ob der User eine Löschberechtigung hat
 */
if (!$lectureManager->doesUserOwnThis($user, $lecture))
{

    echo "Sie haben keine Befugnis!";
    die();
}

/*
 * löschen des Datensatzes aus der DB
 */
$lectureManager->delete($lecture);



header('Location: Lecture_index.php');