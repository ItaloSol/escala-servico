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
  $motivo = strtoupper($_POST['nome']);

$data = $_POST['data'];

if($data == null){
	$_SESSION['msg'] = "<h2 style='color:red;'>Erro não foi adicionado uma data ao feriado</h2>";
		header("Location: vermelhagerenciamento.php");
		
}else{
	$result_usuario = "INSERT INTO feriados (data, motivo) VALUES ('$data', '$motivo')";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
}
//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";
echo 'TESTE';echo $data;
date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
$observacao  =  'Feriado '.$motivo;
$datahoraa = (string) $datahora;    //  string $datahora;
  $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '13', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);

if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<h2 style='color:green;'>Feriado adicionado com sucesso</h2>";
		header("Location: vermelhagerenciamento.php");
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Erro o feriado não foi adicionado</h2>";
		header("Location: vermelhagerenciamento.php");
	}
}else{	
	$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um motivo/data</h2>";
	header("Location: vermelhagerenciamento.php");
}

if(isset($motivo)){
	
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um motivo/data</h2>";
	header("Location: vermelhagerenciamento.php");
	}


