<?php
require_once ("Main/VotingManager.php");
require_once ("Main/VotingChanceManager.php");
require_once ("Main/Classes.php");

$result= new Result();

session_start();
session_id($ID_Session);
//hier noch session fertig schreiben

$ID_Voting= (int)htmlspecialchars($_GET ["ID_Voting"], ENT_QUOTES, "UTF-8");
$votingManager= new VotingManager();
$voting=$votingManager-> findById($ID_Voting);

$votingchanceManager= new VotingChanceManager();
$chance=$votingchanceManager->findAllChancesByVoting($voting);
?>

<!DOCTYPE html>
<html>
<head>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>

</head>
<title>User Update</title>
<body>


<?php require_once("include/HeadUser.php") ?>


<h2>Sie sind Votingteilnehmer: <?php echo "($_SESSION ['ID_Session']"?></h2>
<h2>Voting # <?php echo ($voting->name_Voting) ?> </h2>
<p>Frage: <?php echo ($voting->question_Voting)?></p>

<?php
echo '<form class="input-container" action="Result_do.php" method="post">';
        foreach ($chance as $möglichkeiten)
        {
            $i=1;
            if (!empty ($möglichkeiten))
            {
                $i = $i + 1;
                echo "<p>Möglichkeit $i:</p>";
                echo "<input type='checkbox' name='ID_Chance' value='$möglichkeiten->ID_Chance'/>'$möglichkeiten->description_Chance'</br>";
            }
        }
        echo '<input type="hidden" value="' . $voting->ID_Voting . '" name="ID_Voting">';
        echo '<input type="hidden" value="' . $chance->ID_Chance . '" name="ID_Chance">';
        echo '<input type="hidden" value="' . $_SESSION ['ID_Session'] . '" name="ID_Session';
echo '<input type="submit" class="submit" value="VOTE">';
echo "</form>"?>

</body>
</html>
