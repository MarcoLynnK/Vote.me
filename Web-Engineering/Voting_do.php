<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>User Create</title>
<body>
<?php

//Dieses Skript erzeugt das Auswahl-Ergebnis jedes einzelnen Studenten und Speichert dieses in der DB Result ab.

include ("Main/Session_Check.php");
include "Main/ResultManager.php";
/*
 * Übergabe der Voting ID und der ID der ausgwählten Antwort durch das Form in Voting.php
 */
$ID_Voting= htmlspecialchars($_POST ['ID_Voting'], ENT_QUOTES, "UTF-8");
$ID_Chance= htmlspecialchars($_POST ['ID_Chance'], ENT_QUOTES, "UTF-8");

/*
 * neuer Resultmanager Instanziieren
 */
$resultManager= new ResultManager();

/*
 * Datum in variable schreiben und festlegen
 */
$datum = date("yyyy-MM-dd");

/*
 * Ip-Adresse von Student in Variable schreiben
 */
$ip = $_SERVER['REMOTE_ADDR'];

/*
 * ID von Voting und Chance sowie das Datum und die Ip-Adersse in $daten ablegen
 */
$daten = [

    "ID_Voting" => $ID_Voting,
    "ID_Chance" => $ID_Chance,
    "date_Result" => $datum,
    "StudentIP" => $ip

];

//print_r($daten);

/*
 * Neues Result mit den Daten aus dem Array $daten instanziieren
 */
$result = new Result($daten);

//print_r($result);

/*
 * Erstellen des Results durch die Methode create aus dem Resultmanager
 */
$resultManager->create($result);

echo "<a class='topic'>Thank you.</a><br><br><a class='text2'>You have voted successfully.</a><br>";
?>

<a href="Voting.php"> <div class="submit">BACK</div></a>
</body>
</html>
