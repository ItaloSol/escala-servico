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
    

$Data_Atual_Atualizada = date('Y-m-d');

    try{
        $conexao = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //  echo "conexão feita";
    }catch(PDOException $erro){
        echo "Ocorreu um erro de conexao: {$erro->getMessage()}";
        $conexao = null;
    }
    
    if(isset($_SESSION["usuario"][2])) {
      $id_usuario =  $_SESSION["usuario"][2];
    }  
    
    //        $query_data_ultimo_sv = $conexao->prepare("SELECT * FROM usuarios WHERE id_senha = '$id_usuario'");//SELECIONA A TABELA DE MILITARES

    // $query_data_ultimo_sv->execute();
       
    //       while($ultimosv = $query_data_ultimo_sv->fetch(PDO::FETCH_ASSOC)  ){
    //         $cpf = $ultimosv['cpf'];
    //         $validacpf = $ultimosv['valida'];
    //         $id = $ultimosv['id_senha'];
    //    //     echo $id;
    //       }
    //       if(!isset($validacpf)){
            
    //           header("Location: ../acoes/cpf.php?id='$id'");
            
         
    //       }
?>