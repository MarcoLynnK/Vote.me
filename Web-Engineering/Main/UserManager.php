<?php
require_once ("Manager.php");
require_once ("Classes.php");

//CRUD Applikation User

class UserManager extends Manager
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

    //User auslesen aus DB
    public function findByLogin ($login, $passwort) {

        try {
            $sql= $this->pdo->prepare('SELECT * FROM User WHERE login= :login');
            $sql->bindParam(':login', $login);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $sql->fetch();

            if (password_verify($passwort, $user->hash)) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e){
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return null;
    }

    // User anlegen
    public function create (User $user) {
        try {
            $sql= $this->pdo->prepare ('INSERT INTO Dozent (login, vorname, nachname, hash) VALUES (:login, :vorname , :nachname, :hash)');
            $sql->bindParam (':login', $user->login);
            $sql->bindParam (':vorname',$user->vorname);
            $sql->bindParam (':nachname'.$user->nachname);
            $sql->bindParam (':hash', $user->hash);
            $sql->execute ();
            $sql->setFetchMode (PDO::FETCH_CLASS,'User');
            $user= $sql->fetch();
        }
        catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $user;
    }

    //User aktualisieren
    public function update (User $user) {
        try
        {
            $sql= $this->pdo->prepare ('UPDATE Dozent SET vorname = :vorname,nachname = :nachname,hash = :hash, rights= :rights WHERE login = :login');
            $sql->bindParam (':vorname',$user->vorname);
            $sql->bindParam (':nachname',$user->nachname);
            $sql->bindParam (':hash', $user->hash);
            $sql->bindParam (':rights', $user->rights);
            $sql->execute ();
        }
        catch (PDOException $e) 
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $user;
    }
    
    //User Löschen
    public function delete (User $user) {
        try {
            $sql = $this->pdo->prepare('DELETE FROM Dozent WHERE login= :login');
            $sql->bindParam(':login', $user->login);
            $sql->execute();
            }
        catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $user;
            }
        return null;
    }
}

