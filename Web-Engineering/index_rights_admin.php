<?php
include ("include/RightsCheck.php");
include ("include/Session_Check.php");
?>
!DOCTYPE html>
<html>
<?php include ("include/Head.php")?>
<body>
<!--Navigation-->
<div id="navbar">

    <img src="img/logo2.svg" id="logo">

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="Voting_Index.php">VOTING LIST</a>
            <a href="#">CREATE VOTING</a>
            <a href="#">USER LIST</a>
            <a href="#">CREATE USER</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>
<h1>sie sind admin:</h1>
<a href="User_Index.php">User</a>
<a href="Lecture_Index.php">Vorlesungen</a><br><br>
<a href="Voting_Index.php">Votings</a><br><br>

</body>
</html>