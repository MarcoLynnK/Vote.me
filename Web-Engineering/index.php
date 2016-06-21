<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
require "include/Session_Check.php";

$rights= $_SESSION ["rights"];
switch ($rights):
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
endswitch;
?>
</body>
</html>