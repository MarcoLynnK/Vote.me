<?php
require_once ("Manager.php");
require_once ("include/Classes.php");

class Dozent extends Manager
{
    protected $pdo;

    public function __construct($con)
    {
        parent::__construct($con);
    }

    public function __destruct()//Destruktor der pdo (auflösen/lösen der Connection zwischen der DB)
    {
        parent::__destruct(); //
    }

    public function findByLogin ($login, $passwort) {

        try {
            $sql = $this->pdo->prepare('SELECT * from Dozent where login= :login');
            $sql = $this->bindParam(':login', $login);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'User');
            $dozent = $sql->fetch();

            if (password_verify($passwort, $dozent->hash)) {//beginn einer If-Anweisung mit der Methode password_verify und den parametern $passwort und $user als hashwert
                return $dozent;//ausgabe des Dozenten
            } else {//beginn des elsblocks
                return null;
            }
        } catch (PDOException $e){
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return null;
    }
    echo'Hallo';
    public function create (Dozent $dozent) {
        try {
            $sql= $this->pdo->prepare ('INSERT INTO User (login, vorname, nachname, hash) VALUES (:login, :vorname , :nachname, :hash)');
            $sql= $this->bindParam (':login', $dozent->login);
            $sql= $this->bindParam (':vorname',$dozent->vorname);
            $sql= $this->bindParam (':nachname'.$dozent->nachname);
            $sql= $this->bindParam (':hash', $dozent->hash);
            $sql->execute ();
            $sql->setFetchMode (PDO::FETCH_CLASS,'User');
            $dozent= $sql->fetch();
        }
        catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $dozent;

    }
    public function update (Dozent $dozent) {
        try
        {
            $sql= $this->pdo->prepare ('UPDATE user SET vorname = :vorname,nachname = :nachname,hash = :hash WHERE login = :login');
            $sql->bindParam (':vorname',$dozent->vorname);
            $sql->bindParam (':nachname',$dozent->nachname);
            $sql->bindParam (':hash', $dozent->hash);
            $sql->execute ();
        }
        catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $dozent;
    }
    public function delete (Dozent $dozent) {
        try {
            $sql = $this->pdo->prepare('DELETE FROM user WHERE login= :login');
            $sql->bindParam(':login', $dozent->login);
            $sql->execute();

        }
        catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $dozent;
        }
        return null;
    }
}

