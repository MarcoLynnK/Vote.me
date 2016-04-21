<?php
require_once ("Manager.php");
require_once ("include/Classes.php");

class DozentManager extends Manager
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
            $sql= $this->pdo->prepare('SELECT * from Dozent where login= :login');
            $sql->bindParam(':login', $login);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
            $dozent = $sql->fetch();

            if (password_verify($passwort, $dozent->hash)) {
                return $dozent;
            } else {
                return null;
            }
        } catch (PDOException $e){
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return null;
    }

    public function create (Dozent $dozent) {
        try {
            $sql= $this->pdo->prepare ('INSERT INTO Dozent (login, vorname, nachname, hash) VALUES (:login, :vorname , :nachname, :hash)');
            $sql->bindParam (':login', $dozent->login);
            $sql->bindParam (':vorname',$dozent->vorname);
            $sql->bindParam (':nachname'.$dozent->nachname);
            $sql->bindParam (':hash', $dozent->hash);
            $sql->execute ();
            $sql->setFetchMode (PDO::FETCH_CLASS,'Dozent');
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
            $sql= $this->pdo->prepare ('UPDATE Dozent SET vorname = :vorname,nachname = :nachname,hash = :hash WHERE login = :login');
            $sql->bindParam (':vorname',$dozent->vorname);
            $sql->bindParam (':nachname',$dozent->nachname);
            $sql->bindParam (':hash', $dozent->hash);
            $sql->execute ();
        }
        catch (PDOException $e) 
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $dozent;
    }
    
    public function delete (Dozent $dozent) {
        try {
            $sql = $this->pdo->prepare('DELETE FROM Dozent WHERE login= :login');
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

