<?php
include ("Main/Session_Check.php");
require_once ("Main/ChanceManager.php");
require_once ("Main/Classes.php");
/*
 * Werte aus Post holen
 */
$ID_Chance = (int)htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");

/*
 * neuer Chancemanager
 */
$ChanceManager = new ChanceManager();

/*
 * Auslesen der Werte für Objekt Chance durch ID und Methode findById
 */
$chance = $ChanceManager->findById($ID_Chance);

?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Chance Update</title>
<body>

<!--Navigation-->
<?php require_once("include/Navbar.php"); ?>

<!--Formular für ChanceUpdate-->
<a class="text2">Chance No. <?php echo ($chance->ID_Chance) ?></a>

<form action='ChanceUpdate_do.php' method='post'>
    <input class="inputForm" type='hidden' name='ID_Chance' value='<?php echo ($chance->ID_Chance) ?>' /><br>
    <input class="inputForm" type='text' name='description_Chance' value='<?php echo ($chance->description_Chance) ?>' /> <br><br>
    <input class="submit" type='submit' value='UPDATE' />
</form>


</body>
</html>