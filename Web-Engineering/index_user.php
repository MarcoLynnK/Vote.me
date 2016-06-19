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

    <img src="pic/logo2.svg" id="logo">

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="Voting_Index.php">VOTINGS</a>
            <a href="#">SETTINGS</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>
<a href="Lecture_Index.php">Vorlesungen</a><br><br>
<a href="Voting_Index.php">Votings</a><br><br>
</body>
</html>
