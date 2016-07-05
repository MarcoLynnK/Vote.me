<?php
include ("Main/Session_Check.php");
require_once("Main/LectureManager.php");
require_once("Main/LectureVotingManager.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$ID_Lecture = htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$lectureManager = new LectureManager();
$lecture= $lectureManager->findById($ID_Lecture);

$lecturevotingManager= new LectureVotingManager();
$voting = $lecturevotingManager->findAllVotingByLecture($lecture);

$userManager= new UserManager();
$user= $userManager->findById($lecture->ID_User);
?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>

<title>Lecture Read</title>

<body>
<?php require_once("include/Navbar.php"); ?>


<?php

echo "<h1 class='topic'><a class='bold'>Vorlesung Nr. $ID_Lecture</h1>";
echo "<h3 class='text2'><a class='bold'>Lecture:</a> $lecture->name_Lecture</h3>";
echo "<h3 class='text2'><a class='bold'>Degreecourse:</a> $lecture->degreecourse</h3>";
echo "<h3 class='text2'><a class='bold'>Created by:</a> $user->firstname $user->lastname</h3>";

?>

<div class="container">
    <table>
        <thead>
        <th>Voting Nr.</th>
        <th>Topic</th>
        <th>Settings</th>
        </thead>
        <tbody>
        <?php
        if (count($voting)>0)
        {

            $i=1;
            foreach ($voting as $vorlesungen)
            {
                echo "<tr>";
                echo "<td>Voting $i:</td> <td>$vorlesungen->name_Voting</td>";
                echo "<td>
              <a href='VotingRead.php?ID_Voting=$vorlesungen->ID_Voting'><input type='image' class='editicons' src='img/view.svg'></a>
              <a href='Voting_Delete_do_LectureRead.php?ID_Voting=$vorlesungen->ID_Voting'><input type='image' class='editicons' src='img/trash.svg'></a>
              </td>";
                echo "<tr>";
                $i++;
            }
        }
        ?>

        </tbody>
    </table>
</div>

<?php
echo "</br></br><a href='VotingCreate_form.php?ID_Lecture=$lecture->ID_Lecture'</a><div class='submit'>CREATE VOTING</div></a></br></br>";
echo "<a href='Lecture_index.php'</a><div class='submit'>BACK</div></a>";
?>
</body>
</html>