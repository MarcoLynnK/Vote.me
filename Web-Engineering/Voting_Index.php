<!DOCTYPE html>
<html>
<?php require_once ("include/Head.php")?>

<body>

<div class="container">

    <h1>Voting</h1>
    <table  class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Thema</th>
        <th>Frage</th>
        <th></th>
        </thead>
        <tbody>

<?php

require_once("Main/Classes.php");
require_once("Main/LectureManager.php");

$votingManager = new VotingManager();
$list = $votingManager->findAll();
foreach ($list as $voting) {
    echo "<tr>";
    echo "<td>$voting->ID_Voting</td>";
    echo "<td>$voting->name_Voting</td>";
    echo "<td>$voting->question_Voting</td>";
    echo "<td>
              <a href='VotingRead.php?ID_Voting=$voting->ID_Voting' class='btn btn-success btn-xs'>zeige</a>&nbsp;
              <a href='VotingUpdate_form.php?ID_Voting=$voting->ID_Voting' class='btn btn-info btn-xs'>editiere</a>&nbsp;
              <a href='VotingDelete_do.php?ID_Voting=$voting->ID_Voting' class='btn btn-info btn-danger btn-xs'>l&ouml;sche</a>
          </td>";
    echo "<td></td>";
    echo "</tr>";
}
?>