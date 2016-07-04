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
require_once("Main/ChanceManager.php");
require_once("Main/Classes.php");

$description_Chance= htmlspecialchars($_POST["description_Chance"], ENT_QUOTES, "UTF-8");
$ID_Voting= htmlspecialchars($_POST["ID_Voting"], ENT_QUOTES,"UTF-8");

$user = $_SESSION["user"];
$userId = $user->ID_User;

if (!empty($description_Chance) && !empty($ID_Voting)) 
{
    $chancedata =
        [
            "description_Chance" => $description_Chance,
            "ID_Voting" => $ID_Voting,
            "ID_User"=> $userId,
        ];

    $chance = new Chance($chancedata);
    
    echo "test <br>"; print_r($chance);
    
    $chanceManager = new ChanceManager();
    $chance = $chanceManager->create($chance);
    header('location: Voting_Index.php');
    
   // ehem. Debugging echo "<br> chancedata, chance:"; print_r($chancedata); print ","; print_r($chance);
    
}   
else
{
    echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
};?>

<a href="ChanceCreateform.php"> <div class="submit">BACK</div></a>
</body>
</html>