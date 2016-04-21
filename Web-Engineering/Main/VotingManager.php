<?php
require_once ("Manager.php");
require_once ("Classes.php");

class VotingManager extends Manager
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

    public function findAll ()
    {
        try
        {
            $sql= $this->pdo-> prepare ('SELECT * FROM Voting');
            $sql->execute();
            $sql->setFetchMode (PDO::FETCH_CLASS, 'Voting');
            return $sql-> FetchAll();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
    }

    public function findById ($idvoting)
    {
        try {
            $sql= $this->pdo-> prepare ('SELECT * FROM Voting WHERE idvoting = :idvoting');
            $sql-> bindParam (':idvoting', $idvoting);
            $sql-> execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            $voting= $sql-> fetch();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        if (!$voting) $voting=null;
        return $voting;
    }

    public function create (Voting $voting)
    {
        try {
            $sql = $this->pdo->prepare('INSERT INTO Voting (idvoting, name, question) VALUES (:idvoting, :name, :question');
            $sql->bindParam(':idvoting', $voting->idvoting);
            $sql->bindParam(':name', $voting->name);
            $sql->bindParam(':question', $voting->question);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            $voting = $sql->fetch();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        return $voting;
    }

    public function delete (Voting $voting)
    {
        try {
            $sql = $this->pdo->prepare('DELETE FROM Voting WHERE idvoting= :idvoting');
            $sql->bindParam(':idvoting', $voting->idvoting);
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