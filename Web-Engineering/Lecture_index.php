<!DOCTYPE html>
<html>
<?php require_once ("include/Head.php")?>

<body>

    <div class="container">

        <h1>Vorlesung</h1>
        <table  class="table table-hover">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Studiengang</th>
            <th></th>
            </thead>
            <tbody>

<?php

require_once("Main/Classes.php");
require_once("Main/LectureManager.php");
$lectureManager = new LectureManager();
$list = $lectureManager->findAll();
foreach ($list as $lecture) {
    echo "<tr>";
    echo "<td>$lecture->ID_Lecture</td>";
    echo "<td>$lecture->name_Lecture</td>";
    echo "<td>$lecture->degreecourse</td>";
    echo "<td>
              <a href='LectureRead.php?ID_Lecture=$lecture->ID_Lecture' class='btn btn-success btn-xs'>zeige</a>&nbsp;
              <a href='LectureUpdate_form.php?ID_Lecture=$lecture->ID_Lecture' class='btn btn-info btn-xs'>editiere</a>&nbsp;
              <a href='LectureDelete_do.php?ID_Lecture=$lecture->ID_Lecture' class='btn btn-info btn-danger btn-xs'>l&ouml;sche</a>
          </td>";
    echo "<td></td>";
    echo "</tr>";
}
?>