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
<title>Voting Create</title>
<body>
<?php
require_once("include/Navbar.php");

$ID_Voting= htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");


$votingManager = new VotingManager();
$voting = $votingManager->findById($ID_Voting);//holt sich das Voting aus der Datenbank durch Suche nach der ID

?>


<form class="input-container" action="ChanceCreate_do.php?ID_Voting=<?php print $ID_Voting; ?>" method="post">
    <input class="inputForm" name="chance1" type="text" placeholder="Answer"><br><br>
    <input class="inputForm" name="chance2" type="text" placeholder="Answer"><br><br>
    <input class="inputForm" name="chance3" type="text" placeholder="Answer"><br><br>
    <input class="inputForm" name="chance4" type="text" placeholder="Answer"><br><br>
    <button class="submit" name="submit">CREATE VOTING</button><br><br>
</form>
</body>