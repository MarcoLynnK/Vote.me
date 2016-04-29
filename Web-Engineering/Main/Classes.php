<?php

//Klasse User
class User 
{
    public $ID_User;
    public $login;
    public $firstname;
    public $lastname;
    public $email;
    public $rights;
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
            $this-> rights= $daten ['rights'];
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

    function __construct($daten=null)
    {
        if (is_array ($daten)) 
        {
            $this-> ID_Lecture= $daten ['ID_Lecture'];
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

    function __construct($daten=null) 
    {
        if (is_array ($daten)) 
        {
            $this-> ID_Voting= $daten ['ID_Voting'];
            $this-> name_Voting= $daten ['name_Voting'];
            $this-> question_Voting= $daten ['question_Voting'];
        }
    }
}

//Klasse Möglichkeiten/Optionen
class Chance 
{
    public $ID_Chance;
    public $description_Chance;
    
    function __construct($daten=null)
    {
        if (is_array($daten))
        {
            $this-> ID_Chance= $daten ['ID_Chance'];
            $this-> description_Chance= $daten ['description_Chance'];
        }
    }
}
