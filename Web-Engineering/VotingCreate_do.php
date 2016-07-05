<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Voting Create</title>
<body>
<?php require_once("include/Navbar.php"); ?>

<?php
include ("Main/Session_Check.php");
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$name_Voting= htmlspecialchars($_POST["name_Voting"], ENT_QUOTES, "UTF-8");
$question_Voting = htmlspecialchars($_POST["question_Voting"], ENT_QUOTES, "UTF-8");

$lectureId = htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");

$user = $_SESSION['user'];
$ID_User = $user->ID_User;

if (!empty($name_Voting) && !empty($question_Voting))
{
    
    $daten = [
        
        "ID_Lecture" => $lectureId,
        "ID_User" => $ID_User,
        "name_Voting" => $name_Voting,
        "question_Voting" => $question_Voting,
        "Status" => false
        
    ];
    
    // Votingobjekt machen
    $voting= new Voting($daten);
    
    $votingManager = new VotingManager();
    $votingManager->create($voting); //holt sich das Voting aus der Datenbank durch Suche nach der ID
    
    // und zurück zur Ursprungsvorlesung
    header("Location: LectureRead.php?ID_Lecture=".$lectureId);
    
    
}
else{
    echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
}; ?>
<a href="VotingCreate_form.php"> <div class="submit">BACK</div></a>
</body>
</html>