<?php

require_once("../Main/RightsManager.php");
require_once("../Main/Classes.php");

$ID_Rights= htmlspecialchars($_GET["ID_Rights"], ENT_QUOTES, "UTF-8");

$rightsManager = new RightsManager();
$rights = $rightsManager->findById($ID_Rights);

    if ($rights==null)
    {
        header('Location: login.php');
        die();
    }
    
    else
    {
        echo "Error: Bitte füllen sie alle Felder aus!<br/>";
    }

switch ($rights):
    case (1):
        session_start();
        $_SESSION ['rights'] = 1;
        break;
    case (2):
        session_start();
        $_SESSION ['rights'] = 2;
        break;
    default:
        echo "Sie haben keine Zugriffsrechte";
        header('Location: ../login.php');
endswitch;

