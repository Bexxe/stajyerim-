<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();

if (isset($_SESSION['rol'])) {
    $userRole = $_SESSION['rol'];
    if ($userRole === 'firma') {
        include "firma.php";
    } 
    elseif ($userRole === 'stajyer') {
        include "oturumacik.php";
    } 
    elseif ($userRole === 'okul') {
        include "okul.php";
    } 
    else {
    }
} else {
    include "oturumkapali.php";
}
?>
