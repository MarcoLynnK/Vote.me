<?php

require_once("../Main/RightsManager.php");
require_once("../Main/Classes.php");

$ID_Rights= htmlspecialchars($_GET["ID_Rights"], ENT_QUOTES, "UTF-8");

$rightsManager = new RightsManager();
$ID_Rights = $rightsManager->findById($ID_Rights);

switch ($rights):
    case (1):
        session_start();
        $_SESSION ['ID_Rights'] = 1;
        break;
    case (2):
        session_start();
        $_SESSION ['ID_Rights'] = 2;
        break;
    default:
        echo "Sie haben keine Zugriffsrechte";
        header('Location: ../login.php');
endswitch;

