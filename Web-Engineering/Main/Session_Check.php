<?php
require_once("Classes.php");
require_once("RightsCheck.php");


    if (!$_SESSION["login"])
    {
        $_SESSION = array();
        session_destroy();
        header('Location: login.php'); 
    }

    // Alles weitere wird von den jeweiligen Dateien gehandhabt

?>

