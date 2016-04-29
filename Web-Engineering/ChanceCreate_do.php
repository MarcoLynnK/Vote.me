<?php
require_once("Main/ChanceManager.php");
require_once("Main/Classes.php");

$description_Chance= htmlspecialchars($_POST["description_Chance"], ENT_QUOTES, "UTF-8");

if (!empty($description_Chance))
{
    $chanceManager = new ChanceManager();
    $chance= $chanceManager->create ($chance);
    if ($lecture==null) {
        header('Location: login.php');
        die();
    }
}
else {
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}