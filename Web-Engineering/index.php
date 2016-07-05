
<?php

require "Main/Session_Check.php";

// User holen
$user = $_SESSION["user"];
$rights = $user->ID_Rights;

/*
 * Prüfen anhand der ID_Rights, ob der User admin oder Dozent ist
 */
switch ($rights) {
    case (1):
        //Admin
        $rights = 1;
        //weiterleiten auf die Adminseite
        header('Location: index_rights_admin.php');
        break;

    case(2):
        //Dozent
        $rights = 2;
        //weiterleiten auf die Userseite
        header('Location: index_rights_user.php');
        break;
    default:
        //nicht in der DB angelegt
        echo "Sie haben keine Zugriffsrechte";
        
        header('Location: ../login.php');
}
?>
