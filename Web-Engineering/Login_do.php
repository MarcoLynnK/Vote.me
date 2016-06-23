<?php
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$login=htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password=htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($password)) 
{
    $userManager= new UserManager();
    $user = $userManager->findByLogin($login, $password);//holt sich den User aus der Datenbank durch Suche nach dem Login und Passwort (verifizierung im Usermanager)
    if ($user==null)
    {
        echo ("steckst in der if schleife fest");
        /*header('Location: login.php');*/
        die();
    }
    else
    {
        session_start();
        $_SESSION ['user'] = $user->firstname." ".$user->lastname;
        $_SESSION ['login'] = "1";
        $_SESSION ['ID_Rights'] = $user->ID_Rights;
        header('Location: index.php');//direkte weiterleitung auf index.php durch 'Location:
        die();
    }
    
} 
else {
        echo "Error: Bitte alle Felder ausfüllen!<br/>";
     }