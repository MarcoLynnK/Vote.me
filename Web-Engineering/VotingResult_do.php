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

$Chance1= (int)htmlspecialchars ($_POST ["Chance1"], ENT_QUOTES, "UTF-8");
$Chance2= (int)htmlspecialchars ($_POST ["Chance2"], ENT_QUOTES, "UTF-8");
$Chance3= (int)htmlspecialchars ($_POST ["Chance3"], ENT_QUOTES, "UTF-8");
$Chance4= (int)htmlspecialchars ($_POST ["Chance4"], ENT_QUOTES, "UTF-8");

$countChance1= &$Chance1;
$countChance2= &$Chance2;
$countChance3= &$Chance3;
$countChance4= &$Chance4;


if (!empty($countChance1) or !empty($countChance2) or !empty($countChance3) or !empty($countChance4))
{
    $votingManager = new VotingManager();
    $result = $votingManager-> createResult ($result);
    if ($result==null) {
        header('Location: Thankyou.php');
        die();
    }
}
else
{
    echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
};?>
<a href="Voting.php"> <div class="submit">BACK</div></a>
</body>
</html>