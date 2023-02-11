<?php

 
if(isset($_SESSION['bd'])){
    if($_SESSION['bd'][0] == 'bd1'){
        define('HOST', '127.0.0.1');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'bancosv');
    }
    if($_SESSION['bd'][0] == 'bd2'){
        define('HOST', '127.0.0.1');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'bancosv2');
    }
    if($_SESSION['bd'][0] == 'bd3'){
        define('HOST', '127.0.0.1');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'bancosv');
    }
}else{
    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'bancosv');
}

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

