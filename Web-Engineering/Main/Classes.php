<?php
class Dozent {
    public $login;
    public $firstname;
    public $lastname;
    public $faculty;
    public $hash;

    function __construct($daten=null )
    {
        if (is_array($daten)){
            $this-> login= $daten ['login'];
            $this-> firstname= $daten ['firstname'];
            $this-> lastname= $daten ['lastname'];
            $this-> faculty= $daten ['faculty'];
            $this-> hash= $daten ['hash'];
        }
    }

}

class Right {
    public $idright;
    public $admin;
    public $user;

    function __construct ($daten=null)
    {
        if (is_array ($daten));
        $this-> idright= $daten ['idright'];
        $this-> admin= $daten ['admin'];
        $this-> user= $daten ['user'];
    }
}

class Lecture {
    public $idlecture;
    public $name;
    public $degreecourse;
    public $faculty;

    function __construct($daten=null)
    {
        if (is_array ($daten)) {
            $this-> idlecture= $daten ['idlecture'];
            $this-> name= $daten ['name'];
            $this-> degreecourse= $daten ['degreecourse'];
            $this-> faculty= $daten ['faculty'];
        }
    }
}

class Voting {
    public $idvoting;
    public $namevot;
    public $qustion;

    function __construct($daten=null) 
    {
        if (is_array ($daten)) {
            $this-> idvoting= $daten ['idvoting'];
            $this-> namevot= $daten ['namevot'];
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
