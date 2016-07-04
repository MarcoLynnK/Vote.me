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

<?php require_once("include/Navbar.php"); ?>

<div class="container">

    <h1 class="tableText">User</h1>
    <table  class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-Mail</th>
        <th>User Right</th>
        <th>Password</th>
        <th>Tools</th>
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
    echo "<td>$user->login</td>";
    echo "<td>$user->firstname</td>";
    echo "<td>$user->lastname</td>";
    echo "<td>$user->email</td>";
    echo "<td>$user->ID_Rights</td>";
    echo "<td>$user->password</td>";
    echo "<td>
              <a href='UserRead.php?ID_User=$user->ID_User' class='btn btn-success btn-xs'><input type='image' class='editicons' src='img/view.svg'></a>&nbsp;
              <a href='UserUpdate_form.php?ID_User=$user->ID_User' class='btn btn-info btn-xs'><input type='image' class='editicons' src='img/edit.svg'></a>&nbsp;
              <a href='UserDelete_do.php?ID_User=$user->ID_User' class='btn btn-info btn-danger btn-xs'><input type='image' class='editicons' src='img/trash.svg'></a><!--hier noch UserDelete_form einbinden-->
          </td>";
    echo "</tr>";
}
?>
        </tbody>
    </table>
</div>
