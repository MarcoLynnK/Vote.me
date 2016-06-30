<!DOCTYPE html>
<html>
<?php require_once("include/HeadUser.php") ?>

<body>

<div class="container">
    <h1>Votingoptionen</h1>
    <table  class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Beschreibung</th>
            <th></th>
        </thead>
        <tbody>
            <?php
            require_once("Main/Classes.php");
            require_once("Main/LectureManager.php");
                $chanceManager = new ChanceManager();
                $list = $chanceManager->findAll();
                    foreach ($list as $chance)
                    {
                        echo "<tr>";
                        echo "<td>$chance->ID_Chance</td>";
                        echo "<td>$chance->description_Chance</td>";
                        echo "<td>
                                <a href='ChanceRead.php?ID_Chance=$chance->ID_Chance' class='btn btn-success btn-xs'>zeige</a>&nbsp;
                                <a href='ChanceUpdate_form.php?ID_Chance=$chance->ID_Chance' class='btn btn-info btn-xs'>editiere</a>&nbsp;
                                <a href='ChanceDelete_do.php?ID_Chance=$chance->ID_Chance' class='btn btn-info btn-danger btn-xs'>l&ouml;sche</a>
                            </td>";
                        echo "<td></td>";
                        echo "</tr>";
                    }
            ?>
        </tbody>
