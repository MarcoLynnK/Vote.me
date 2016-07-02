<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>

<body>

<?php include("include/HeadUser.php"); ?>

<div class="container">

    <h1 class="tableText">User</h1>
    <table  class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>E-Mail</th>
        <th>Userrecht</th>
        <th>Passwort</th>
        <th></th>
        </thead>
        <tbody>

<?php
require_once("Main/Classes.php");
require_once("Main/UserManager.php");
$userManager = new UserManager();
$list = $userManager->findAll();
foreach ($list as $user) {
    echo "<tr>";
    echo "<td>$user->ID_User</td>";
    echo "<td>$user->firstname</td>";
    echo "<td>$user->lastname</td>";
    echo "<td>$user->email</td>";
    echo "<td>$user->ID_Rights</td>";
    echo "<td>$user->password</td>";
    echo "<td>
              <a href='UserRead.php?ID_User=$user->ID_User' class='btn btn-success btn-xs'>zeige</a>&nbsp;
              <a href='UserUpdate_form.php?ID_User=$user->ID_User' class='btn btn-info btn-xs'>editiere</a>&nbsp;
              <a href='UserDelete_do.php?ID_User=$user->ID_User' class='btn btn-info btn-danger btn-xs'>l&ouml;sche</a><!--hier noch UserDelete_form einbinden-->
          </td>";
    echo "</tr>";
}
?>