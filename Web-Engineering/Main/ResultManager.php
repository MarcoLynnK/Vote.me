<?php
require_once ("Manager.php");
require_once ("Classes.php");

//CRUD Applikation Vorlesungen

class ResultManager extends Manager
{
    protected $pdo;

    public function __construct($con = null)
    {
        parent::__construct($con);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    // alle Ergebnisse ausgeben

    public function findAll()
    {
        try {
            $sql = $this->pdo->prepare('SELECT * FROM Result');
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Result');
            return $sql->FetchAll();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }

    //Alle Ergebnisse mit der bestimmten Datum aus DB auslesen

    public function findBydate(Result $date_Result)
    {
        try {
            $sql = $this->pdo->prepare('SELECT * FROM Result WHERE date_Result = :date_Result');
            $sql->bindParam(':date_Result', $date_Result);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Result');
            $result = $sql->fetch();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        if (!$result) $result = null;
        return $result;
    }

    //Ergebnis erstellen in der DB anlegen (abstimmen pro Student)

    public function create(Result $result)
    {

        try {
            $stmt = $this->pdo->prepare('INSERT INTO Result (date_Result, ID_Session, ID_Chance, ID_Voting) VALUES (:date_Result, :ID_Session, :ID_Chance, :ID_Voting)');
            $stmt->bindParam(':date_Result', $result->date_Result);
            $stmt->bindParam(':ID_Session', $result->ID_Session);
            $stmt->bindParam(':ID_Chance', $result->ID_Chance);
            $stmt->bindParam(':ID_Voting', $result->ID_Voting);
            $stmt->execute();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        return $result;
    }

    //Ergebnis aus der DB auslesen mit Voting ID

    public function resultdo (Result $result)
    {
        try {
            $sql = $this->pdo->prepare('SELECT COUNT * FROM Result WHERE ID_Voting= :ID_Voting AND ID_Chance= :ID_Chance');
            $sql->bindParam(':ID_Voting', $result->ID_Voting);
            $sql->bindParam(':ID_Chance', $result->ID_Chance);
            $sql->execute();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        return $result;
    }

    //Ergebnis aus DB löschen

    public function delete(Result $result)
    {
        try {
            $sql = $this->pdo->prepare('DELETE FROM User WHERE ID_Result= :ID_Result');
            $sql->bindParam(':ID_Result', $result->ID_Result);
            $sql->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $result;
        }
        return null;
    }
}