<?php
require_once ("Manager.php");
require_once ("Classes.php");

//CRUD Applikation Vorlesungen

class ReslutManager extends Manager
{
    protected $pdo;

    public function __construct($con=null)
    {
        parent::__construct($con);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    // alle Ergebnisse ausgeben

    public function findAll ()
    {
        try
        {
            $sql= $this->pdo-> prepare ('SELECT * FROM Result');
            $sql->execute();
            $sql->setFetchMode (PDO::FETCH_CLASS, 'Result');
            return $sql-> FetchAll();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
    }

    //Alle Ergebnisse mit der bestimmten ID ausgeben

    public function findById (Result $ID_Result)
    {
        try {
            $sql= $this->pdo-> prepare ('SELECT * FROM Result WHERE ID_Result = :ID_Result');
            $sql-> bindParam (':ID_Result', $ID_Result);
            $sql-> execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Result');
            $result= $sql-> fetch();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        if (!$result) $result=null;
        return $result;
    }

    //Ergebnis erstellen in der DB anlegen
    public function create (Result $result)
    {

        try {
            $stmt = $this->pdo->prepare('SELECT count * FROM Result WHERE ID_Voting= :ID_Voting AND ID_Chance= :ID_Chance');
            $stmt->bindParam(':ID_Chance', $result->ID_Chance);
            $stmt->bindParam(':ID_Voting', $result->ID_Voting);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $result;
    }

    //Vorlesung in der DB aktualisieren

    public function update (Lecture $lecture)
    {
        try {
            $stmt = $this->pdo->prepare('UPDATE Lecture SET name_Lecture = :name_Lecture, degreecourse = :degreecourse, faculty= :faculty WHERE ID_Lecture = :ID_Lecture');
            $stmt->bindParam(':ID_Lecture', $lecture->ID_Lecture);
            $stmt->bindParam(':name', $lecture->name_Lecture);
            $stmt->bindParam(':degreecourse', $lecture->degreecourse);
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $lecture;
    }

    //Vorlesung in der DB Löschen

    public function delete (Lecture $lecture)
    {
        try {
            $sql = $this->pdo->prepare('DELETE FROM Lecture WHERE ID_Lecture= :ID_Lecture');
            $sql->bindParam(':ID_Lecture', $lecture->ID_Lecture);
            $sql->execute();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return null;
    }
}