<?php include ("Main/Session_Check.php");?>
<!DOCTYPE html>
<html>

<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>


<body>

<?php require_once("include/NavbarUser.php") ?>

    <div class="container">

        <h1>Vorlesung</h1>
        <table>
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
require_once("Main/UserManager.php");
session_start();
//lösung durch Userobjekt in Session
$user = $_SESSION["user"];

$userManager= new UserManager();
$user= $userManager->findById($user->ID_User);

$lectureManager = new LectureManager();
$list = $lectureManager->findAll();
foreach ($list as $lecture) {
    echo "<tr>";
    echo "<td>$lecture->ID_Lecture</td>";
    echo "<td>$lecture->name_Lecture</td>";
    echo "<td>$lecture->degreecourse</td>";
    echo "<td>
              <a href='LectureRead.php?ID_Lecture=$lecture->ID_Lecture'><input type='image' class='editicons' src='img/view.svg'></a>
              <a href='LectureUpdate_form.php?ID_Lecture=$lecture->ID_Lecture'><input type='image' class='editicons' src='img/edit.svg'></a>
              <a href='LectureDelete_do.php?ID_Lecture=$lecture->ID_Lecture'><input type='image' class='editicons' src='img/trash.svg'></a>
          </td>";
    echo "</tr>";
}
?>

<div >
<?php
echo "<button class='submit'><a href='LectureCreate_form.php?ID_User=$user->ID_User'>CREATE LECTURE</a></button>"
?>
</div>
</body>
</html>
