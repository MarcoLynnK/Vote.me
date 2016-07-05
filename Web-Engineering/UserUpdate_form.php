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

<!--Navigation einbinden-->
<?php require_once("include/Navbar.php"); ?>


<!--Form Block für Userupdate-->
<h1 class="topic">User No. <?php echo ($user->ID_User)?></h1>

    <form class="input-container" action='UserUpdate_do.php' method='post'>
        <a class="text2">User ID:</a><br>
        <input class="inputForm" type='text' name='ID_User' value='<?php echo ($user->ID_User)?>'><br><br>
        <a class="text2">Username:</a><br>
        <input class="inputForm" type='text' name='login' value='<?php echo ($user->login) ?>'><br><br>
        <a class="text2">First Name & Last Name:</a><br>
        <input class="inputForm2" type='text' name='firstname' value='<?php echo ($user->firstname) ?>'>
        <input class="inputForm3" type='text' name='lastname' value='<?php echo ($user->lastname) ?>'><br><br>
        <a class="text2">Email:</a><br>
        <input class="inputForm" type='email' name='email' value='<?php echo ($user->email) ?>'><br><br>
        <a class="text2">Right:</a><br>
        <input class="inputForm" type='text' name='ID_Rights' value='<?php echo ($user->ID_Rights) ?>'><br><br>
        <input class="submit" type='submit' value='UPDATE'>
    </form>

</body>
</html>

