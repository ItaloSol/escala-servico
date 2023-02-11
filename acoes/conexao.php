<?php
        

        if(isset($_SESSION['bd'])){
            if($_SESSION['bd'][0] == 'bd1'){
                $server = "127.0.0.1";
                $usuario = "root";
                $senha = "";
                $banco = "bancosv";
            }
            if($_SESSION['bd'][0] == 'bd2'){
                $server = "127.0.0.1";
                $usuario = "root";
                $senha = "";
                $banco = "bancosv2";
            }
            if($_SESSION['bd'][0] == 'bd3'){
                $server = "127.0.0.1";
                $usuario = "root";
                $senha = "";
                $banco = "bancosv";
            }
        }else{
            $server = "127.0.0.1";
                $usuario = "root";
                $senha = "";
                $banco = "bancosv";
        }


        

    try{
        $conexao = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //  echo "conexão feita";
    }catch(PDOException $erro){
        echo "Ocorreu um erro de conexao: {$erro->getMessage()}";
        $conexao = null;
    }
?>