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
        echo "Error: Bitte alle Felder ausfüllen!<br/>";
     }