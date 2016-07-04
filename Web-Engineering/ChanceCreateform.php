<?php
include ("Main/Session_Check.php");
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");
?>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>

<body>
<?php
require_once("include/Navbar.php");

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");

$votingManager = new VotingManager();
$voting = $votingManager->findById($ID_Voting);//holt sich das Voting aus der Datenbank durch Suche nach der ID

?>

<h1 class="topic"> Neue Möglichkeit anlegen:</h1>

<form action="ChanceCreate_do.php" method="post"><a class="text2"> New Chance: </a><br>
    <input class="inputForm" type='text' name='ID_Voting' value='<?php echo ($voting->ID_Voting) ?>' hidden><br><br>
    <input class="inputForm" type="text" name="description_Chance" placeholder="Beschreibung"><br><br>
    <a href="LectureCreate_do.php"> <div class="submit">CREATE</div></a>
    </form>
</body>