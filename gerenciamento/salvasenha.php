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
if(isset($_POST['submit'])){
       $id = $_POST['id'];
      $motivo = $_POST['motivo'];
      $data_inicio = $_POST['data_inicio'];
      $data_final = $_POST['data_final'];
      $militar = $_POST['militar'];
      $editarmilitar = $_POST['editarmilitar'];
      $deletarmilitar = $_POST['deletarmilitar'];
      $postos = $_POST['postos'];
      $feriados = $_POST['feriados'];
      $dellsv = $_POST['dellsv'];
      $gerirfolga = $_POST['gerirfolga'];
      $qtdsobre = $_POST['qtdsobre'];
      $svexteno = $_POST['svexteno'];
      $previsao = $_POST['previsao'];
      $usuario = $_POST['usuario'];
      $banco = $_POST['banco'];
      $log = $_POST['log'];
      $definir = $_POST['definir'];
      $assinatura = $_POST['assinatura'];

    echo $id;
    echo '<br>';
    echo $motivo;
    echo '<br>';
    echo $data_inicio;
    echo '<br>';
    echo $data_final;
    echo '<br>';
    echo $militar;
    echo '<br>';
    echo $editarmilitar;
    echo '<br>';
    echo $deletarmilitar;
    echo '<br>';
    echo $postos;
    echo '<br>';
    echo $feriados;
    echo '<br>';
    echo $dellsv;
    echo '<br>';
    echo $gerirfolga;
    echo '<br>';
    echo $qtdsobre;
    echo '<br>';
    echo $svexteno;
    echo '<br>';
    echo $previsao;
    echo '<br>';
    echo $usuario;
    echo '<br>';
    echo $banco;
    echo '<br>';
    echo $log;
    echo '<br>';
    echo $definir;
  $acesso = 0;
    if($editarmilitar != '00'){
      $acesso = $editarmilitar;
    }
    if($deletarmilitar != '00'){
      $acesso = $acesso . $deletarmilitar;
    }
    if($postos != '00'){
      $acesso = $acesso . $postos;
    }
    if($feriados != '00'){
      $acesso = $acesso . $feriados;
    }
    if($dellsv != '00'){
      $acesso = $acesso . $dellsv;
    }
    if($gerirfolga != '00'){
      $acesso = $acesso . $gerirfolga;
    }
    if($deletarmilitar != '00'){
      $acesso = $acesso . $deletarmilitar;
    }
    if($qtdsobre != '00'){
      $acesso = $acesso . $qtdsobre;
    }
    if($svexteno != '00'){
      $acesso = $acesso . $svexteno;
    }
       if($deletarmilitar != '00'){
      $acesso = $acesso . $deletarmilitar;
    }
    
     if($previsao != '00'){
      $acesso = $acesso . $previsao;
    }
    if($usuario != '00'){
      $acesso = $acesso . $usuario;
    }
    if($banco != '00'){
      $acesso = $acesso . $banco;
    }
    if($log != '00'){
      $acesso = $acesso . $log;
    }
    if($definir != '00'){
      $acesso = $acesso . $definir;
    }
    if($assinatura != '00'){
      $acesso = $acesso . $assinatura;
    }
    echo '<br><b>'.$acesso.'</b>';
    date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
  $observacao  =  'Mudado '. $data_inicio;
  $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '7', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);
  $sqlUpdate = "UPDATE usuarios SET  senha='$motivo', nome='$data_inicio', email='$militar', acesso='$acesso', adm='$data_final'
  WHERE id_senha ='$id' ";

  $result = $conect->query($sqlUpdate);

 
}{  
  header('Location: senhas.php');
}