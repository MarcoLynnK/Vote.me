<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
    <img src="img/logo.svg" class="logo"></br></br>
    <div class="container">
        <h1>Sie haben sich ausgeloggt.</h1>
        <a href='login.php'>zurück zum Login</a>
    </div>

</body>
</html>