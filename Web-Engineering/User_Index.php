<!DOCTYPE html>
<html>
<?php require_once ("include/Head.php")?>

<body>

<div class="container">

    <h1>User</h1>
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
    echo "<td>$user->rights</td>";
    echo "<td>$user->password</td>";
    echo "<td>
              <a href='UserRead.php?ID_User=$user->ID_User' class='btn btn-success btn-xs'>zeige</a>&nbsp;
              <a href='UserUpdate_form.php?ID_User=$user->ID_User' class='btn btn-info btn-xs'>editiere</a>&nbsp;
              <a href='UserDelete_do.php?ID_User=$user->ID_User' class='btn btn-info btn-danger btn-xs'>l&ouml;sche</a>
          </td>";
    echo "<td></td>";
    echo "</tr>";
}
?>