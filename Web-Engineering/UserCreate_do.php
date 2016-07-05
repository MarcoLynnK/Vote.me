<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>User Create</title>
<body>
<?php
include ("Main/Session_Check.php");
require_once("./Main/UserManager.php");
require_once("./Main/Classes.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");//htmlspecialchars filtert aus der eingabe die Sonderzeichen bzw. spezielle begriffe raus (Name= DROP ’user’)
$firstname = htmlspecialchars($_POST["firstname"], ENT_QUOTES, "UTF-8");
$lastname = htmlspecialchars($_POST["lastname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$ID_Rights = (int) htmlspecialchars($_POST["ID_Rights"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($ID_Rights) && !empty($password))
{
    $userdata =
        [
            "login" => $login, 
            "firstname" => $firstname, 
            "lastname" => $lastname, 
            "email" => $email, 
            "ID_Rights" => $ID_Rights, 
            "hash" => password_hash($password, PASSWORD_DEFAULT)
        ];

    $user = new User($userdata);
    $userManager = new UserManager();
    $userManager->create($user);
    header('Location: User_Index.php');
}
else 
{
    echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
}?>
<a href="UserCreate_form.php"> <div class="submit">BACK</div></a>
</body>
</html>
