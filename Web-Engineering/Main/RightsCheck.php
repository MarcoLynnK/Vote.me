<?php

require_once("Main/RightsManager.php");
require_once("Main/Classes.php");

$ID_Rights= htmlspecialchars($_GET["ID_Rights"], ENT_QUOTES, "UTF-8");

// $rightsManager = new RightsManager();
// $ID_Rights = $rightsManager->findById($ID_Rights);
//Zugriff durch Rightsmanager wäre eine andere Möglichkeit

session_start();
//lösung durch Userobjekt in Session
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
