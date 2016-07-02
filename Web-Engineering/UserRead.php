<?php

require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$ID_User= htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");
$userManager= new UserManager();
$user = $userManager->findById($ID_User);
?>

<!DOCTYPE html>
<html>
<head>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>

</head>


<body>

<?php require_once("include/HeadUser.php") ?>


<?php
echo "<h2>Dozent $ID_User:</h2>";

$userManager = new UserManager();
$user = $userManager->findById($ID_User);
if (count($user) > 0)
{

    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<th>User ID</th>";
    echo "<th>Benutzername</th>";
    echo "<th>Vorname</th>";
    echo "<th>Nachname</th>";
    echo "<th>E-mail</th>";
    echo "<th>Recht</th>";
    echo "<th>Passwort</th>";
    echo "<th></th>";
    echo "</thead>";

    foreach ($user as $dozent)
    {
        echo "<tr>";
        echo "<td>$dozent->ID_User</td>";
        echo "<td>$dozent->login</td>";
        echo "<td>$dozent->firstname</td>";
        echo "<td>$dozent->lastname</td>";
        echo "<td>$dozent->email</td>";
        echo "<td>$dozent->ID_Rights</td>";
        echo "<td>$dozent->hash</td>";
        echo "<td><a href='UserUpdate_form.php?User_ID=$dozent->User_ID' class='btn btn-info btn-danger btn-xs' >bearbeiten</a>";
        echo "<td><a href='UserDelete_do.php?User_ID=$dozent->User_ID' class='btn btn-info btn-danger btn-xs' >löschen</a>";
        echo "<td></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

</html>