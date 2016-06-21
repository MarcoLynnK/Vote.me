<?php

require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$ID_User = (int)htmlspecialchars($_GET["ID_User"], ENT_QUOTES, "UTF-8");
$userManager = new UserManager();
$user = $userManager->findById($ID_User);
?>

<!DOCTYPE html>
<html>

<?php include("include/Head.php"); ?>

<body>

<?php
echo "<h2>Dozent $ID_User:</h2>";

$userManager = new LectureManager();
$user = $userManager->findByLogin($user);
if (count($user) > 0)
{

    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<th>Vorlesung</th>";
    echo "<th>Name</th>";
    echo "<th>Studiengang</th>";
    echo "<th>Aktion</th>";
    echo "<th></th>";
    echo "</thead>";

    foreach ($user as $dozent)
    {
        echo "<tr>";
        echo "<td>$dozent->name_Lecture</td>";
        echo "<td>$dozent->degreecourse</td>";
        echo "<td><a href='LectureUpdate_form.php?notiz_id=$dozent->id&leser_id=$dozent->id' class='btn btn-info btn-danger btn-xs' >bearbeiten</a>";
        echo "<td><a href='LectureDelete_do.php?notiz_id=$dozent->id&leser_id=$dozent->id' class='btn btn-info btn-danger btn-xs' >löschen</a>";
        echo "<td></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

</html>