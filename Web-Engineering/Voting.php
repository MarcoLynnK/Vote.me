<?php
include ("Main/Session_Check.php");
require_once ("Main/VotingManager.php");
require_once ("Main/VotingChanceManager.php");
require_once ("Main/Classes.php");

/*
 * Übergabe der VotingID als Integer aus Voting Read
 */
$ID_Voting= (int)htmlspecialchars($_GET ["ID_Voting"], ENT_QUOTES, "UTF-8");

/*
 * Neuer VotingManager zur verwaltung der Voting-ID instanziieren
 */
$votingManager= new VotingManager();

/*
 * Auslesen des zugehörigen Votings durch die Methode findById mit dem Parameter ID_Voting
 * Ablage des entstehenden Votingobjekts in $voting
 */
$voting=$votingManager-> findById($ID_Voting);

/*
 * neuen votingchanceManager Instanziieren
 */
$votingchanceManager= new VotingChanceManager();
$chances=$votingchanceManager->findAllChancesByVotingId($voting);
?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
</head>
<title>Voting</title>
<body>

<!--Navigation Logged-Out-->
<div id="navbar">
    <img src="img/logo2.svg" id="logo">
</div>

<!--Beginn Voting-Bereich-->
<h2>Sie sind Votingteilnehmer: 7 Platzhalter</h2>

<!--Thematik und Frage aus dem Objekt Voting auslesen-->
<h2>Topic: <?php echo ($voting->name_Voting) ?> </h2>
<p>Question: <?php echo ($voting->question_Voting)?></p>

<?php
/*
 * Voting Form zur Interaktion für Studenten
 */

echo '<form class="input-container" action="Voting_do.php" method="post">';
        foreach ($chances as $möglichkeiten)
        {
            $i=0;
            if (!empty ($möglichkeiten))
            {
                $i = $i + 1;
                echo "<p>Möglichkeit $i:</p>";
                echo "<input type='radio' name='ID_Chance' value='$möglichkeiten->ID_Chance'/>$möglichkeiten->description_Chance</br>";
            }
        }
        echo '<input type="hidden" value="' . $voting->ID_Voting . '" name="ID_Voting">';
        echo '<input type="hidden" value="' . $voting->ID_Chance . '" name="ID_Chance">';
echo '<input type="submit" class="submit" value="VOTE">';
echo "</form>"

?> <!--Emre, hier die Form für die antworten verändern, damit nur eine Antwortauswahl möglich is-->

</body>
</html>
