<?php
require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($password)) {
    $dozentmanagerManager = new DozentManager();
    $user = $userManager->findByLogin($login, $password);//holt sich den User aus der Datenbank durch Suche nach dem Login
    if ($user==null) {
        //header('Location: login.php');
        die();
    } else {
        session_start();
        $_SESSION ['user'] = $user;
        $_SESSION ['login'] = "1";
        $_SESSION ['rights'] = $user ['rights'];
        //header('Location: index.php');//direkte weiterleitung auf index php durch 'Location:
        die();

        print_r ($_SESSION);
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";