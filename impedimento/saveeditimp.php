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
include_once('../conexoes/conect.php');

include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
if(isset($_POST['update'])){
       $id = $_POST['id'];
      $motivo = $_POST['motivo'];
      $data_inicio = $_POST['data_inicio'];
      $data_final = $_POST['data_final'];
      $graduacao = $_POST['graduacao'];
      $tipo_sv = $_POST['tiposv'];
      $militar = $_POST['militar'];
      $fk_militar = $_POST['fk_militar'];
    echo $id. " " . $motivo . " " . $data_inicio . " " . $data_final . " ";
  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
  $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$fk_militar'");//SELECIONA A TABELA DE MILITARES
                $Atividade_militar->execute(); //EXECUTA TABELA
                while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
                  $graduacao = $atv_mil['nome_graduacao'];
                  $nome = $atv_mil['nome_de_guerra'];
                  $observacao = $graduacao . ' '. $nome;
                }
   $datahoraa = (string) $datahora;    //  string $datahora;

     
 if($tipo_sv == 'PRETA'){
  $Bloqueado = "VERMELHA";
}
 if($tipo_sv == 'VERMELHA'){
   $Bloqueado = "PRETA";
}
if($tipo_sv == 'AMBAS'){
 $Bloqueado = "AMBAS";
}

     $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '24', '$id_desse_user')";
     $result = $conect->query($sqlAtividade); 
 
     $updateaguardando = $conexao->prepare("UPDATE impedimentos SET  motivo='$motivo', semana='$Bloqueado' ,data_inicio='$data_inicio',data_final='$data_final'
     WHERE impedimento_id ='$id' ");
     $updateaguardando->execute(); 
     $Updatemilitar = "UPDATE militares SET  fk_impedimento='$id', servico = '$Bloqueado' WHERE id='$fk_militar' ";
     $result = $conexao->query($Updatemilitar);
}{  
 header('Location: impedimento.php');
}