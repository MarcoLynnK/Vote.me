<!DOCTYPE html>
<html>
<head>
    <?php
    require_once("include/HeadUser.php");
    ?>
</head>

<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<body>
<?php
/*
require_once("Main/Classes.php");
require_once("Main/UserManager.php");

$ID_User = htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");
*/
?>

<h1>Sie sind im Begriff, einen User zu löschen.</h1><br>
<h2>Wollen sie den User wirklich löschen?</h2>
<br><br>
<a href="UserDelete_do.php">Ja</a><br><br>
<a href="User_Index.php">Nein</a>

</body>