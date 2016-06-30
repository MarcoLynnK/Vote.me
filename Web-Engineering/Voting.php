<?php
$ID_Voting= htmlspecialchars($_GET ["ID_Voting"], ENT_QUOTES, "UTF-8");
$votingManager= new VotingManager();
$voting=$votingManager-> findById($ID_Voting);

$votingchanceManager= new VotingChanceManager();
$chance=$votingchanceManager->findAllChancesByVoting($voting);


require_once ("Main/UserManager.php");
require_once ("Main/Classes.php");
?>

<!DOCTYPE html>
<html>
<head>
    <?php include("include/HeadUser.php"); ?>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<title>User Update</title>
<body>


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

<h2>Voting # <?php echo ($voting->ID_Voting) ?> </h2>

<form class="input-container" action='UserUpdate_do.php' method='post'>
    Bitte aktualisieren Sie Ihre Angaben!<br>
    User ID: <br>
    <input class="inputForm" type='text' name='ID_Voting' value='<?php echo ($voting->ID_Voting) ?>' disabled><br><br>
    Benutzername: <br>
    <input class="inputForm" type='text' name='login' value='<?php echo ($voting->name_Voting) ?>'><br><br>
    Vorname: <br>
    <input class="inputForm2" type='text' name='firstname' value='<?php echo ($voting->question_Voting) ?>'><br><br>
    Nachname: <br>
    <input class="inputForm3" type='text' name='lastname' value='<?php echo ($voting->lastname) ?>'><br><br>
    Email: <br>
    <input class="inputForm" type='email' name='email' value='<?php echo ($user->email) ?>'><br><br>
    Recht:
    <input class="inputForm" type='text' name='ID_Rights' value='<?php echo ($user->ID_Rights) ?>'><br><br>
    Passwort:
    <input class="inputForm" type='text' name='password' value='<?php echo ($user->password) ?>'><br><br>
    <input class="submit" type='submit' value='aktualisieren'>
</form>

</body>
</html>
