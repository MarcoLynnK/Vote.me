<!DOCTYPE html>
<html>
</head>
<?php require_once("include/HeadUser.php") ?>

<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>

<div class="table-container">

    <h1>Voting</h1>
    <table  class="table-hover">
        <thead>
        <th>ID</th>
        <th>Thema</th>
        <th>Frage</th>
        <th></th>
        </thead>
        <tbody>

<?php

require_once("Main/Classes.php");
require_once("Main/VotingManager.php");

$votingManager = new VotingManager();
$list = $votingManager->findAll();
foreach ($list as $voting) {
    echo "<tr>";
    echo "<td>$voting->ID_Voting</td>";
    echo "<td>$voting->name_Voting</td>";
    echo "<td>$voting->question_Voting</td>";
    echo "<td>
              <a href='VotingRead.php?ID_Voting=$voting->ID_Voting' class='btn btn-success btn-xs'><input type='image' class='editicons' src='img/view.svg'></a>&nbsp;
              <a href='VotingUpdate_form.php?ID_Voting=$voting->ID_Voting' class='btn btn-info btn-xs'><input type='image' class='editicons' src='img/edit.svg'></a>&nbsp;
              <a href='VotingDelete_do.php?ID_Voting=$voting->ID_Voting' class='btn btn-info btn-danger btn-xs'><input type='image' class='editicons' src='img/trash.svg'></a>
          </td>";
    echo "<td></td>";
    echo "</tr>";
}
?>

</body>
</html>
        