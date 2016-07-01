<?php
require_once ("Manager.php");
require_once ("Classes.php");


class LectureVotingManager extends Manager
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
    
    public function findAllVotingByLecture(Lecture $lecture)
    {
        try 
        {
            $sql = $this->pdo->prepare('SELECT * FROM Voting WHERE ID_Lecture = :ID_Lecture;');
            $sql->bindParam(':ID_Lecture', $lecture->ID_Lecture);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $sql->fetchAll();
        } 
        catch (PDOException $e) 
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }

    public function findAllLectureByVoting(Voting $voting)
    {
        try 
        {
            $sql = $this->pdo->prepare('SELECT * FROM Lecture WHERE ID_Voting= :ID_Voting');
            $sql->bindParam(':ID_Voting', $voting->ID_Voting);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Lecture');
            return $sql->fetchAll;
        } 
        catch (PDOException $e) 
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }
}