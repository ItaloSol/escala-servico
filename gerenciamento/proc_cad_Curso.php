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



	$result_usuario = "INSERT INTO cursos (nome_curso) VALUES ('$motivo')";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";
echo 'TESTE';echo $data;
date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
$observacao  =  'Curso '.$motivo;
$datahoraa = (string) $datahora;    //  string $datahora;
  $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '32', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);

if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<h2 style='color:green;'>Curso adicionado com sucesso</h2>";
		header("Location: addcurso.php");
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Erro o Curso não foi adicionado</h2>";
		header("Location: addcurso.php");
	}
}else{	
	$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um motivo/data</h2>";
	header("Location: addcurso.php");
}

if(isset($motivo)){
	
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um motivo/data</h2>";
	header("Location: addcurso.php");
	}


