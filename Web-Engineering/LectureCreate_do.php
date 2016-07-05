<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>
<?php require_once("include/Navbar.php"); ?>

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
    
    //header('Location: Lecture_index.php');
}
else 
{
    echo "Lecture Name:";
    print ($name_Lecture);
    echo "Studiengang;"
    print ($degreecourse);
    print_r ($user);
    echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
}; ?>
<a href="LectureCreate_form.php"> <div class="submit">BACK</div></a>
</body>
</html>
