<?php
require_once ("Manager.php");
require_once ("Classes.php");


// CRUD Applikation für Voting

class VotingManager extends Manager
{
    

    public function __construct($con = null)
    {
        parent::__construct($con);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    // Auslesen aller Datensätze aus Voting
    public function findAll()
    {
        try {
            $sql = $this->pdo->prepare('SELECT * FROM Voting');
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $sql->FetchAll();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }
    //Auslesen aller Datensätze aus Voting mit ID_User
    public function findAllbyIDUser ($ID_User)
    {
        try 
        {
            $sql= $this->pdo->prepare ('SELECT * FROM Voting WHERE ID_User=:ID_User');
            $sql->bindParam(':ID_User', $ID_User);
            $sql->execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            $voting = $sql->fetch();
        }
        catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
            }
        if (!$voting) $voting = null;
        return $voting;
    }
    
    //Auslesen aller Datensätze mit der übergebenen ID
    public function findById($ID_Voting)
    {
        try {
            $sql = $this->pdo->prepare('SELECT * FROM Voting WHERE ID_Voting = :ID_Voting');
            $sql->bindParam(':ID_Voting', $ID_Voting);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            $voting = $sql->fetch();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        if (!$voting) $voting = null;
        return $voting;
    }

    // Erstellen eines neuen Votings (Datensatz) in der DB
    public function create(Voting $voting)
    {
        try {
            $sql = $this->pdo->prepare('INSERT INTO Voting (ID_Lecture, ID_User, name_Voting, question_Voting, Status) VALUES (:lectureId, :userId, :name, :question, :status)');
            
            $sql->bindParam("lectureId", $voting->ID_Lecture);
            $sql->bindParam("userId", $voting->ID_User);
            $sql->bindParam("name", $voting->name_Voting);
            $sql->bindParam("question", $voting->question_Voting);
            $sql->bindParam("status", $voting->Status);
           
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            $voting = $sql->fetch();
            
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        return $voting;
    }

    //update Voting
    public function update(Voting $voting)
    {
        try {
            $sql = $this->pdo->prepare('UPDATE Voting SET name_Voting = :name_Voting, question_Voting= :question_Voting WHERE :ID_Voting= ID_Voting');
            $sql->bindParam(':ID_Voting', $voting->ID_Voting);
            $sql->bindParam(':name_Voting', $voting->name_Voting);
            $sql->bindParam(':question_Voting', $voting->question_Voting);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            $voting = $sql->fetch();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        return $voting;

    }

    //Löschen des Votings mit der übergebenen ID aus der DB
    public function delete(Voting $voting)
    {
        try {
            $sql = $this->pdo->prepare('DELETE * FROM Voting WHERE ID_Voting= :ID_Voting');
            $sql->bindParam(':ID_Voting', $voting->ID_Voting);
            $sql->execute();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        return null;
    }

}