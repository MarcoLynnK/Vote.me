<?php

require_once("Main/VotingManager.php");
require_once("Main/Classes.php");

$Chance1= (int)htmlspecialchars ($_POST ["Chance1"], ENT_QUOTES, "UTF-8");
$Chance2= (int)htmlspecialchars ($_POST ["Chance2"], ENT_QUOTES, "UTF-8");
$Chance3= (int)htmlspecialchars ($_POST ["Chance3"], ENT_QUOTES, "UTF-8");
$Chance4= (int)htmlspecialchars ($_POST ["Chance4"], ENT_QUOTES, "UTF-8");

$countChance1= &$Chance1;
$countChance2= &$Chance2;
$countChance3= &$Chance3;
$countChance4= &$Chance4;


if (!empty($countChance1) or !empty($countChance2) or !empty($countChance3) or !empty($countChance4))
{
    $votingManager = new VotingManager();
    $result = $votingManager-> createResult ($result);
    if ($result==null) {
        header('Location: Thankyou.php');
        die();
    }
}
else
{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}