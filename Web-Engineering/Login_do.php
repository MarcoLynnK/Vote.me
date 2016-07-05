<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>Login</title>
<body>
<?php
include ("Main/Session_Check.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");
include_once("Main/UserData.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($password)) 
{

    $userManager = new UserManager();
    $user = $userManager->findByLogin($login, $password);//holt sich den User aus der Datenbank durch Suche nach dem Login und Passwort (verifizierung im Usermanager)

    if ($user==null)
    {

        echo "Login fehlgeschlagen!";
        header('Location: login.php');
        die();

    }
    else
    {

        echo "Zweiter Schleifenteil";
        session_start();

        // Userobjekt ablegen
        $_SESSION ['user'] = $user;

        // Loginstatus auf true setzen
        $_SESSION ['login'] = true;

        header('Location: index.php');//direkte weiterleitung auf index.php durch 'Location:
        die();
    }
} 
else {
        echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
     }?>
<a href="login.php"> <div class="submit">BACK</div></a>
</body>
</html>
