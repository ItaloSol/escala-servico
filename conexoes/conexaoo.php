<?php
 
 if(isset($_SESSION['bd'])){
    if($_SESSION['bd'][0] == 'bd1'){
        $server = "10.166.65.167";
        $usuario = "dantas";
        $senha = "grafex";
        $banco = "bancosv3";
        $port = 3306;
    }
    if($_SESSION['bd'][0] == 'bd2'){
        $server = "10.166.65.167";
        $usuario = "dantas";
        $senha = "grafex";
        $banco = "bancosv2";
        $port = 3306;
    }
    if($_SESSION['bd'][0] == 'bd3'){
        $server = "127.0.0.1";
        $usuario = "root";
        $senha = "";
        $banco = "bancosv";
        $port = 3306;
    }
}else{
    $server = "10.166.65.167";
        $usuario = "dantas";
        $senha = "grafex";
        $banco = "bancosv3";
        $port = 3306;
}
   
    
    try{
        $conexao = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //    echo "conexao feita";
    }catch(PDOException $erro){
        echo "Ocorreu um erro de conexao: {$erro->getMessage()}";
        $conexao = null;
    }
?>