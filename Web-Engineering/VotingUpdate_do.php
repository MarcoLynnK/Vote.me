<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>
<?php require_once("include/Navbar.php"); ?>

<?php
include ("Main/Session_Check.php");
require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$ID_Voting= (int)htmlspecialchars($_POST ["ID_Voting"], ENT_QUOTES, "UTF-8");
$name_Voting= htmlspecialchars($_POST["name_Voting"], ENT_QUOTES, "UTF-8");
$question_Voting = htmlspecialchars($_POST["question_Voting"], ENT_QUOTES, "UTF-8");


if (!empty ($ID_Voting) && !empty($name_Voting) && !empty($question_Voting))
{
    $votingManager = new VotingManager();
    $voting = $votingManager->findById($ID_Voting);//holt sich das Voting aus der Datenbank durch Suche nach der ID
    $voting->name_Voting= $name_Voting;
    $voting->question_Voting= $question_Voting;
    $votingManager-> update ($voting);//Update der Datensätze in der DB anhand der Voting ID
    //header ('Location: Voting_Index.php');

    if ($voting==null)
    {
        header('Location: login.php');
        die();
    }
}

else 
{
    echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
};

?>
<a href="VotingUpdate_form.php"> <div class="submit">BACK</div></a>
</body>
</html>
