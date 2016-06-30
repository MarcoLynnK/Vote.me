<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<?php include("include/Head.php")?>

<body>
    <div id="navbar">
    <img src="img/logo2.svg" id="logo">
    </div>
    <div class="container">
        <h1>Sie haben sich ausgeloggt.</h1>
        <a href='login.php'>zurück zum Login</a>
    </div>

</body>
</html>