<?php
require_once ("Main/ChanceManager.php");
require_once ("Main/Classes.php");
$ID_Chance = (int)htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");
$ChanceManager = new ChanceManager();
$chance = $ChanceManager->findById($ID_Chance);
?>

<!DOCTYPE html>
<html>
<head>
    <?php include("include/NavbarUser.php") ?>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
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
<a>Votingoption # <?php echo ($chance->ID_Chance) ?></a>

<form action='ChanceUpdate_do.php' method='post'>
    <input class="inputForm" type='hidden' name='ID_Chance' value='<?php echo ($chance->ID_Chance) ?>' />
    Beschreibung der Auswahlmöglichkeit:<br>
    <input class="inputForm" type='text' name='description_Chance' value='<?php echo ($chance->description_Chance) ?>' /> <br>
    <input class="submit" type='submit' value='aktualisieren' />
</form>


</body>
</html>