<?php include("include/session_check.php"); ?>

<?php
require_once("Main/Classes.php");
require_once("Main/ChanceManager.php");

$login = (int)htmlspecialchars($_GET["login"], ENT_QUOTES, "UTF-8");
$password= (int)htmlspecialchars($_GET["password"], ENT_QUOTES, "UTF-8");

$userManager = new UserManager();
$user = $userManager->findByLogin($login, $password);
$userManager->delete($user);

header('Location: User_Index.php');