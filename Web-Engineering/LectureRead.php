<?php

require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

$ID_Lecture = (int)htmlspecialchars($_GET["ID_Lecture"], ENT_QUOTES, "UTF-8");
$lectureManager = new LectureManager();
$lecture = $lectureManager->findById($ID_Lecture);
?>

<!DOCTYPE html>
<html>

<?php include("include/Head.php"); ?>

<body>

    <h1><?php echo $lecture->name_lecture ?></h1>
        <?php echo $notiz->text ?><br><br>
        <?php echo ($notiz->name." / ".date("d.m.Y", strtotime($notiz->datum))); ?>

    <h2>Verbundene Leser:</h2>
        <?php
            $notizLeserManager = new NotizLeserManager();
            $liste = $notizLeserManager->findAllLeserByNotiz($notiz);
            if (count($liste) > 0) { ?>
                <table class="table table-hover">
                    <thead>
                    <th>id</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Aktion</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($liste as $leser) {
                        echo "<tr>";
                        echo "<td>$leser->id</td>";
                        echo "<td>$leser->vorname</td>";
                        echo "<td>$leser->nachname</td>";
                        echo "<td><a href='LeserUnconnect_do.php?notiz_id=$notiz->id&leser_id=$leser->id' class='btn btn-info btn-danger btn-xs' >Verbindung lösen</a>";
                        echo "<td></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <br>

                <?php
