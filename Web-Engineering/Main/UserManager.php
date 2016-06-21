<?php
require_once ("Manager.php");
require_once ("Classes.php");

//CRUD Applikation User

class UserManager extends Manager
{
    protected $pdo;

    public function __construct($con=null)
    {
        parent::__construct($con);
    }

    public function __destruct()//Destruktor der pdo (auflösen/lösen der Connection zwischen der DB)
    {
        parent::__destruct(); //
    }

    public function findById (User $ID_User)
    {
        try {
            $sql= $this->pdo-> prepare ('SELECT * FROM User WHERE ID_User= :ID_User');
            $sql-> bindParam (':ID_User', $ID_User);
            $sql-> execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user= $sql-> fetch();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        if (!$user) $user=null;
        return $user;
    }
    
    //User auslesen aus DB
    public function findByLogin ($login, $password) {

        try 
        {
            $sql= $this->pdo->prepare('SELECT * FROM User WHERE login= :login');
            $sql->bindParam(':login', $login);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $sql->fetch();

            if (password_verify($password, $user->hash)) 
            {
                return $user;
            } 
            else 
            {
                return null;
            }
        } 
        catch (PDOException $e) 
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }

    // Auslesen aller Datensätze aus Table "User"
    public function findAll ()
    {
        try
        {
            $sql= $this->pdo->prepare ('SELECT * FROM User');
            $sql->execute();
            $sql->setFetchMode (PDO::FETCH_CLASS, 'User');
            return $sql-> FetchAll();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
    }

    // User anlegen
    public function create (User $user)
    {
        try 
        {
            $sql= $this->pdo->prepare ('INSERT INTO User (login, firstname, lastname, email, rights, hash) VALUES (:login, :firstname , :lastname, :email, :rights, :hash)');
            $sql->bindParam (':login', $user->login);
            $sql->bindParam (':firstname',$user->firstname);
            $sql->bindParam (':lastname'.$user->lastname);
            $sql->bindParam (':email'.$user->email);
            $sql->bindParam (':rights'.$user->rights);
            $sql->bindParam (':password', $user->hash);
            $sql->execute ();
            $sql->setFetchMode (PDO::FETCH_CLASS,'User');
            $user= $sql->fetch();
        }
        catch (PDOException $e) 
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $user;
    }

    //User aktualisieren
    public function update (User $user) 
    {
        try
        {
            $sql= $this->pdo-> prepare ('UPDATE User SET firstname = :firstname, lastname = :lastname, hash = :hash, rights= :rights, email= :email WHERE login = :login');
            $sql->bindParam (':vorname',$user->firstname);
            $sql->bindParam (':nachname',$user->lastname);
            $sql->bindParam (':email',$user->email);
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
    public function delete (User $user) 
    {
        try 
        {
            $sql = $this->pdo-> prepare('DELETE FROM User WHERE login= :login');
            $sql->bindParam(':login', $user->login);
            $sql->execute();
        }
        catch (PDOException $e) 
        {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $user;
        }
        return null;
    }
}

