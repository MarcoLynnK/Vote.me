<?php

//Klasse User
class User 
{
    public $ID_User;
    public $login;
    public $firstname;
    public $lastname;
    public $email;
    public $ID_Rights;
    public $hash;

    function __construct($daten=null )
    {
        if (is_array($daten))
        {
            $this-> ID_User= $daten ['ID_User'];
            $this-> login= $daten ['login'];
            $this-> firstname= $daten ['firstname'];
            $this-> lastname= $daten ['lastname'];
            $this-> email= $daten ['email'];
            $this-> ID_Rights= $daten ['ID_Rights'];
            $this-> hash= $daten ['hash'];
        }
    }
}

//Klasse Rechte
class Rights 
{
    public $ID_Rights;
    public $description_Rights;

    function __construct ($daten=null)
    {
        if (is_array ($daten)) 
        {
            $this->ID_Rights = $daten ['ID_Rights'];
            $this->description_Rights = $daten ['description_Rights'];
        }
    }
}

//Klasse Vorlesung
class Lecture 
{
    public $ID_Lecture;
    public $name_Lecture;
    public $degreecourse;
    public $ID_User;

    function __construct($daten=null)
    {
        if (is_array ($daten)) 
        {
            $this-> ID_User= $daten ['ID_User'];
            $this-> name_Lecture= $daten ['name_Lecture'];
            $this-> degreecourse= $daten ['degreecourse'];
        }
    }
}

//Klasse Voting
class Voting 
{
    public $ID_Voting;
    public $name_Voting;
    public $question_Voting;
    public $Status;
    public $ID_Lecture;
    public $ID_User;

    /**
     * Voting constructor.
     * @param null $daten
     */
    function __construct($daten = null) 
    {
        
        // Konstruktor mit Array
        if (is_array ($daten)) 
        {
            
            $this-> ID_Voting= $daten ['ID_Voting'];
            $this-> name_Voting= $daten ['name_Voting'];
            $this-> question_Voting= $daten ['question_Voting'];
            $this-> Status= $daten ['Status'];
            $this-> ID_Lecture= $daten ['ID_Lecture'];
            $this-> ID_User= $daten ['ID_User'];
            
        } 
    }
}
//Klasse Antwortmöglichkeiten
class Chance
{
    public $ID_Chance;
    public $description_Chance;
    public $ID_Voting;
    public $ID_User;

     function __construct($daten=null)
     {
        if (is_array($daten))
        {
            $this-> ID_Chance= $daten ['ID_Chance'];
            $this-> description_Chance= $daten ['description_Chance'];
            $this-> ID_Voting= $daten ['ID_Voting'];
            $this-> ID_User= $daten ['ID_User'];
        }
     }
 }

  //Klasse Ergebnis
class Result
{
    public $ID_Result;
    public $date_Result;
    public $ID_Chance;
    public $ID_Voting;

    function __construct($daten=null)
    {
        if (is_array($daten))
        {
            echo "daten ist array";
            
            $this->date_Result = $daten ['date_Result'];
            $this->ID_Chance = $daten ['ID_Chance'];
            $this->ID_Voting = $daten ['ID_Voting'];
            $this->ID_Result = $daten ['ID_Result'];
            
        }
    }
}