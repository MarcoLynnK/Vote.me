<?php
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($password)) {
    $dozentManager = new DozentManager();
    $dozent = $dozentManager->findByLogin($login, $password);//holt sich den User aus der Datenbank durch Suche nach dem Login
    if ($dozent==null) {
        header('Location: login.php');
        die();
    } 
    else {
        session_start();
        $_SESSION ['Dozent'] = $dozent;
        $_SESSION ['login'] = "1";
        header('Location: index.php');//direkte weiterleitung auf index php durch 'Location:
        die();
    }
}
else{
    echo "Error: Bitte füllen sie alle Felder aus!<br/>";
    }