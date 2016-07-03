<?php
include ("Main/Session_Check.php");
include "Main/ResultManager.php";

$ID_Voting= htmlspecialchars($_POST ['ID_Voting'], ENT_QUOTES, "UTF-8");
$ID_Chance= htmlspecialchars($_POST ['ID_Chance'], ENT_QUOTES, "UTF-8");

$resultManager= new ResultManager();

$datum = date("yyyy-MM-dd");

$ip = $_SERVER['REMOTE_ADDR'];

$daten = [

    "ID_Voting" => $ID_Voting,
    "ID_Chance" => $ID_Chance,
    "date_Result" => $datum,
    "StudentIP" => $ip

];

print_r($daten);

$result = new Result($daten);

print_r($result);

$resultManager->create($result);

echo "Skript fertig, erfolgreich angelegt.";