<!DOCTYPE html>
<html>
<head>
    <?php
    require_once ('include/header.php')
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



<div id="Container">

    <form class="form-signin" role="form" action="Login_do.php" method="post">
        <img src="pic/logo.svg" class="logo"></br></br>

        <input for="login" class="inputForm" name="UserID" type="text" placeholder="User ID" ></br></br>

        <input for="password" class="inputForm" name="Password" type="password" placeholder="Password"></br></br>

        <button class="submit" name="Submit">LOG IN</button></br></br>
        <a class="forgot" href="">Forgot password?</a>
    </form>
</div>



</body>

</html>