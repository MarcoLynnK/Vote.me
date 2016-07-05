<?php
//Skript zu Updaten eines Users
include ("Main/Session_Check.php");
require_once ("Main/UserManager.php");
require_once ("Main/Classes.php");
//User-ID Holen
$ID_User = htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");

/*
 * Neuer Usermanager
 */
$UserManager = new UserManager();

/*
 * Ausgabe des Users in $user anhand der User-ID durch Methode findById
 */
$user = $UserManager->findById($ID_User);

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
<?php print_r($user);?>
<!--Navigation einbinden-->
<?php require_once("include/Navbar.php"); ?>


<!--Form Block für Userupdate-->
<h2>User No.<?php echo ($user->ID_User) ?> </h2>

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
        Recht:
        <input class="inputForm" type='text' name='ID_Rights' value='<?php echo ($user->ID_Rights) ?>'><br><br>
        Passwort:
        <input class="inputForm" type='text' name='password' value='<?php echo ($user->hash) ?>'><br><br>
        <input class="submit" type='submit' value='aktualisieren'>
</form>

</body>
</html>

