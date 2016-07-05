<?php
include ("Main/Session_Check.php");
require_once("Main/LectureManager.php");
require_once("Main/LectureVotingManager.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");
/*
 * Werte aus Post holen
 */
$ID_Lecture = htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");

/*
 * neuer Lecturemanager und erstellen des Objekts Lecture durch ID
 */
$lectureManager = new LectureManager();
$lecture= $lectureManager->findById($ID_Lecture);

/*
 * neuer LectureVotingManager und auslesen aller Votings, zur Lecture gehörig
 */
$lecturevotingManager= new LectureVotingManager();
$voting = $lecturevotingManager->findAllVotingByLecture($lecture);

/*
 * neuer Usermanager und erstellen eines Objekts Author durch Objekt Lecture und der darin enthaltenen UserID
 */
$userManager= new UserManager();
$author= $userManager->findById($lecture->ID_User);

//Hackabsicherung über Methode
$user= $_SESSION["user"];

if (!$lectureManager->doesUserOwnThis($user, $lecture))
{

    echo "Sie haben keine Befugnis!";
    die();
}

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
//Darstellung der relevanten Attribute des Objekts Lecture und Author
echo "<h1 class='topic'><a class='bold'>Vorlesung Nr. $ID_Lecture</h1>";
echo "<h3 class='text2'><a class='bold'>Lecture:</a> $lecture->name_Lecture</h3>";
echo "<h3 class='text2'><a class='bold'>Degreecourse:</a> $lecture->degreecourse</h3>";
echo "<h3 class='text2'><a class='bold'>Created by:</a> $author->firstname $author->lastname</h3>";

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
        
        /*
         * Auslesen der zugehörigen Votings zu Lecture
         */
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
//Button zum erstellen von Votings. Weiterleitung zu VotingCreate
echo "</br></br><a href='VotingCreate_form.php?ID_Lecture=$lecture->ID_Lecture'</a><div class='submit'>CREATE VOTING</div></a></br></br>";
echo "<a href='Lecture_index.php'</a><div class='submit'>BACK</div></a>";
?>
</body>
</html>