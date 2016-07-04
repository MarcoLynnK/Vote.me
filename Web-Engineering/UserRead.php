<?php
//Dieses Skript 
include ("Main/Session_Check.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$ID_User= htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");
$userManager= new UserManager();
$user = $userManager->findById($ID_User);
?>

<!DOCTYPE html>
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
    echo "<h2>Dozent $ID_User:</h2>";
    echo "<h1 class='topic'><a class='bold'>Username:</a> $user->login</h1>";
    echo "<h3 class='text2'><a class='bold'>Firstname:</a> $user->firstname</h3>";
    echo "<h3 class='text2'><a class='bold'>Lastname:</a> $user->lastname</h3>";
    echo "<h3 class='text2'><a class='bold'>E-mail:</a> $user->email</h3>";
    echo "<h3 class='text2'><a class='bold'>Password:</a> $user->hash</h3>";
    echo "<h3 class='text2'><a class='bold'>Rights:</a> $user->ID_Rights</h3>";
    ?>
</body>
</html>