<!DOCTYPE html>
<html>
<head>
    <?php require_once ("include/Head.php")?>
    
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Sign up</title>

</head>

<body>


<div id="Container">

    <form class="form-signin" role="form" action="Login_do.php" method="post">
        <img src="img/logo.svg" class="logo"></br></br>

        <input class="inputForm" name="login" type="text" id="login" placeholder="Username" ></br></br>

        <input class="inputForm" name="Password" type="password" id="password" placeholder="Password"></br></br>

        <button class="submit" name="Submit">LOG-IN</button></br></br>
        <a class="forgot" href="">Passwort vergessen?</a>
    </form>
</div>


</body>

</html>