<!DOCTYPE html>
<html>
<head>
    
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Sign up</title>

</head>

<body>

<!--Navigation-->
<div id="navbar">

    <img src="img/logo2.svg" id="logo">

    <div class="menu"><img src="img/sw_menu.png" id="menu"></div>


    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="#">VOTING LIST</a>
            <a href="#">CREATE VOTING</a>
            <a href="#">USER LIST</a>
            <a href="#">CREATE USER</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>

<!--Eingabefelder für neuen User-->
<div id="Container">

    <form class="input-container" action="UserCreate_do.php" method="post">
        <!--<a class="NewUser">Neuer Benutzer</a></br></br>-->
        <input class="inputForm" id="login" name="login" type="text" placeholder="Benutzername" ></br></br>
        <input class="CheckBox" id="rights" name="rights" type="checkbox">Administrator</br></br>
        <input class="inputForm2" id="firstname" name="firstname" type="text" placeholder="Vorname">
        <input class="inputForm3" id="lastname" name="lastname" type="text" placeholder="Nachname"></br></br>
        <input class="inputForm" id="email" name="email" type="email" placeholder="E-Mail" ></br></br>
        <input class="inputForm" id="rights" name="rights" type="text" placeholder="Userrecht" ></br></br>
        <input class="inputForm" id="password" name="password" type="password" placeholder="Passwort"></br></br>
        <button class="submit" name="submit">CREATE USER</button></br></br>
    </form>
</div>

</body>

</html>