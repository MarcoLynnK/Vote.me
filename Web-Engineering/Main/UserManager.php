<?php
require_once ("Manager.php");
require_once ("Classes.php");

//CRUD Applikation User

class UserManager extends Manager
{
   //protected $pdo;

    public function __construct($con=null)
    {
        parent::__construct($con);
    }

    public function __destruct()//Destruktor der pdo (auflösen/lösen der Connection zwischen der DB)
    {
        parent::__destruct();
    }

    //Auslesen des Users durch die ID--> nur Admin
    public function findById ($ID_User)
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
    
    //User auslesen aus DB--> für login Admin/user
    public function findByLogin ($login, $password) {
        
        try
        {

            // ID des gesuchten Users durch login aus der Datenbank holen
            $sql = $this->pdo->prepare("SELECT ID_User FROM User WHERE login = :param");
            $sql->bindParam(':param',$login);
            $sql->setFetchMode(PDO::FETCH_ASSOC);//gibt Daten als Asoziativen Array zurück
            $sql->execute();
            $daten = $sql->fetch();

            $id = $daten["ID_User"];

            $user = $this->findById($id);
            
            echo "<br>";

            if (password_verify($password, $user->hash)) 
            {
                return $user;
            } 
            else 
            {
                return null;
            }
        } 
        catch (Exception $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }

    // Auslesen aller Datensätze aus Table "User"--> für User_Index, nur Admin
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

    // User anlegen--> nur Admin
    public function create (User $user)
    {
        try 
        {
            $sql= $this->pdo->prepare ('INSERT INTO User (login, firstname, lastname, email, ID_Rights, hash) VALUES (:login, :firstname , :lastname, :email, :ID_Rights, :password)');
            $sql->bindParam (':login', $user->login);
            $sql->bindParam (':firstname',$user->firstname);
            $sql->bindParam (':lastname',$user->lastname);
            $sql->bindParam (':email',$user->email);
            $sql->bindParam (':ID_Rights',$user->ID_Rights);
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

    //User aktualisieren--> nur Admin
    public function update (User $user) 
    {
        try
        {
            $sql= $this->pdo-> prepare ('UPDATE User SET login= :login, firstname = :firstname, lastname = :lastname, hash = :password, ID_Rights= :ID_Rights, email= :email WHERE ID_User = :ID_User');
            $sql->bindParam (':ID_User', $user->ID_User);
            $sql->bindParam (':login', $user->login);
            $sql->bindParam (':firstname',$user->firstname);
            $sql->bindParam (':lastname',$user->lastname);
            $sql->bindParam (':email',$user->email);
            $sql->bindParam (':password', $user->hash);
            $sql->bindParam (':ID_Rights', $user->ID_Rights);
            $sql->execute ();
        }
        catch (PDOException $e) 
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $user;
    }
    
    //User Löschen--> nur Admin
    public function delete (User $user) 
    {
        try 
        {
            $sql = $this->pdo-> prepare('DELETE FROM User WHERE ID_User= :ID_User');
            $sql->bindParam(':ID_User', $user->ID_User);
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

