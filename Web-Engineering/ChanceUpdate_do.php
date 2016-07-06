<?php
include ("Main/Session_Check.php");
require_once("Main/ChanceManager.php");
require_once("Main/Classes.php");
/*
 * übergebene daten aus Post holen
 */
$ID_Chance= htmlspecialchars($_POST["ID_Chance"], ENT_QUOTES, "UTF-8");
$description_Chance= htmlspecialchars($_POST["description_Chance"], ENT_QUOTES, "UTF-8");

/*
 * Absicherung gegen Hack
 */
$chanceManager = new ChanceManager();
$chance = $chanceManager->findById($ID_Chance);

$user= $_SESSION["user"];

if (!$chanceManager->doesUserOwnThis($user, $chance))
{

    echo "Sie haben keine Befugnis!";
    die();
}
/*
 * überprüfen der Variablen, ob diese befüllt sind 
 */
if (!empty ($ID_Chance) && !empty($description_Chance))
{
    /*
     * neuer Chancemanager
     */
    $chanceManager = new ChanceManager();
    
    
    /*
     * holt sich die Möglichkeit aus der Datenbank durch Suche nach der ID
     */
    $chance = $chanceManager->findById($ID_Chance);
    $chance->description_Chance = $description_Chance;
    
    /*
     * Update des Objektes Chance mit beinhalteten Werten
     */
    $chanceManager-> update ($chance);
   
    
    
    header ('Location: Chance_Index.php');
    
    
}
else
{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}
