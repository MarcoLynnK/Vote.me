<?php
class Dozent {
    public $login;
    public $firstname;
    public $lastname;
    public $faculty;
    public $hash;

    function __construct($daten=null ){
        if (is_array($daten)){
            $this-> login = $daten ['login'];
            $this-> firstname = $daten ['firstname'];
            $this-> lastname = $daten ['lastname'];
            $this-> faculty = $daten ['faculty'];
            $this-> hash = $daten ['hash'];
        }
    }

}

class rights {
    public $idrights;
    public $admin;
    public $user;

    function __construct ($daten=null){
        if (is_array ($daten));
        $this-> idrights= $daten ['idrights'];
        $this-> admin= $daten ['admin'];
        $this-> user= $daten ['user'];
    }
}

class lecture {
    public $idlecture;
    public $name;
    public $degreecourse;
    public $faculty;

    function __construct($daten=null) {
        if (is_array ($daten)){
            $this-> idlecture= $daten ['idlecture'];
            $this-> name= $daten ['name'];
            $this-> degreecourse= $daten ['degreecourse'];
            $this-> faculty= $daten ['faculty'];
        }
    }
}

class voting {
    public $idvoting;
    public $name;
    public $date;

    function __construct($daten=null) {
        if (is_array ($daten)) {
            $this-> idvoting= $daten ['idvoting'];
            $this-> name= $daten ['name'];
            $this-> date= $daten ['date'];
        }
    }
}

class question {
    public $idquestion;
    public $description;
    
    function __construct($daten=null){
        if (is_array($daten));
    }
}
