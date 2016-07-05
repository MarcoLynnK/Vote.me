<?php
include ("Main/Session_Check.php");
require_once ("Main/VotingManager.php");
require_once ("Main/Classes.php");

$ID_Voting = (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($ID_Voting);

?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Voting Update</title>
<body>
<?php require_once("include/Navbar.php"); ?>

<center><a class="topic">Voting No. <?php echo ($voting->ID_Voting) ?></a></center>

<form action='VotingUpdate_do.php' method='post'>
    <input class="inputForm" type='hidden' name='ID_Voting' value='<?php echo ($voting->ID_Voting) ?>' /></br></br>
    <input class="inputForm" type='text' name='name_Voting' value='<?php echo ($voting->name_Voting) ?>' placeholder="Topic" /></br></br>
    <input class="inputForm" type='text' name='question_Voting' value='<?php echo ($voting->question_Voting) ?>' placeholder="Question" /></br></br>
    <input type="submit" class="submit" value="submit" value="CREATE">
</form>

</body>
</html>