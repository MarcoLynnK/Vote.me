<?php
//Dieses Skript ist die Zentrale Verwaltung für die Auslese der Zugehörigkeit von Voting und Chance, sowie die auslese der Anzahl für das Result
require_once ("Manager.php");
require_once ("Classes.php");

/*
 * Manager zum Auslesen der Antwortmöglichkeiten für das Voting aus der DB (oder umgekehrt)
 * sowie Countfunktion für das Ausgeben einer Anzahl für das VotingResult
 */
class VotingChanceManager extends Manager
{

    //Konstruktor und Destruktor von Mutterklasse Manager einbinden
    public function __construct($con=null)
    {
        parent::__construct($con);
    }

    public function __destruct()
    {
        parent::__destruct();
    }


    /*
     * Auslesen aller Möglichkeiten anhand des zugehörigen Votings durch ID_Voting
     */
    public function findAllChancesByVotingId($ID_Voting)
    {
        try
        {
            $sql = $this->pdo->prepare('SELECT * FROM Chance WHERE ID_Voting = :ID_Voting');
            $sql->bindParam(':ID_Voting', $ID_Voting);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Chance');
            return $sql->fetchAll();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }



    /*
     * Alle Votings durch die Möglichkeit finden (öffene Schnittstelle für random Ausgabe der Möglichkeiten bei m zu n Beziehung in DB)
     */

    /*public function findAllVotingByChances(Chance $chance)
    {
        try
        {
            $sql = $this->pdo->prepare('SELECT * FROM Lecture WHERE ID_Chance= :ID_Chance');
            $sql->bindParam(':ID_Chance', $chance->ID_Chance);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Lecture');
            return $sql->fetchAll();
        } 
        catch (PDOException $e) 
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
    }*/



    /*
     * Countmethode für das Zählen der Datensätze in der DB mit Übereinstimmung von VotingID und ChanceID
     * für die Ausgabe in VotingResult (Grafik)
     */
    public function countVotingChance($ID_Voting, $ID_Chance)
    {
        
        $statement = "SELECT COUNT(*) FROM Result WHERE ID_Voting = :votingid AND ID_Chance = :chanceid";
        $sql = $this->pdo->prepare($statement);
        $sql->bindParam("votingid", $ID_Voting);
        $sql->bindParam("chanceid", $ID_Chance);
        
        $sql->execute();
        
        $sql->setFetchMode(PDO::FETCH_NUM);
        
        $result = $sql->fetchAll();
        
        $result = $result[0][0];
        
        return $result;
        
    }
}