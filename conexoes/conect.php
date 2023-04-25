
<?php

    // $dbHost = '127.0.0.1';
    // $dbUsername = 'root';
    // $dbPassword = '';
    // $dbName = 'bancosv';
    
    if(isset($_SESSION['bd'])){
        if($_SESSION['bd'][0] == 'bd1'){
            $dbHost = "10.166.65.167";
            $dbUsername = "dantas";
            $dbPassword = "grafex";
            $dbName = "bancosv3";
        }
        if($_SESSION['bd'][0] == 'bd2'){
            $dbHost = "10.166.65.167";
        $dbUsername = "dantas";
        $dbPassword = "grafex";
        $dbName = "bancosv2";
        }
        if($_SESSION['bd'][0] == 'bd3'){
            $dbHost = "127.0.0.1";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "bancosv";
    
        }
    }else{
        $dbHost = "10.166.65.167";
        $dbUsername = "dantas";
        $dbPassword = "grafex";
        $dbName = "bancosv3";
    }
       

        
     

   

$conect = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
$conect->set_charset("utf8");



/*
if($conect->connect_errno){
    echo "erro";
}else{
    echo "Conexçao feita";
}

*/
