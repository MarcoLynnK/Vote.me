<?php
require_once("UserData.php");
class Manager //Klasse Manager erstellen-für generellen Zugriff auf die DB durch den Manager via eingelesener UserData
{
    protected $pdo;//zugriff auf pdo der Klasse Manager

    public function __construct ($con=null)//constructor erstellen für neuen Verbindungsweg, falls Bedingung erfüllt (Parameter = 0)
    {
        try {
            $this->pdo = $con;//erstellen einer Verbindung mit der DB durch PDO
                if ($this->pdo===null)
                {
                    $this->pdo = new PDO (
                        UserData::$dsn,//zugriff auf Zugangsdaten durch UserData (statische Atribute/Klasse)
                        UserData::$dbuser,
                        UserData::$dbpass);
                }
            }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
    }

    public function __destruct()//Destruktor der pdo (auflösen/lösen der Connection zwischen der DB)
    {
        $this->pdo=null;
    }

}
