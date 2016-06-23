<!DOCTYPE html>
<html>
<head>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/Chart.min.js"></script>


    <!--Navigation-->
    <div id="navbar">

        <img src="img/logo2.svg" id="logo">

        <div class="menu"><img src="img/sw_menu.png" id="menu"></div>


        <div class="dropdown">
            <button class="dropbtn">MENU</button>
            <div class="dropdown-content">
                <a href="#">VOTING LIST</a>
                <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/VotingCreate_form_admin.php">CREATE VOTING</a>
                <a href="#">USER LIST</a>
                <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/UserCreate_form.php">CREATE USER</a>
            </div>
        </div>

        <a href="log-out.html" style="text-decoration: none;">
            <button class="log-out" name="LogOut">LOG OUT</button>
        </a>

    </div>

</head>

<body>


    <div class="container">

    <canvas id="canvas" height="450" width="610"></canvas>

    </div>
        <script>

            var DoughnutChart = [

                {
                    value: 100,
                    color:"#ffaf72"
                },
                {
                    value : 40,
                    color : "#91efbb"
                },
                {
                    value : 70,
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
        <div class=""><?php echo " " ?></div>

        <div class="wert2"></div>
        <div class=""><?php echo " " ?></div>

        <div class="wert3"></div>
        <div class=""><?php echo " " ?></div>

    </div>

</body>
</html>