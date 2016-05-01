<?php
require_once ("Main/UserManager.php");
require_once ("Main/Classes.php");

$ID_User = (int)htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");
$UserManager = new UserManager();
$user = $UserManager->findById($ID_User);

?>

<!DOCTYPE html>
<html>
<head>
<?php include("include/header.php"); ?>

<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
</head>
<title>User Update</title>
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

<a>Eintrag # <?php echo ($user->ID_User) ?></a>

    <form class="input-container" action='UserUpdate_do.php' method='post'>
        Bitte aktualisieren Sie Ihre Angaben!<br>
        User ID: <br>
        <input class="inputForm" type='text' name='ID_User' value='<?php echo ($user->ID_User) ?>' disabled><br><br>
        Benutzername: <br>
        <input class="inputForm" type='text' name='login' value='<?php echo ($user->login) ?>'><br><br>
        Vorname: <br>
        <input class="inputForm2" type='text' name='firstname' value='<?php echo ($user->firstname) ?>'><br><br>
        Nachname: <br>
        <input class="inputForm3" type='text' name='lastname' value='<?php echo ($user->lastname) ?>'><br><br>
        Email: <br>
        <input class="inputForm" type='email' name='email' value='<?php echo ($user->email) ?>'><br><br>
        Passwort:
        <input class="inputForm" type='text' name='password' value='<?php echo ($user->password) ?>'><br><br>
        <input class="submit" type='submit' value='aktualisieren'>
</form>

</body>
</html>

