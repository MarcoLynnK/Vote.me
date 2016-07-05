<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<title>User Update</title>
<body>
<?php
include ("Main/Session_Check.php");
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

/*
 * Werte aus dem Formular übergeben 
 */

$ID_User= htmlspecialchars($_POST["ID_User"], ENT_QUOTES, "UTF-8");
$login= htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$firstname= htmlspecialchars($_POST["firstname"],ENT_QUOTES,"UTF-8");
$lastname= htmlspecialchars($_POST["lastname"],ENT_QUOTES,"UTF-8");
$email= htmlspecialchars($_POST["email"],ENT_QUOTES,"UTF-8");
$ID_Rights = htmlspecialchars($_POST["ID_Rights"], ENT_QUOTES, "UTF-8");

//nach erfüllter Bedingung aktualisieren der Werte durch die neu eingegebenen durch den UserManager (update)
if (!empty ($ID_User) && !empty($login) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($ID_Rights))
{
    /*
     * Neuer Usermanager
     */
    $userManager = new UserManager();

    /*
     * holt sich den User aus der Datenbank durch Suche nach der ID
     */
    $user = $userManager->findById($ID_User);
    
    /*
     * übergabe der neuen Werte in Objekt User
     */
    $user->ID_User= $ID_User;
    $user->login = $login;
    $user->firstname= $firstname;
    $user->lastname= $lastname;
    $user->email= $email;
    $user->ID_Rights= $ID_Rights;
    
    /*
     * Update durch Usermanager mit neuem Objekt User
     */
    $userManager-> update ($user);
    header ('Location: User_Index.php');
}

else 
{
    echo "<a class='text2'>Error: Please fill out all fields!</a><br/>";
}?>
<a href="UserUpdate_form.php"> <div class="submit">BACK</div></a>
</body>
</html>