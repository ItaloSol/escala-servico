<?php
        

        if(isset($_SESSION['bd'])){
            if($_SESSION['bd'][0] == 'bd1'){
                $server = "";
                $usuario = "";
                $senha = "";
                $banco = "";
            }
            if($_SESSION['bd'][0] == 'bd2'){
                $server = "";
                $usuario = "";
                $senha = "";
                $banco = "";
            }
            if($_SESSION['bd'][0] == 'bd3'){
                $server = "127.0.0.1";
                $usuario = "root";
                $senha = "";
                $banco = "";
            }
        }else{
            $server = "";
                $usuario = "";
                $senha = "";
                $banco = "";
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
