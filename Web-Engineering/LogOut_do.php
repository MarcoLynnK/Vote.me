<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <div id="navbar">
        <img src="img/logo2.svg" id="logo">
    </div>
</head>

<body>

    <div class="container">
        <h1>Sie haben sich ausgeloggt.</h1>
        <center><a href='login.php'>zurück zum Login</a></center>
    </div>

</body>
</html>