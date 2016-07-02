<!DOCTYPE html>
<html>
<head>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>

</head>
<body>

<?php require_once("include/HeadUser.php") ?>



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

    <form class="input-container" action="VotingCreate_do.php" method="post">
        <input class="inputForm" name="name_Voting" type="text" placeholder="Votingname" rows="2"></br></br>
        <input class="inputForm" name="question_Voting" type="text" placeholder="Frage?" rows="2"></br></br>
        <?php echo "<option value='$lecture->ID_Lecture'></option>"?>
        <button class="submit" name="submit">CREATE VOTING</button></br></br>
    </form>
    
</div>

</body>

</html>