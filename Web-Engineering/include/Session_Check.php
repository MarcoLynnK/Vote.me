<?php
require_once("include/Classes.php");//einmaliges Einbinden der Klasse User (require--> code bricht ab, wenn ein Fehler entsteht)

session_start();// Es wird auf die Methode Session_start zugegriffen--> eine Session wird gestartet
if ($_SESSION ["login"]<>"1") {//start eines If-Blocks mit dem wert Login aus $_Session und der Bedingung, wenn Der wert "login" ungleich 1 ist
    $_SESSION = array();//Zuweisung des Wertes aus $_SESSION durch aufruf der Methode Array (Wenn bedingung erfüllt, wird Session mit einem leeren Array befüllt)
    session_destroy();//Session wird zertört
    header('Location: login.php');//direkte weiterleitung zur Loginseite (login.php)
} else {//beginn des else-blocks
    $user = $_SESSION ["user"]; //Der Variable User wir der Wert aus des $_Session mit dem Wert User übergeben.
}
?>