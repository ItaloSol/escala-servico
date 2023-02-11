<?php
session_start();
if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
    require("../conexoes/conexao.php");
    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
    $id_desse_user = $_SESSION["usuario"][3];
}else{
    echo "<script>window.location = '../index.php'</script>";
}
if(isset($_POST['submit'])){  
  include_once('../acoes/conexao.php');
  include_once ('../conexoes/conexaoo.php');
  include_once('../conexoes/conect.php');
  
  $id_usuario0 = $_POST['id_usuario0'];
  $data_final = $_POST['data_final'];
  $titulo = $_POST['titulo'];
  $lembrete = $_POST['lembrete'];
  $Militar_Relacionado = 1;
  if($id_usuario0 == ''){ 
  $Militar_Relacionado = 2;
  $id_usuario0 = null;
 }
 echo $Militar_Relacionado . ' ' . $id_usuario0 . ' ' ;

  
  if($Militar_Relacionado == 1){
    $query_impedimento = $conexao->prepare("SELECT * FROM militares WHERE id = '$id_usuario0'");//SELECIONA A TABELA DE MILITARES
    $query_impedimento->execute(); //EXECUTA TABELA
  while($impedimento = $query_impedimento->fetch(PDO::FETCH_ASSOC)) {
      $graduacao = $impedimento['graduacao'];
      $nome_de_guerra = $impedimento['nome_de_guerra'];
    }
    $sqlAnotacap = "INSERT INTO anotacoes (obs, data_agenda, cod_militar, titulo, sts) VALUES ( '$lembrete', '$data_final', '$id_usuario0',
 '$titulo','1')";
 $result = $conect->query($sqlAnotacap);

 $query_impedimento = $conexao->prepare("SELECT * FROM anotacoes ORDER BY id_anotacoes DESC");//SELECIONA A TABELA DE MILITARES
 $query_impedimento->execute(); //EXECUTA TABELA
    if($impedimento = $query_impedimento->fetch(PDO::FETCH_ASSOC)) {
    $id = $impedimento['id_anotacoes'];
    }

 $sqlmilitar = "UPDATE militares SET fk_anotacao = '$id' WHERE id = '$id_usuario0'";
 $result = $conect->query($sqlmilitar);
  $observacao  =  $graduacao . ' ' . $nome_de_guerra . 'Para o dia '. date('d/m/Y', strtotime($data_final));
}else{
  $sqlAnotacap = "INSERT INTO anotacoes (obs, data_agenda, titulo, sts) VALUES ( '$lembrete', '$data_final',
 '$titulo','1')";
 $result = $conect->query($sqlAnotacap);

 

 
    $observacao  = 'Para o dia '. date('d/m/Y', strtotime($data_final));
}
date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());

  $datahoraa = (string) $datahora;    //  string $datahora;
     $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao , fk_usuario) VALUES ( '$observacao', '$datahoraa', '29','$id_desse_user')";
     $result = $conect->query($sqlAtividade);


  /////////////////////
  
 /////////////////


 
  
 
      
   
   if(isset($result)){
      $_SESSION['msg'] = "<h2 style='color:green;'>Anotacão adicionado com sucesso!!!</h2>";
      }else{
         $_SESSION['msg'] = "<h2 style='color:red;'>Anotacão não foi adicionado!!!</h2>";
      }
  header('Location: insertanotacao.php');

}