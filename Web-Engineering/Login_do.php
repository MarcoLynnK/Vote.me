<?php
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$login=htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password=htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($password)) 
{
    $userManager= new UserManager();
    $user = $userManager->findByLogin($login, $password);//holt sich den User aus der Datenbank durch Suche nach dem Login
    if ($user==null)
    {
        header('Location: index.php');
        die();
    }
    else
    {
        session_start();
        $_SESSION ['user'] = $user->firstname." ".$user->lastname;;
        $_SESSION ['login'] = "1";
        $_SESSION ['rights'] = $user->rights;
        header('Location: index.php');//direkte weiterleitung auf index php durch 'Location:
        die();
    }

} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
    }