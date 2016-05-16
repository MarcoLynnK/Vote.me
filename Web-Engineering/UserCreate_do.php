<?php// include("include/session_check.php"); ?>

<?php

require_once("Main/UserManager.php");
require_once("Main/Classes.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");//htmlspecialchars filtert aus der eingabe die Sonderzeichen bzw. spezielle begriffe raus (Name= DROP ’user’)
$firstname = htmlspecialchars($_POST["firstname"], ENT_QUOTES, "UTF-8");
$lastname = htmlspecialchars($_POST["lastname"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password))
{
    $userdata =
        [
        "login" => $login,
        "vorname" => $firstname,
        "nachname" => $lastname,
        "email" => $email,
        "hash" => password_hash($password, PASSWORD_DEFAULT)
        ];

    $user = new User($userdata);
    $userManager = new UserManager($user);
    $userManager->create($user);
    header('Location: Lecture_index.php');
}
else 
{
    echo "Bitte alle Felder ausfüllen!<br/>";
}