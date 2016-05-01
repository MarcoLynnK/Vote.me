<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php
    require_once ('include/header.php')
    ?>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>
<img src="pic/bg.jpg" id="bg" alt="">

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


<div id="Container">

<form class="input-container" action="ChanceCreate_do.php" method="post">
    <a class="NewPos">Neue Möglichkeit anlegen:</a></br></br></br>

    <input class="inputForm" type="text" name="description_Chance" id="description_Chance" placeholder="Beschreibung"><br><br>
    <input class="submit" type='submit' value="anlegen">
</form>
</div>

</body>