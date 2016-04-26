<!DOCTYPE html>
<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>
</head>
<body>

<h1> Neuen Benutzer anlegen:</h1>

<form action="DozentCreate_do.php" method="post">
    Benutzername:<br>
    <input type="text" name="login" id="login" placeholder="Benutzername"><br><br>
    Vorname:<br>
    <input type="text" name="firstname" id="firstname" placeholder="Vorname"><br><br>
    Nachname:<br>
    <input type="text" name="lastname" id="lastname" placeholder="Nachname"><br><br>
    Fakultät:<br>
    <input type="text" name="faculty" id="faculty" placeholder="Fakultät"><br><br>
    Passwort:<br>
    <input type="password" name="password" id="password" placeholder="Passwort"><br><br>
    <input type='submit' value="registrieren">
</form>


</body>