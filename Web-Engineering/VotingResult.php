<?php 
include ("Main/Session_Check.php");
include ("Main/VotingManager.php");
require_once ("Main/VotingChanceManager.php");

// GET ID_Voting erstmal test nur, nachher durch ordentliche Anbindung ersetzen
$ID_Voting = htmlspecialchars($_GET["ID_Voting"],ENT_QUOTES,"UTF-8");

/*
 * Neuer VotingManager
 */
$votingManager= new VotingManager();
$voting= $votingManager->findById($ID_Voting);

/*
 * 
 */
$votingChanceManager = new VotingChanceManager();

$chances = $votingChanceManager->findAllChancesByVotingId($voting); // im Votingmanager ein objekt $voting, hier ein int...wie umwandeln?

$daten = [0, 0, 0, 0];
$descriptions= ["","","",""];
$i = 0;

//einzelne Counts ausgeben, um sie in das chart einzufügen. Zugriff auf Daten durch Index
foreach ($chances as $oneChance) {
	//anhand der Chance_ID
	$chanceid = $oneChance->ID_Chance;
	$count = $votingChanceManager->countVotingChance($ID_Voting, $chanceid);
	$daten[$i] = $count;
	//einlesen der Beschreibung
	$descriptions[$i]=$oneChance->description_Chance;
	$i++;

}



?>
<!DOCTYPE html>

<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


	<script type="text/javascript" src="js/jquery-1.12.3.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Voting Result</title>
<body>
<?php require_once("include/Navbar.php"); ?>


<!-- Doughnut chart canvas element -->

<div class="chart">
	<canvas id="chart" width="400" height="400"></canvas>

	<script>

		// Doughnut Chart Daten
		var doughnutData = [
			{
				value: <?php print $daten[0] ?>,
				color:"#ffaf72"
			},
			{
				value : <?php print $daten[1] ?>,
				color : "#91efbb"
			},
			{
				value : <?php print $daten[2] ?>,
				color : "#e4a3ff"
			},
			{
				value : <?php print $daten[3] ?>,
				color : "#8ea7ff"
			}
		];
		// Doughnut Chart Optionen
		var doughnutOptions = {
			segmentShowStroke : false,
			animateScale : true
		}
		// get Doughnut Chart Canvas
		var chart= document.getElementById("chart").getContext("2d");
		//  Draw Doughnut chart
		new Chart(chart).Doughnut(doughnutData, doughnutOptions);

	</script>
</div>


<!-- Responsive -->
<div class="chart-responsive">
	<canvas id="chart2" width="250" height="250"></canvas>

	<script>

		// Doughnut Chart Daten: Beschreibung der Antwortmöglichkeiten
		var doughnutData = [
			{
				value: <?php print $daten[0]?>,
				color:"#ffaf72"
			},
			{
				value : <?php print $daten[1]?>,
				color : "#91efbb"
			},
			{
				value : <?php print $daten[2]?>,
				color : "#e4a3ff"
			},
			{
				value : <?php print $daten[3]?>,
				color : "#8ea7ff"
			}
		];
		
		// Doughnut Chart Optionen
		var doughnutOptions = {
			segmentShowStroke : false,
			animateScale : true
		}
		// get Doughnut Chart Canvas
		var chart2= document.getElementById("chart2").getContext("2d");
		//  Draw Doughnut chart
		new Chart(chart2).Doughnut(doughnutData, doughnutOptions);

	</script>
</div>



<div class="werte">
<table>
	<tr>
	<td class="wert1"></td>
	<td class="wertetext"><?php echo $descriptions[0]?></td>
</tr>
	<tr>
	<td class="wert2"></td>
	<td class="wertetext"><?php echo $descriptions[1]?></td>
	</tr>
	<tr>
	<td class="wert3"></td>
	<td class="wertetext"><?php echo $descriptions[2]?></td>
	</tr>
	<tr>
	<td class="wert4"></td>
	<td class="wertetext"><?php echo $descriptions[3]?></td>
	</tr>
</table>
</div>

</body>
</html>
