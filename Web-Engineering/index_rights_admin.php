<?php
/*include ("include/RightsCheck.php");
include ("include/Session_Check.php");*/
?>
!DOCTYPE html>
<html>
<?php include("include/NavbarUser.php") ?>
<body>
<!--Navigation-->
<div id="navbar">

    <img src="img/logo2.svg" id="logo">

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="Voting_Index.php">VOTING LIST</a>
            <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/VotingCreate_form_admin.php">CREATE VOTING</a>
            <a href="#">USER LIST</a>
            <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/UserCreate_form.php">CREATE USER</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>
<h1>Sie sind Admin:</h1>
<a href="User_Index.php">User</a><br><br>
<a href="Lecture_Index.php">Vorlesungen</a><br><br>
<a href="Voting_Index.php">Votings</a><br><br>
<a href="Chance_Index.php">Chance</a>

</body>
</html>
