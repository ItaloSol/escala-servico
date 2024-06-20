<?php
	 if(isset($_SESSION['bd'])){
        if($_SESSION['bd'][0] == 'bd1'){
            $servidor = "10.166.65.167";
            $usuario = "dantas";
            $senha = "grafex";
            $dbname = "bancosv3";
        }
        if($_SESSION['bd'][0] == 'bd2'){
            $servidor = "10.166.65.167";
            $usuario = "dantas";
            $senha = "grafex";
            $dbname = "bancosv2";
        }
        if($_SESSION['bd'][0] == 'bd3'){
            $servidor = "127.0.0.1";
            $usuario = "root";
            $senha = "";
            $dbname = "bancosv";
        }
    }else{
        $servidor = "10.166.65.167";
        $usuario = "dantas";
        $senha = "grafex";
        $dbname = "bancosv3";
    }


	//Criar a conexão Teste ignore
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    $conn->set_charset("utf8");
?>