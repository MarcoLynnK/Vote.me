<!DOCTYPE html>
<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>


<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="js/chart.js"></script>

<title>Sign up</title>

</head>

<body>


<div id="Container">

    <form class="form-signin" role="form" action="Login_do.php" method="post">
            <canvas class="canvas" width="400" height="400"></canvas>

            <script>
                var chart = document.getElementById(canvas).getContext("2d");
                var Result = new Chart(chart).Bar(data);
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

                var Result = new Chart(chart).Bar(data);

            </script>
    </form>
</div>



</body>
</html>
