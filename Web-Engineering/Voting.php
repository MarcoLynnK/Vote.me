<?php
include ("Main/Session_Check.php");
require_once ("Main/VotingManager.php");
require_once ("Main/VotingChanceManager.php");
require_once ("Main/Classes.php");

$result = new Result();


$ID_Voting= (int)htmlspecialchars($_GET ["ID_Voting"], ENT_QUOTES, "UTF-8");
$votingManager= new VotingManager();
$voting=$votingManager-> findById($ID_Voting);

$votingchanceManager= new VotingChanceManager();
$chance=$votingchanceManager->findAllChancesByVotingId($voting);
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
    <div id="navbar">
        <img src="img/logo2.svg" id="logo">
    </div>
</head>
<title>User Update</title>
<body>

<h2>Sie sind Votingteilnehmer: 7 Platzhalter</h2>
<h2>Topic: <?php echo ($voting->name_Voting) ?> </h2>
<p>Question: <?php echo ($voting->question_Voting)?></p>

<?php



/**
echo '<form class="input-container" action="VotingResult_do.php" method="post">';
        foreach ($chance as $möglichkeiten)
        {
            $i=1;
            if (!empty ($möglichkeiten))
            {
                $i = $i + 1;
                echo "<p>Möglichkeit $i:</p>";
                echo "<input type='checkbox' name='ID_Chance' value='$möglichkeiten->ID_Chance'/>$möglichkeiten->description_Chance</br>";
            }
        }
        echo '<input type="hidden" value="' . $voting->ID_Voting . '" name="ID_Voting">';
        echo '<input type="hidden" value="' . $chance->ID_Chance . '" name="ID_Chance">';
        echo '<input type="hidden" value="' . $_SESSION ['ID_Session'] . '" name="ID_Session';
echo '<input type="submit" class="submit" value="VOTE">';
echo "</form>"

 */ ?>

<form action="Voting_do.php" method="post">
    ID_Voting<br>
    <input type="text" name="ID_Voting">
    <br>
    ID_Chance<br>
    <input type="text" name="ID_Chance">
    <br><br>
    <input type="submit" value="Absenden">
</form>





</body>
</html>
