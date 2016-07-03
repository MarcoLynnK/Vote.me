<?php include ("Main/Session_Check.php");

include "Main/VotingChanceManager.php";

// GET ID_Voting erstmal test nur, nachher durch ordentliche Anbindung ersetzen
$ID_Voting = 1;

$votingChanceManager = new VotingChanceManager();

$chances = $votingChanceManager->findAllChancesByVotingId($ID_Voting);

$daten = [0, 0, 0, 0];
$i = 0;

foreach ($chances as $oneChance) {

	$chanceid = $oneChance->ID_Chance;
	$count = $votingChanceManager->countVotingChance($ID_Voting, $chanceid);
	$daten[$i] = $count;
	$i++;

}

print_r($daten);



?>
<!DOCTYPE html>

<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


	<script type="text/javascript" src="js/jquery-1.12.3.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
</head>

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

		// Doughnut Chart Daten
		var doughnutData = [
			{
				value: 20,
				color:"#ffaf72"
			},
			{
				value : 40,
				color : "#91efbb"
			},
			{
				value : 10,
				color : "#e4a3ff"
			},
			{
				value : 30,
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

	<div class="wert1"></div>
	<div class=""></div>

	<div class="wert2"></div>
	<div class=""></div>

	<div class="wert3"></div>
	<div class=""></div>

	<div class="wert4"></div>
	<div class=""></div>

</div>

</body>
</html>
