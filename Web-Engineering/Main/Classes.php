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
    public $Chance1;
    public $Chance2;
    public $Chance3;
    public $Chance4;
    public $date_Vote;
    public $countChance1;
    public $countChance2;
    public $countChance3;
    public $countChance4;

    function __construct($daten=null) 
    {
        if (is_array ($daten)) 
        {
            $this-> ID_Voting= $daten ['ID_Voting'];
            $this-> name_Voting= $daten ['name_Voting'];
            $this-> question_Voting= $daten ['question_Voting'];
            $this-> Chance1= $daten ['Chance1'];
            $this-> Chance2= $daten ['Chance2'];
            $this-> Chance3= $daten ['Chance3'];
            $this-> Chance4= $daten ['Chance4'];
            $this-> date_Vote= $daten ['date_Vote'];
            $this-> countChance1= $daten ['countChance1'];
            $this-> countChance2= $daten ['countChance2'];
            $this-> countChance3= $daten ['countChance3'];
            $this-> countChance4= $daten ['countChance4'];
            
        }
    }
}
