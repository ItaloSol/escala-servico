<?php

 
if(isset($_SESSION['bd'])){
    if($_SESSION['bd'][0] == 'bd1'){
        define('HOST', '10.166.65.167');
        define('USER', 'dantas');
        define('PASS', 'grafex');
        define('DBNAME', 'bancosv3');
    }
    if($_SESSION['bd'][0] == 'bd2'){
        define('HOST', '10.166.65.167');
        define('USER', 'dantas');
        define('PASS', 'grafex');
        define('DBNAME', 'bancosv2');
    }
    if($_SESSION['bd'][0] == 'bd3'){
        define('HOST', '127.0.0.1');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'bancosv');
    }
}else{
    define('HOST', '10.166.65.167');
    define('USER', 'dantas');
    define('PASS', 'grafex');
    define('DBNAME', 'bancosv3');
}

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

