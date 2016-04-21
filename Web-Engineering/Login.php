<!DOCTYPE html>
<html>
<head>
    <?php
    require_once ('include/header.php')
    ?>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Web-Project</a>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="active"><a href="index.php">Test 1</a></li>
                <li class="active"><a href="index.php">Test 2</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
        <form class="form-signin" role="form" action="DozentLogin_do.php" method="post">>
            <h1 class="form-signin-heading">Bitte loggen sie sich ein!</h1>

            <label for="login" class="sr-only">Benutzername:</label>
            <input type="text" id="login" class="form-control" placeholder="Benutzername" required autofocus>

            <label for="password" class="sr-only">Kennwort:</label>
            <input type="text" id="password" class="form-control" placeholder="Kennwort" required>
            <div class="checkbox">
                <label><input type="checkbox" value="remember-me"> Anmeldung speichern </label>
            </div>
            <button class="btn btn-lg btn-default btn-block" type="submit">Einloggen</button>
        </form>

    </div>
</body>
</html>