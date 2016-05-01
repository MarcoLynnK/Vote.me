<?php
require_once ("Main/UserManager.php");
require_once ("Main/Classes.php");

$ID_User = (int)htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");
$UserManager = new UserManager();
$user = $UserManager->findById($ID_User);

?>

<!DOCTYPE html>
<html>
<?php include("include/header.php"); ?>

<body>

<h1>Eintrag # <?php echo ($user->ID_User) ?></h1>

    <form action='UserUpdate_do.php' method='post'>
        Bitte aktualisieren Sie Ihre Angaben!<br>
        User ID: <br>
        <input type='text' name='ID_User' value='<?php echo ($user->ID_User) ?>' disabled><br><br>
        Benutzername: <br>
        <input type='text' name='login' value='<?php echo ($user->login) ?>'><br><br>
        Vorname: <br>
        <input type='text' name='firstname' value='<?php echo ($user->firstname) ?>'><br><br>
        Nachname: <br>
        <input type='text' name='lastname' value='<?php echo ($user->lastname) ?>'><br><br>
        Email: <br>
        <input type='text' name='email' value='<?php echo ($user->email) ?>'><br><br>
        Passwort:
        <input type='text' name='password' value='<?php echo ($user->password) ?>'><br><br>
        <input type='submit' value='aktualisieren'>
</form>

</body>
</html>

