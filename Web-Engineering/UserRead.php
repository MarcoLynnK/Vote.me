<?php

require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$ID_User= htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");
$userManager= new UserManager();
$user = $userManager->findById($ID_User);
?>

<!DOCTYPE html>
<html>

<?php include("include/NavbarUser.php"); ?>

<body>

<?php
echo "<h2>Dozent $ID_User:</h2>";
echo "<h1 class='topic'><a class='bold'>Username:</a> $user->login</h1>";
echo "<h3 class='text2'><a class='bold'>Firstname:</a> $user->firstname</h3>";
echo "<h3 class='text2'><a class='bold'>Lastname:</a> $user->lastname</h3>";
echo "<h3 class='text2'><a class='bold'>E-mail:</a> $user->email</h3>";
echo "<h3 class='text2'><a class='bold'>Password:</a> $user->password</h3>";
echo "<h3 class='text2'><a class='bold'>Rights:</a> $user->ID_Rights</h3>";
?>
</body>
</html>