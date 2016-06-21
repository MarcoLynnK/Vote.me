<!DOCTYPE html>
<html>
<head>
    <?php require_once ("include/Head.php")?>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Sign up</title>

    <!--Navigation-->
    <div id="navbar">

        <img src="img/logo2.svg" id="logo">

        <div class="menu"><img src="img/sw_menu.png" id="menu"></div>

        <div class="dropdown">
            <button class="dropbtn">MENU</button>
            <div class="dropdown-content">
                <a href="#">VOTING LIST</a>
                <a href="#">CREATE VOTING</a>
            </div>
        </div>

        <a href="log-out.html" style="text-decoration: none;">
            <button class="log-out" name="LogOut">LOG OUT</button>
        </a>

    </div>

</head>
<body>
<?php
/*
 Übergabe der Lecture ID als Option, wie bei ChanceCreate
*/
?>



<div id="Container">

    <form class="input-container" action="VotingCreate_do.php" method="post">

        <input class="inputForm" name="name_Voting" type="text" placeholder="Votingname" rows="2"></br></br>
        <input class="inputForm" name="question_Voting" type="text" placeholder="Frage?" rows="2"></br></br>
        <input class="inputForm" name="Chance1" type="text" placeholder="Option 1" ></br></br>
        <input class="inputForm" name="Chance2" type="text" placeholder="Option 2" ></br></br>
        <input class="inputForm" name="Chance3" type="text" placeholder="Option 3" ></br></br>
        <input class="inputForm" name="Chance4" type="text" placeholder="Option 4" ></br></br>
        <button class="submit" name="submit">CREATE VOTING</button></br></br>
    </form>
</div>



</body>

</html>