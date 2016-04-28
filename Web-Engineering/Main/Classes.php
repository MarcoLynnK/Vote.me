<?php
class User {
    public $login;
    public $firstname;
    public $lastname;
    public $faculty;
    public $rights;
    public $hash;

    function __construct($daten=null )
    {
        if (is_array($daten)){
            $this-> login= $daten ['login'];
            $this-> firstname= $daten ['firstname'];
            $this-> lastname= $daten ['lastname'];
            $this-> faculty= $daten ['faculty'];
            $this-> rights= $daten ['rights'];
            $this-> hash= $daten ['hash'];
        }
    }

}

class Rights {
    public $norights;
    public $admin;
    public $user;

    function __construct ($daten=null)
    {
        if (is_array ($daten));
        $this-> idrights= $daten ['idrights'];
        $this-> admin= $daten ['admin'];
        $this-> user= $daten ['user'];
    }
}

class Lecture {
    public $name;
    public $degreecourse;
    public $faculty;

    function __construct($daten=null)
    {
        if (is_array ($daten)) {
            $this-> name= $daten ['name'];
            $this-> degreecourse= $daten ['degreecourse'];
            $this-> faculty= $daten ['faculty'];
        }
    }
}

class Voting {
    public $namevoting;
    public $qustion;

    function __construct($daten=null) 
    {
        if (is_array ($daten)) {
            $this-> namevoing= $daten ['namevoting'];
            $this-> question= $daten ['question'];
        }
    }
}

class Option {
    public $idoption;
    public $text;
    
    function __construct($daten=null)
    {
        if (is_array($daten)){
            $this-> idoption= $daten ['idoption'];
            $this-> text= $daten ['text'];
        }
    }
}
