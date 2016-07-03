<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
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