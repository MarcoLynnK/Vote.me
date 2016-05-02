<?php
require_once ("Manager.php");
require_once ("Classes.php");

//CRUD Applikation Möglichkeiten/Optionen für das Voting (Antworten)
class VotingChanceManager extends Manager
{
    protected $pdo;

    public function __construct($con)
    {
        parent::__construct($con);
    }

    public function __destruct()
    {
        parent::__destruct();
    }


    public function findAllChanceByVoting(Voting $voting)
    {
        try {
            $sql = $this->pdo->prepare('SELECT * FROM Chance WHERE ID_Voting = $voting->ID_Voting;');
            $sql->bindParam(':ID_Voting', $voting->ID_Voting);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Chance');
            return $sql->fetchAll();
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }

    public function findAllVotingByChance(Chance $chance)
    {
        try {
            $sql = $this->pdo->prepare('SELECT * FROM Voting WHERE ID_Chance= $chance->ID_Chance');
            $sql->bindParam(':ID_Chance', $chance->ID_Chance);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $sql->fetchAll;
        } catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }
}
