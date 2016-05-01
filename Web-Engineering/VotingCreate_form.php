<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>

<div id="navbar">

    <img src="pic/logo2.svg" id="logo">

    <div class="dropdown">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
            <a href="#">VOTINGS</a>
            <a href="#">SETTINGS</a>
        </div>
    </div>

    <a href="log-out.html" style="text-decoration: none;">
        <button class="log-out" name="LogOut">LOG OUT</button>
    </a>

</div>

<a> Neues Voting anlegen:</a>

<form action="VotingCreate_do.php" method="post">
    
    <input class="inputForm" type="text" name="name_Voting" id="name_Voting" placeholder="Votingthema"><br><br>
    <input class="inputForm" type="text" name="question_Voting" id="question_Voting" placeholder="Frage"><br><br>
    <input class="submit" type='submit' value="anlegen">
</form>

</body>
</html>