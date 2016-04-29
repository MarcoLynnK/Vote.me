<?php
require_once ("Manager.php");
require_once ("Classes.php");

// Read-Out von Rechten für den User nach der ID

class RightManager extends Manager
{
    protected $pdo;

    public function __construct($con)
    {
        parent::__construct($con);
    }

    public function __destruct()//Destruktor der pdo (auflösen/lösen der Connection zwischen der DB)
    {
        parent::__destruct();
    }

    // Rechte ausgeben
    public function findById ($ID_Rights)
    {
        try {
            $sql= $this->pdo-> prepare ('SELECT * from Rights WHERE ID_Rights = :ID_Rights');
            $sql-> bindParam (':ID_Rights', $ID_Rights);
            $sql-> execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Rights');
            $rights= $sql-> fetch();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        if (!$rights) $rights=null;
        return $rights;
    }
 /*
    //Rechte Aktualisieren
    public function update (Rights $rights) {
        try
        {
            $sql= $this->pdo->prepare ('UPDATE Rights SET description_Rights = :description_Rights WHERE ID_Rights = :ID_Rights');
            $sql->bindParam (':description_Rights',$rights->description_Rights);
            $sql->execute ();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $rights;
    }

    //rechte löschen
    public function delete (Rights $rights)
    {
        try {
            $sql = $this->pdo->prepare('DELETE FROM Rights WHERE ID_Rights= :ID_Rights');
            $sql->bindParam(':ID_Rights', $rights->ID_Rights);
            $sql->execute();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return null;
    }*/
}