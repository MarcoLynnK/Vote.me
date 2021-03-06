<?php
/*
 * Dieses Skript liest dein Voting mit allen dazugehörien Antwortmöglichkeiten und der dazugehörigen Vorlesung aus.
 * Sicht auf ein einzelnes Voting, ausgewählt aus Voting_index
 */
include ("Main/Session_Check.php");
require_once("Main/VotingManager.php");
require_once("Main/VotingChanceManager.php");
require_once("Main/LectureManager.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

//Übergabe der VotingID aus Voting Index
$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

/*
 * Neuer Votingmanager
 */
$votingManager= new VotingManager();
/*
 * Ausgabe des Votings anhand der übergebenen VotingID durch methode findById
 */
$voting= $votingManager->findById($ID_Voting);


/*
 * neuer VotingChanceManager
 */
$votingchanceManager= new VotingChanceManager();
/*
 * Ausgabe aller Möglichkeiten durch Methode findAllChancesByVotingId
 */
$chance= $votingchanceManager->findAllChancesByVotingId($voting); //vllt. findAllChancesByVotingId ($voting->ID_Voting)??


/*
 * Neuer LectureManager
 */
$lectureManager= new LectureManager();
/*
 * Ausgabe aller Möglichkeiten durch Methode findAllChancesByVotingId
 */
$lecture= $lectureManager->findById($voting->ID_Lecture);

/*
 * neuer Usermanager
 */
$userManager= new UserManager();
/*
 * Ausgabe des Users durch UserID im Objekt Voting
 */

// authenizieren block
$user= $_SESSION["user"];

// User rauswerfen wenn unauthorisiert
if (!$votingManager->doesUserOwnThis($user, $voting)) {

    echo "Sie haben keine Befugnis!";
    die();

}

$author = $userManager->findById($voting->ID_User);


?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>

<title>Voting Read</title>


<body>
<!--Navigation-->
<?php require_once("include/Navbar.php"); ?>

<!--Ausgabe der Datensätze erhalten durch die Manager (Lecture/Voting/VotingChance)-->
<div class="Content">
<?php
    echo "<a class='topic'>Lecture $lecture->name_Lecture</a></br>";
    echo "<a class='topic'>Voting No. $voting->ID_Voting</a></br></br>";
    echo "<a class='text2'>Topic: $voting->name_Voting</a></br>";
    echo "<a class='text2'>Question: $voting->question_Voting</a><br>";
    //Ausgabe User mit vor und Nachnahme
    echo "<a class='text2'>Created by: $author->firstname $author->lastname</a>";
?>

<div class="container">
    <table>
        <thead>
        <th>Answer Nr.</th>
        <th>Answer</th>
        </thead>
        <tbody>
    <?php
        //Ausgabe der zugehörigen Möglichkeiten zum Voting mit Nummer, je nach Anzahl.
        if (count($chance)>0)
        {
            $i=1;
            foreach ($chance as $möglichkeiten)
            {
                echo "<tr><td>Antwort $i:</td><td><a> $möglichkeiten->description_Chance</a></td></tr></br>";
                $i=$i+1;
            }
        }
    ?>
        </tbody>
    </table></br></br>
</div>

<!--Buttons für weitere Navigation-->
<div class="container">
<?php
echo "<a href='LectureRead.php?ID_Lecture=$voting->ID_Lecture'><div class='submit'>SHOW LECTURE</div></a></br></br>";
echo "<a href='Voting.php?ID_Voting=$voting->ID_Voting'><div class='submit'>CHECK VOTING</div></a></br></br>";
echo "<a href='OpenVote.php?ID_Voting=$voting->ID_Voting'><div class='submit'>OPEN VOTE</div></a><br><br>";
echo "<a href='CloseVote.php?ID_Voting=$voting->ID_Voting'><div class='submit'>CLOSE VOTE</div></a><br><br>";
echo "<a href='VotingResult.php?ID_Voting=$voting->ID_Voting'><div class='submit'>SHOW RESULT</div></a><br><br>";
echo "<a href='Voting_Index.php'><div class='submit'>BACK</div></a>";
//echo "<button class='platzhalter'> </button>";-->
?>
</div>
</div>
<!--Platzhalter--><a class="Platzhalter"> </a>
<!--zweiter footer<div class="footer">© 2016 by Vote.me GmbH - <a href="mailto:support@vote.me">Contact</a> - <a href="impressum.php">Impressum</a></div>-->
</body>
<footer>
    <div>© 2016 by Vote.me GmbH - <a href="mailto:support@vote.me">Contact</a> - <a href="impressum.php">Impressum</a></div>
</footer>
</html>