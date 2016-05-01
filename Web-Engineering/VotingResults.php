<!DOCTYPE html>
<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>

    <script src="js/chart.js"></script>
<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Sign up</title>

</head>

<body>


<div id="Container">

    <form class="form-signin" role="form" action="Login_do.php" method="post">
            <canvas class="canvas"></canvas>

            <script>
                var chart = document.getElementById(canvas).getContext("2d");
                var data = {
                    labels: {"15min", "20min", "30min", "für IMMER"} //x-axis
                    datasets[
                        {
                            label: "Pause", //optional
                            fillcolor: "rgba{220,220,220,0.8}"
                            strokeColor: "rgba{220,220,220,0.8}"
                            highlightFill: "rgba{220,220,220,0.75}"
                            highlightStroke: "rgba{220,220,220,1}"
                            data: [65, 59, 80, 81, 56, 55, 40] //y-axis
                        }
                ]
                };

                var myDoughnutChart = new Chart(chart, {
                    type: 'doughnut',
                    data: data,
                    options: options
                });

            </script>
    </form>
</div>



</body>
</html>
