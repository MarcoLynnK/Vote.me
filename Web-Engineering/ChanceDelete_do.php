<?php
include ("Main/Session_Check.php");
require_once("Main/Classes.php");
require_once("Main/ChanceManager.php");

$ID_Chance = (int)htmlspecialchars($_GET["ID_Chance"], ENT_QUOTES, "UTF-8");

/*
 * neuer Chancemanager
 */
$chanceManager = new ChanceManager();

/*
 * Auslesen der Antwortmöglichkeit durch ID_Chance
 */
$chance = $chanceManager->findById($ID_Chance);

//Absicherung gegen Hack
$user= $_SESSION["user"];

/*
 * Prüfen des Zugriffs über Methode doesUserOwnthis mit den Parametern User aus der Session und dem objekt Chance
 */
if (!$chanceManager->doesUserOwnThis($user, $chance))
{

    echo "Sie haben keine Befugnis!";
    die();
}

/*
 * Löschen des Objekts Chance aus der DB
 */
$chanceManager->delete($chance);

header('Location: Chance_Index.php');