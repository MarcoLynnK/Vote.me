<?php
require_once ("Manager.php");
require_once ("Classes.php");

//CRUD Applikation Möglichkeiten/Optionen für das Voting (Antworten)
class ChanceManager extends Manager
{
    
    public function __construct($con=null)
    {
        parent::__construct($con=null);
    }
    public function __destruct()
    {
        parent::__destruct();
    }
    
    //Alle Datensätze(Möglichkeiten auslesen
    public function findAll ()
    {
        try
        {
            $sql= $this->pdo-> prepare ('SELECT * FROM Chance');
            $sql->execute();
            $sql->setFetchMode (PDO::FETCH_CLASS, 'Chance');
            return $sql-> FetchAll();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
    }

    //Auslesen aller Datensätze aus Chance mit ID_User
    public function findAllbyIDUser ($ID_User)
    {
        try
        {
            $sql= $this->pdo->prepare ('SELECT * FROM Chance WHERE ID_User = :ID_User');
            
            $sql->bindParam(':ID_User', $ID_User);
            $sql->execute ();
            
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Chance');
            $chance = $sql->fetchAll();
        }
        catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        if (!$chance) {echo "Ergebnis aus der Datenbank war false.";}
        
        return $chance;
    }

    //Auslesen der Möglichkeit nach der ID aus der DB
    public function findById ($ID_Chance)
    {
        try {
            $sql= $this->pdo-> prepare ('SELECT * FROM Chance WHERE ID_Chance = :ID_Chance');
            $sql-> bindParam (':ID_Chance', $ID_Chance);
            $sql-> execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Chance');
            $chance= $sql-> fetch();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        if (!$chance) $option=null;
        return $chance;
    }

    //Neue Möglichkeit in der DB anlegen
     public function create (Chance $chance)
     {
         try {
             $sql = $this->pdo->prepare('INSERT INTO Chance (ID_Voting, ID_User, description_Chance) VALUES (:ID_Voting, :ID_User, :description_Chance)');

             $sql->bindParam(':description_Chance', $chance->description_Chance);
             $sql->bindParam(':ID_Voting', $chance->ID_Voting);
             $sql->bindParam(':ID_User', $chance->ID_User);

             $sql->execute();

             $sql->setFetchMode(PDO::FETCH_CLASS, 'Chance');
             $chance = $this->findById($this->pdo->lastInsertId());
         }
         catch (PDOException $e)
         {
             echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
             die();
         }
         return $chance;
     }
    //Möglichkeit aktualisieren/ändern
    public function update (Chance $chance)
    {
        try
        {
            $sql= $this->pdo->prepare ('UPDATE Chance SET description_Chance = :description_Chance WHERE ID_Chance = :ID_Chance');
            $sql->bindParam (':description_Chance',$chance->description_Chance);
            $sql->bindParam(":ID_Chance", $chance->ID_Chance);
            $sql->execute ();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $chance;
    }
    
    //Möglichkeit aus der DB löschen
    public function delete (Chance $chance)
    {
        try 
        {
            $sql = $this->pdo->prepare('DELETE FROM Chance WHERE ID_Chance= :ID_Chance');
            $sql->bindParam(':ID_Chance', $chance->ID_Chance);
            $sql->execute();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return null;
    }
    
    //Check vor auslese der Möglichkeiten ID_User
    public function checkRights ($ID_Chance, $ID_User)
    {
        $chance= $this->findById($ID_Chance);
            if ($chance->ID_User==$ID_User)
            {
                return true;
            }
            else 
            {
               header('location: login.php'); 
            }
    }
}
    