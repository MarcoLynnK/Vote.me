<?php

require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Lecture = htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$lectureManager = new LectureManager();
$lecture = $lectureManager->findById($ID_Lecture);
?>

<!DOCTYPE html>
<html>

<?php include("include/HeadUser.php"); ?>

<body>

<?php
    echo "<h2>Vorlesung $ID_Lecture:</h2>";

            $lectureManager = new LectureManager();
            $lecture = $lectureManager->findById($lecture);
            if (count($lecture) > 0)
            {

                echo "<table class='table table-hover'>";
                    echo "<thead>";
                        echo "<th>Vorlesung</th>";
                        echo "<th>Name</th>";
                        echo "<th>Studiengang</th>";
                        echo "<th>Aktion</th>";
                        echo "<th></th>";
                    echo "</thead>";

                foreach ($lecture as $vorlesung)
                {
                    echo "<tr>";
                    echo "<td>$vorlesung->name_Lecture</td>";
                    echo "<td>$vorlesung->degreecourse</td>";
                    echo "<td><a href='LectureUpdate_form.php?ID_Lecture=$lecture->ID_Lecture'>bearbeiten</a>";
                    echo "<td><a href='LectureDelete_do.php?ID_Lecture=$lecture->ID_Lecture'>löschen</a>";
                    echo "<td><a href='VotingCreate_form.php?ID_lecture=$lecture->ID_Lecture'>Voting erstellen</a>";
                    echo "<td></td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
            ?>

</html>