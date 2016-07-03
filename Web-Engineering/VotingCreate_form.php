<?php include ("Main/Session_Check.php");?>
<!DOCTYPE html>
<html>
<head>
    <?php require_once("include/NavbarUser.php") ?>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Sign up</title>

    <!--Navigation-->
    <div id="navbar">

        <img src="img/logo2.svg" id="logo">

        <div class="menu"><img src="img/sw_menu.png" id="menu"></div>

        <div class="dropdown">
            <button class="dropbtn">MENU</button>
            <div class="dropdown-content">
                <a href="#">VOTING LIST</a>
                <a href="#">CREATE VOTING</a>
            </div>
        </div>

        <a href="log-out.html" style="text-decoration: none;">
            <button class="log-out" name="LogOut">LOG OUT</button>
        </a>

    </div>

</head>
<body>
<?php
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Lecture= htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");

if (!empty($ID_Lecture) && !empty($name_Lecture) && !empty($degreecourse))
{
$lectureManager = new LectureManager();
$lecture = $LectureManager->findById($ID_Lecture);//holt sich das Voting aus der Datenbank durch Suche nach der ID
if ($lecture==null)
{
header('Location: Chance_Index.php');
die();
}
return $lecture;
}
?>
<div id="Container">

    <form class="input-container" action="VotingCreate_do.php?ID_Lecture=<?php print $ID_Lecture; ?>" method="post">
        <input class="inputForm" name="name_Voting" type="text" placeholder="Votingname" rows="2"></br></br>
        <input class="inputForm" name="question_Voting" type="text" placeholder="Frage?" rows="2"></br></br>
        <?php echo "<option value='$lecture->ID_Lecture'></option>"?>
        <button class="submit" name="submit">CREATE VOTING</button></br></br>
    </form>
    
</div>

</body>

</html>