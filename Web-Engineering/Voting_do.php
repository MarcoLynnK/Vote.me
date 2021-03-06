<?php
//Dieses Skript erzeugt das Auswahl-Ergebnis jedes einzelnen Studenten und Speichert dieses in der DB Result ab.

include "Main/ResultManager.php";
/*
 * Übergabe der Voting ID und der ID der ausgwählten Antwort durch das Form in Voting.php
 */
$ID_Voting= htmlspecialchars($_POST ['ID_Voting'], ENT_QUOTES, "UTF-8");
$ID_Chance= htmlspecialchars($_POST ['ID_Chance'], ENT_QUOTES, "UTF-8");

// Cookie setzen, dass schon abgestimmt wurde.
// Array initialisieren
$daten = array();

// Evtl. existiert Cookie schon
if (isset($_COOKIE["voteme"])) {

    $daten = unserialize($_COOKIE["voteme"]);

}

// Datensatz anhängen
$daten[$ID_Voting] = true;

// zurück in den Cookie mit dem Zeug
setcookie("voteme", serialize($daten));

?>

<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Voting</title>
<body>
<div id="navbar">
    <img src="img/logo2.svg" id="logo">
</div>

<?php



// DEBUG
// echo "<BR> POST: "; print_r($_POST);

/*
 * neuer Resultmanager Instanziieren
 */
$resultManager= new ResultManager();

/*
 * Datum in variable schreiben und festlegen
 */
$datum = date("Y-m-d");

/*
 * Ip-Adresse von Student in Variable schreiben
 */


/*
 * ID von Voting und Chance sowie das Datum und die Ip-Adersse in $daten ablegen
 */

$daten = 
        [

        "ID_Voting" => $ID_Voting,
        "ID_Chance" => $ID_Chance,
        "date_Result" => $datum

        ];

// echo "<br> daten:"; print_r($daten);

    /*
     * Neues Result mit den Daten aus dem Array $daten instanziieren
     */
    $result = new Result($daten);


    //print_r($result); für debugging
//print_r($result);

    /*
     * Erstellen des Results durch die Methode create aus dem Resultmanager
     */
    $resultManager->create($result);







    echo "<a class='topic'>Thank you for voting.</a><br>";

?>

</body>

<footer>
    <div>
        <p>© 2016 by Vote.me GmbH - <a href="mailto:support@vote.me">Contact</a> - <a href="impressum.php">Impressum</a></p>
    </div>
</footer>

</html>
