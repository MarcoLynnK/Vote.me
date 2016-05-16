<!DOCTYPE html>
<html>
<head>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/Chart.min.js"></script>

</head>

<body>
    <div id="navbar">

        <img src="pic/logo2.svg" id="logo">

            <div class="dropdown">
                <button class="dropbtn">MENU</button>
                <div class="dropdown-content">
                    <a href="#">VOTINGS</a>
                    <a href="#">SETTINGS</a>
                </div>
            </div>

            <a href="log-out.html" style="text-decoration: none;">
                <button class="log-out" name="LogOut">LOG OUT</button>
            </a>

    </div>

    <div class="container">

    <canvas id="canvas" height="450" width="610"></canvas>

    </div>
        <script>

            var DoughnutChart = [

                {
                    value: 60,
                    label1: "10 min",
                    color:"#ffaf72"
                },
                {
                    value : 30,
                    label2: "30 min",
                    color : "#91efbb"
                },
                {
                    value : 50,
                    label3: "60 min",
                    color : "#f8baff"
                },
            ];

            var options = {
                showlegend: true,
            }

            var myDoughnutChart = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(DoughnutChart);
            var skillsChart = new Chart(context).Doughnut(DoughnutChart, options);

        </script>

    <div class="werte">

        <div class="wert1"></div>
        <div class=""><?php echo "" ?></div>

        <div class="wert2"></div>
        <div class=""><?php echo "" ?></div>

        <div class="wert3"></div>
        <div class=""><?php echo "" ?></div>

    </div>

</body>
</html>