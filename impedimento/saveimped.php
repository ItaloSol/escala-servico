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
  
  $data_inicio = $_POST['data_inicio'];
  $data_final = $_POST['data_final'];
  $motivo = $_POST['motivo'];
  $oumotivo = $_POST['oumotivo'];
  $tipo_sv = $_POST['tiposv'];
  $contar = $_POST['conter'];
  $f = 0;
  $a = 0;
  while($a < $contar){
    if(isset($_POST['escalado'.$a])){ 
    $id_selecionado[$f] = $_POST['escalado'.$a]; 
    $f++;
    }
    $a++;
  }
  $inserir = 0;
  $a = count($id_selecionado);
 if($oumotivo == ''){ 
  echo 'Não a outro motivo!';
 
 } else {
  $motivo = $_POST['oumotivo'];
 }


  $data_dia = strtotime('%a',strtotime('-'. 1 .'day',strtotime($data_inicio)));
   echo '<br> data redefinida => '.$data_dia.'<br>';
  
  if($data_dia == 'Sat'){
   $data_inicio = date('Y-m-d', strtotime('-2 days', strtotime($data_inicio)));
  }
  if($data_dia == 'Sun'){
   $data_inicio = date('Y-m-d', strtotime('-3 days', strtotime($data_inicio)));
  }
  if($data_dia != 'Sat' or $data_dia != 'Sun'){
   $data_inicio = date('Y-m-d', strtotime('-1 days', strtotime($data_inicio)));
  }
  
  $data_final = date('Y-m-d', strtotime('+1 days', strtotime($data_final)));
  
  
  echo "Modificação<br>Corrigido ".$data_inicio ."<br>";

 
  $aguardando = "Aguardando";
  $hoje = date('Y-m-d'); 
  
 if($tipo_sv == 'PRETA'){
   $Bloqueado = "VERMELHA";
 }
  if($tipo_sv == 'VERMELHA'){
    $Bloqueado = "PRETA";
 }
 if($tipo_sv == 'AMBAS'){
  $Bloqueado = "AMBAS";
}
   

   while($a > $inserir){ 
   
  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
  $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id_selecionado[$inserir]'");//SELECIONA A TABELA DE MILITARES
  $Atividade_militar->execute(); //EXECUTA TABELA
  while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
    $graduacao = $atv_mil['nome_graduacao'];
    $nome = $atv_mil['nome_de_guerra'];
    $observacao = $graduacao . ' '. $nome;
  }
  $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao) VALUES ( '$observacao', '$datahoraa', '22')";
    $result = $conect->query($sqlAtividade);
  
   
     


    $query = $conexao->prepare("INSERT INTO impedimentos(motivo,data_inicio,data_final,vencimento,fk_militares,semana) 
    VALUES ('$motivo','$data_inicio','$data_final','','$id_selecionado[$inserir]','$tipo_sv')");
    $query->execute(); 
    $query_impedimento = $conexao->prepare("SELECT * FROM impedimentos WHERE fk_militares = '$id_selecionado[$inserir]' ORDER BY impedimento_id DESC LIMIT 1");//SELECIONA A TABELA DE MILITARES
    $query_impedimento->execute(); //EXECUTA TABELA
  while($impedimento = $query_impedimento->fetch(PDO::FETCH_ASSOC)) {
      $id_imped = $impedimento['impedimento_id'];
    }
    $Updatemilitar = "UPDATE militares SET  fk_impedimento='$id_imped', servico = '$Bloqueado' WHERE id='$id_selecionado[$inserir]' ";
  
    $result = $conexao->query($Updatemilitar);
  
 
  $inserir++;
  }


  /////////////////////
  
 /////////////////
   
  
 
      
   
   if(isset($result)){
      $_SESSION['msg'] = "<h2 style='color:green;'>Impedimento adicionado com sucesso!!!</h2>";
      }else{
         $_SESSION['msg'] = "<h2 style='color:red;'>Impedimento não foi adicionado!!!</h2>";
      }
  header('Location: impedimento.php');

}
include_once('atualizando.php');