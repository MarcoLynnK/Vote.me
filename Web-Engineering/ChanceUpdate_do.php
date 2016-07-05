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
 * überprüfen der Variablen, ob diese befüllt sind 
 */
if (!empty ($ID_Chance) && !empty($description_Chance))
{
    /*
     * neuer Chancemanager
     */
    $chanceManager = new ChanceManager();
    $chance = $chanceManager->findById($ID_Chance);//holt sich die Möglichkeit aus der Datenbank durch Suche nach der ID
    
    $chance->description_Chance = $description_Chance;
    $chanceManager-> update ($chance);
   
    
    
    header ('Location: Chance_Index.php');
    
    
}
else
{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}
