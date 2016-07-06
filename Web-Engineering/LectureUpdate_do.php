<?php
include ("Main/Session_Check.php");
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");
?>

<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Lecture Update</title>
<body>

<?php
/*
 * holen der Werte aus Post
 */
$ID_Lecture= (int)htmlspecialchars($_POST ["ID_Lecture"], ENT_QUOTES, "UTF-8");
$name_Lecture= htmlspecialchars($_POST["name_Lecture"], ENT_QUOTES, "UTF-8");
$degreecourse = htmlspecialchars($_POST["degreecourse"], ENT_QUOTES, "UTF-8");

//Absicherung gegen Hack
$lectureManager = new LectureManager();
$lecture = $lectureManager->findById($ID_Lecture);

$user= $_SESSION["user"];

if (!$lectureManager->doesUserOwnThis($user, $lecture))
{

    echo "Sie haben keine Befugnis!";
    die();
}

/*
 * prüfen ob die Variablen (Arrays) befüllt sind
 */
if (!empty($ID_Lecture) && !empty($name_Lecture) && !empty($degreecourse))
{
    /*
     * neuer Lecturemanager
     */
    $lectureManager = new LectureManager();
    $lecture = $lectureManager->findById($ID_Lecture);//holt sich das Voting aus der Datenbank durch Suche nach der ID
    $lecture->ID_Lecture= $ID_Lecture;
    $lecture->name_Lecture= $name_Lecture;
    $lecture->degreecourse= $degreecourse;
    $lectureManager-> update ($lecture);
    header ('Location: Lecture_index.php');
    
}
    
else 
{
    echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
}?>
<a href="LectureUpdate_form.php"> <div class="submit">BACK</div></a>
</body>
</html>