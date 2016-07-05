<?php
include ("Main/Session_Check.php");
require_once("Main/Classes.php");
require_once("Main/UserManager.php");

$ID_User = htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");

/*
 * User löschen
 */
$userManager = new UserManager();
$user = $userManager->findById($ID_User);
$userManager->delete($user);

header('Location: User_Index.php');