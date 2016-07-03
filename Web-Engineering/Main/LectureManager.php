<?php
require_once ("Manager.php");
require_once ("Classes.php");

//CRUD Applikation Vorlesungen

class LectureManager extends Manager
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

    // alle Vorlesungen ausgeben
    public function findAll ()
    {
        try
        {
            $sql= $this->pdo-> prepare ('SELECT * FROM Lecture');
            $sql->execute();
            $sql->setFetchMode (PDO::FETCH_CLASS, 'Lecture');
            return $sql-> FetchAll();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
    }

    //Auslesen aller Datensätze aus Lecture mit ID_User
    public function findAllbyIDUser ($ID_User)
    {
        try
        {
            $sql= $this->pdo->prepare ('SELECT * FROM Lecture WHERE ID_User=:ID_User');
            $sql->bindParam(':ID_User', $ID_User);
            $sql->execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Lecture');
            $lecture = $sql->fetch();
        }
        catch (PDOException $e) {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        if (!$lecture) $lecture = null;
        return $lecture;
    }
    
    //Alle Vorlesungen mit der bestimmten ID ausgeben
    public function findById ($ID_Lecture)
    {
        try {
            $sql= $this->pdo-> prepare ('SELECT * FROM Lecture WHERE ID_Lecture = :ID_Lecture');
            $sql-> bindParam (':ID_Lecture', $ID_Lecture);
            $sql-> execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Lecture');
            $lecture= $sql-> fetch();
            }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        if (!$lecture) $lecture=null;
        return $lecture;
    }

    //Vorlesung in der DB anlegen

    public function create (Lecture $lecture)
    {
        try
        {
            $sql = $this->pdo->prepare('INSERT INTO Lecture (`name_Lecture`, `degreecourse`, `ID_User`) VALUES (:name, :course, :userid)');
            $sql->bindParam(":name", $lecture->name_Lecture);
            $sql->bindParam(":course", $lecture->degreecourse);
            $sql->bindParam(":userid", $lecture->ID_User);
            $sql->execute();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        return $lecture;
    }
    //Vorlesung in der DB aktualisieren

    public function update (Lecture $lecture)
    {
        try {
            $sql = $this->pdo->prepare('UPDATE Lecture SET name_Lecture = :name_Lecture, degreecourse = :degreecourse WHERE ID_Lecture = :ID_Lecture');
            $sql->bindParam(':ID_Lecture', $lecture->ID_Lecture);
            $sql->bindParam(':name_Lecture', $lecture->name_Lecture);
            $sql->bindParam(':degreecourse', $lecture->degreecourse);
            $sql->execute();
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
    