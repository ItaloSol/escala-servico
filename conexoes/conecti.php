<?php
	 if(isset($_SESSION['bd'])){
        if($_SESSION['bd'][0] == 'bd1'){
            $servidor = "127.0.0.1";
            $usuario = "root";
            $senha = "";
            $dbname = "bancosv";
        }
        if($_SESSION['bd'][0] == 'bd2'){
            $servidor = "127.0.0.1";
            $usuario = "root";
            $senha = "";
            $dbname = "bancosv2";
        }
        if($_SESSION['bd'][0] == 'bd3'){
            $servidor = "127.0.0.1";
            $usuario = "root";
            $senha = "";
            $dbname = "bancosv";
        }
    }else{
        $servidor = "127.0.0.1";
            $usuario = "root";
            $senha = "";
            $dbname = "bancosv";
    }


	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    $conn->set_charset("utf8");
?>