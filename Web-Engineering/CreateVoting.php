<!DOCTYPE html>
<html>
<head>

    <?php
    require_once('include/Head.php')
    ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Sign up</title>

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

<div id="Container">

    <form class="input-container" action="UserCreate_do.php" method="post">
        <a class="CrtVtg">CREATE VOTING</a></br></br>

        <input class="inputForm" name="question" type="text" placeholder="Question?" rows="2"></br></br>
        <input class="inputForm" name="Option1" type="text" placeholder="Option 1" ></br></br>
        <input class="inputForm" name="Option2" type="text" placeholder="Option 2" ></br></br>
        <input class="inputForm" name="Option3" type="text" placeholder="Option 3" ></br></br>
        <button class="submit" name="submit">SIGN UP</button></br></br>
    </form>
</div>



</body>

</html>