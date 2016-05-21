<!DOCTYPE html>
<html>
<head>

    <?php require_once ("include/Head.php")?>

    
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Sign up</title>

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

<div id="Container">

    <form class="input-container" action="UserCreate_do.php" method="post">
        <a class="NewUser">Neuer Benutzer</a></br></br>
        Benutzername: <br>
        <input class="inputForm" id="login" name="login" type="text" placeholder="Benutzername" ></br></br>
        Vorname: <br>
        <input class="inputForm2" id="firstname" name="firstname" type="text" placeholder="Vorname">
        Nachname:<br>
        <input class="inputForm3" id="lastname" name="lastname" type="text" placeholder="Nachname"></br></br>
        E-Mail: <br>
        <input class="inputForm" id="email" name="email" type="email" placeholder="E-Mail" ></br></br>
        Passwort: <br>
        <input class="inputForm" id="password" name="password" type="password" placeholder="Passwort"></br></br>
        <button class="submit" name="submit">REGISTRIEREN!</button></br></br>
    </form>
</div>



</body>

</html>