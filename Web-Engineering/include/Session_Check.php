<?php
require_once("../Main/Classes.php");
require_once("RightsCheck.php");

session_start();
if ($_SESSION ["login"]<>"1") {
    $_SESSION = array();
    session_destroy();
    header('Location: login.php');
} else {
    $user = $_SESSION ["user"];
    $user = $_SESSION ["rights"];
}
?>