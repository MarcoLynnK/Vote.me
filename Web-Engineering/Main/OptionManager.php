<?php
require_once ("Manager.php");
require_once ("include/Classes.php");
class OptionManager extends Manager
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

    public function findById ($idoption)
    {
        try {
            $sql= $this->pdo-> prepare ('SELECT * from Option WHERE idoption = :idoption');
            $sql-> bindParam (':idoption', $idoption);
            $sql-> execute ();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Option');
            $option= $sql-> fetch();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        if (!$option) $option=null;
        return $option;
    }
    public function create (Option $option)
    {
        try {
            $sql = $this->pdo->prepare('INSERT INTO Option (idoption, text) VALUES (:idoption, :text');
            $sql->bindParam(':idoption', $option->idoption);
            $sql->bindParam(':text', $option->text);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Option');
            $option = $sql->fetch();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>") . $e->getMessage() . "<br>";
            die();
        }
        return $option;
    }

    public function update (Option $option) {
        try
        {
            $sql= $this->pdo->prepare ('UPDATE Option SET text = :text WHERE id = :id');
            $sql->bindParam (':text',$option->text);
            $sql->execute ();
        }
        catch (PDOException $e)
        {
            echo ("Es ist ein Fehler aufgetreten.<br>"). $e->getMessage(). "<br>";
            die();
        }
        return $option;
    }

    public function delete (Option $option)
    {
        try {
            $sql = $this->pdo->prepare('DELETE FROM Option WHERE idoption= :idoption');
            $sql->bindParam(':idvoting', $option->idoption);
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