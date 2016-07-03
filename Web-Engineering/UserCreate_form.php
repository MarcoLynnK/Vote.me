<?php include ("Main/Session_Check.php");?>
<!DOCTYPE html>
<html>
<head>

    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


        <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
        <script type="text/javascript" src="js/Chart.min.js"></script>
    </head>
    

</head>

<body>

<?php require_once("include/Navbar.php"); ?>

<!--Eingabefelder für neuen User-->
<div id="Container">

    <form class="input-container" action="UserCreate_do.php" method="post">
        <!--<a class="NewUser">Neuer Benutzer</a></br></br>-->
        <input class="inputForm" id="login" name="login" type="text" placeholder="Benutzername" ></br></br>
        <input class="inputForm2" id="firstname" name="firstname" type="text" placeholder="Vorname">
        <input class="inputForm3" id="lastname" name="lastname" type="text" placeholder="Nachname"></br></br>
        <input class="inputForm" id="email" name="email" type="email" placeholder="E-Mail" ></br></br>
        <input class="inputForm" id="ID_Rights" name="ID_Rights" type="text" placeholder="Userrecht" ></br></br>
        <input class="inputForm" id="password" name="password" type="password" placeholder="Passwort"></br></br>
        <!--<div class="admincheck"><input class="CheckBox" id="rights" name="rights" type="checkbox"><a class="Admin">Administrator</a></div></br></br>-->
        <button class="submit" name="submit">CREATE USER</button></br></br>
    </form>
</div>

</body>

</html>