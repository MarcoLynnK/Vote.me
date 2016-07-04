<?php
include ("Main/Session_Check.php");
require_once ("Main/UserManager.php");
require_once ("Main/Classes.php");

$ID_User = htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");
$UserManager = new UserManager();
$userfromtable = $UserManager->findById($ID_User);

?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>User Update</title>
<body>
<?php require_once("include/Navbar.php"); ?>

<div id="navbar">

    <img src="img/logo2.svg" id="logo">

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

<h2>User # <?php echo ($user->ID_User) ?> </h2>

    <form class="input-container" action='UserUpdate_do.php' method='post'>
        Bitte aktualisieren Sie Ihre Angaben!<br>
        User ID: <br>
        <input class="inputForm" type='text' name='ID_User' value='<?php echo ($userfromtable->ID_User) ?>' disabled><br><br>
        Benutzername: <br>
        <input class="inputForm" type='text' name='login' value='<?php echo ($userfromtable->login) ?>'><br><br>
        Vorname: <br>
        <input class="inputForm2" type='text' name='firstname' value='<?php echo ($userfromtable->firstname) ?>'><br><br>
        Nachname: <br>
        <input class="inputForm3" type='text' name='lastname' value='<?php echo ($userfromtable->lastname) ?>'><br><br>
        Email: <br>
        <input class="inputForm" type='email' name='email' value='<?php echo ($userfromtable->email) ?>'><br><br>
        Recht:
        <input class="inputForm" type='text' name='ID_Rights' value='<?php echo ($userfromtable->ID_Rights) ?>'><br><br>
        Passwort:
        <input class="inputForm" type='text' name='password' value='<?php echo ($userfromtable->hash) ?>'><br><br>
        <input class="submit" type='submit' value='aktualisieren'>
</form>

</body>
</html>

