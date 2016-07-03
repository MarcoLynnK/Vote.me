<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 03.07.16
 * Time: 18:07
 */

$right = $_SESSION["ID_Rights"];

switch ($right) {
    
    case 1: 
        include "NavbarAdmin.php";
        break;
    
    case 2: 
        include "NavbarUser.php";
        break;
        
    
}