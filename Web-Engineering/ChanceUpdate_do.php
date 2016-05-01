<?php
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Chance= htmlspecialchars($_POST["ID_Chance"], ENT_QUOTES, "UTF-8");
$description_Chance= htmlspecialchars($_POST["description_Chance"], ENT_QUOTES, "UTF-8");

    if (!empty ($ID_Chance) && !empty($description_Chance))
    {
        $chanceManager = new ChanceManager();
        $chance = $chanceManager->findById($ID_Chance);//holt sich die Möglichkeit aus der Datenbank durch Suche nach der ID
        $chance->description_Chance= $description_Chance;
        $chanceManager-> update ($chance);
        header ('Location: index.php');

        if ($chance==null)
        {
            header('Location: login.php');
            die();
        }
    }

    else
    {
        echo "Error: Bitte füllen sie alle Felder aus!<br/>";
    }

