<html>
<head>
    <?php include("include/Head.php")?>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <!--Navigation-->
    <div id="navbar">

        <img src="img/logo2.svg" id="logo">

        <div class="menu"><img src="img/sw_menu.png" id="menu"></div>


        <div class="dropdown">
            <button class="dropbtn">MENU</button>
            <div class="dropdown-content">
                <a href="#">VOTING LIST</a>
                <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/VotingCreate_form_admin.php">CREATE VOTING</a>
                <a href="#">USER LIST</a>
                <a href="https://mars.iuk.hdm-stuttgart.de/~mk235/Web-Engineering/UserCreate_form.php">CREATE USER</a>
            </div>
        </div>

        <a href="log-out.html" style="text-decoration: none;">
            <button class="log-out" name="LogOut">LOG OUT</button>
        </a>

    </div>
    

</head>
<body>

<form action="LectureCreate_do.php" method="post">
    <input class="inputForm" type="text" name="name_Lecture" id="name_Lecture" placeholder="Vorlesung"><br><br>
    <input class="inputForm" type="text" name="degreecourse" id="degreecourse" placeholder="Studiengang"><br><br>
    <input class="submit" type='submit' value="Vorlesung anlegen">
</form>

</body>