<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<?php include("include/Head.php")?>

<body>
    <img src="img/logo.svg" class="logo"></br></br>
    <div class="container">
        <h1>Sie haben sich ausgeloggt.</h1>
        <a href='login.php'>zurück zum Login</a>
    </div>

</body>
</html>