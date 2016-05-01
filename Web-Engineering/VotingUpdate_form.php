<?php
require_once ("Main/VotingManager.php");
require_once ("Main/Classes.php");

$ID_Voting = (int)htmlspecialchars($_GET["ID_Voting"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$voting = $VotingManager->findById($ID_Voting);

?>

<!DOCTYPE html>
<html>
<head>

<?php include("include/header.php"); ?>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>
<img src="pic/bg.jpg" id="bg" alt="">

<div id="navbar">

    <img src="pic/logo2.svg" id="logo">

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="#">VOTINGS</a>
            <a href="#">SETTINGS</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>

<a>Eintrag # <?php echo ($voting->ID_Voting) ?></a>

<form action='LectureUpdate_do.php' method='post'>
    <input class="inputForm" type='hidden' name='ID_Voting' value='<?php echo ($voting->ID_Voting) ?>' />
    Thema des Votings:<br>
    <input class="inputForm" type='text' name='name_Voting' value='<?php echo ($voting->name_Voting) ?>' placeholder="Thema" /><br>
    Frage:
    <input class="inputForm" type='text' name='question_Voting' value='<?php echo ($voting->question_Voting) ?>' placeholder="Frage" /><br>
    <input class="submit" type='submit' value='aktualisieren' />
</form>

</body>
</html>