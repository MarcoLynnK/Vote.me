<?php
require_once ("Manager.php");
require_once ("include/Classes.php");

class LectureManager extends Manager
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
            $sql= $this->pdo-> prepare ('SELECT * from Lecture');
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

    public function findById ($idlecture)
    {
        try {
            $sql= $this->pdo-> prepare ('SELECT * from Lecture WHERE idlec = :idlec');
            $sql-> bindParam (':idlecture', $idlecture);
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

    public function create (Lecture $lecture)
    {

        try {
            $stmt = $this->pdo->prepare('INSERT INTO Lecture (name, degreecourse, faculty) VALUES (:name , :degreecourse, :faculty)');
            $stmt->bindParam(':name', $lecture->name);
            $stmt->bindParam(':degreecourse', $lecture->degreecourse);
            $stmt->bindParam(':faculty', $lecture->faculty);
            $stmt->execute();
            }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $lecture;
    }

    public function update (Lecture $lecture)
    {
        try {
            $stmt = $this->pdo->prepare('UPDATE Lecture SET name = :name, degreecourse = :degreecourse, faculty= :faculty WHERE id = :id');
            $stmt->bindParam(':idlecture', $lecture->idlecture);
            $stmt->bindParam(':name', $lecture->name);
            $stmt->bindParam(':degreecourse', $lecture->degreecourse);
            $stmt->bindParam(':faculty', $lecture->faculty);
            $stmt->execute();
            }
        catch (PDOException $e)
            {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
            }
        return $lecture;
    }

    public function delete (Lecture $lecture) 
    {
        try {
            $sql = $this->pdo->prepare('DELETE FROM user WHERE idlecture= :idlecture');
            $sql->bindParam(':idlecture', $lecture->idlecture);
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