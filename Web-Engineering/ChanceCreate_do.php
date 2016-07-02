<?php
require_once("Main/ChanceManager.php");
require_once("Main/Classes.php");

$description_Chance= htmlspecialchars($_POST["description_Chance"], ENT_QUOTES, "UTF-8");
$ID_Voting= htmlspecialchars($_POST["ID_Voting"], ENT_QUOTES,"UTF-8");

if (!empty($description_Chance) && !empty($ID_Voting)) 
{
    $chancedata =
        [
            "description_Chance" => $description_Chance,
            "ID_Voting" => $ID_Voting
        ];

    $chance = new Chance($chancedata);
    $chanceManager = new ChanceManager();
    $chance = $chanceManager->create($chance);
    header('location: Voting_Index.php');
}   
else
{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}
