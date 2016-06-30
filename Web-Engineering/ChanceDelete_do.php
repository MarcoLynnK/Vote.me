<?php include("include/session_check.php"); ?>

<?php
require_once("Main/Classes.php");
require_once("Main/ChanceManager.php");

$ID_Chance = (int)htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");

$chanceManager = new ChanceManager();
$chance = $chanceManager->findById($ID_Chance);
$chanceManager->delete($chance);

header('Location: Chance_Index.php');