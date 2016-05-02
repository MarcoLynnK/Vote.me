<?php
require_once("Main/LectureManager.php");
require_once("Main/Classes.php");

//Werte aus dem Formular übergeben

$ID_User= htmlspecialchars($_POST["ID_User"], ENT_QUOTES, "UTF-8");
$login= htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$firstname= htmlspecialchars($_POST["firstname"],ENT_QUOTES,"UTF-8");
$lastname= htmlspecialchars($_POST["lastname"],ENT_QUOTES,"UTF-8");
$email= htmlspecialchars($_POST["email"],ENT_QUOTES,"UTF-8");
$password= htmlspecialchars($_POST["password"],ENT_QUOTES,"UTF-8");

//nach erfüllter Bedingung aktualisieren der Werte durch die neu eingegebenen durch den UserManager (update)
if (!empty ($ID_User) && !empty($login) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password))
{
    $userManager = new UserManager($user);
    $user = $userManager->findById($ID_User);//holt sich die Möglichkeit aus der Datenbank durch Suche nach der ID
    $user->login = $login;
    $user->firstname= $firstname;
    $user->lastname= $lastname;
    $user->email= $email;
    $user->password= $password;
    $userManager-> update ($user);
    header ('Location: index.php');

    if ($user==null)
    {
        header('Location: login.php');
        die();
    }
}

else 
{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
}