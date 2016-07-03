<?php

//require_once("RightsManager.php");
require_once("Classes.php");

$ID_Rights= htmlspecialchars($_GET["ID_Rights"], ENT_QUOTES, "UTF-8");

// $rightsManager = new RightsManager();
// $ID_Rights = $rightsManager->findById($ID_Rights);
// Test
//wäre andere option-->Momentane Lösung aber direkt über das Objekt User

session_start();

$user = $_SESSION["user"];
$rights = $user->ID_Rights;

switch ($rights) {
    case (1):

        $_SESSION ['ID_Rights'] = 1;
        break;

    case (2):

        $_SESSION ['ID_Rights'] = 2;
        break;

    default:
        echo "Sie haben keine Zugriffsrechte";
        header('Location: ../login.php');
}
