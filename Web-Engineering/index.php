<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

require "Main/Session_Check.php";

// User holen
$user = $_SESSION["user"];
$rights = $user->ID_Rights;

switch ($rights) {
    case (1):
        $rights = 1;
        header('Location: index_rights_admin.php');
        break;

    case(2):
        $rights = 2;
        header('Location: index_rights_user.php');
        break;

    default:
        echo "Sie haben keine Zugriffsrechte";
        header('Location: ../login.php');
}

?>
</body>
</html>