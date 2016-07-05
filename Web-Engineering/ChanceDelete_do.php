<?php
include ("Main/Session_Check.php");
require_once("Main/Classes.php");
require_once("Main/ChanceManager.php");

$ID_Chance = (int)htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");

/*
 * neuer Chancemanager
 */
$chanceManager = new ChanceManager();
$chance = $chanceManager->findById($ID_Chance);

$user= $_SESSION["user"];

if (!$chanceManager->doesUserOwnThis($user, $chance))
{

    echo "Sie haben keine Befugnis!";
    die();
}

$chanceManager->delete($chance);

header('Location: Chance_Index.php');