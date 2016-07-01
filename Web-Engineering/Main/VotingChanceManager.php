<?php
require_once ("Manager.php");
require_once ("Classes.php");

//Manager zum Auslesen der Antwortmöglichkeiten für das Voting aus der DB
class VotingChanceManager extends Manager
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
    
    public function findAllChancesByVoting(Voting $voting)
    {
        try
        {
            $sql = $this->pdo->prepare('SELECT * FROM Chance WHERE ID_Voting = :ID_Voting;');
            $sql->bindParam(':ID_Voting', $voting->ID_Voting);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Chance');
            $sql->fetchAll();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }

    }

    public function findAllVotingByChances(Chance $chance)
    {
        try
        {
            $sql = $this->pdo->prepare('SELECT * FROM Lecture WHERE ID_Chance= :ID_Chance');
            $sql->bindParam(':ID_Chance', $chance->ID_Chance);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Lecture');
            return $sql->fetchAll();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }
}