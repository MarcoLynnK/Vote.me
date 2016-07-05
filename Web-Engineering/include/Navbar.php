<?php

$right = $_SESSION["ID_Rights"];
/*
 * navigationscheck über rechte
 */
switch ($right) {
    case 1: 
        include "NavbarAdmin.php";
        break;
    
    case 2: 
        include "NavbarUser.php";
        break;
}