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
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());

$Atividade_militar = $conexao->prepare("SELECT * FROM posto WHERE id_posto = '$id'");//SELECIONA A TABELA DE MILITARES
$Atividade_militar->execute(); //EXECUTA TABELA
while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
  $nome = $atv_mil['nome_posto'];
  $observacao = 'POSTO ' . $nome;
}
$datahoraa = (string) $datahora;    //  string $datahora;
  $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '17', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);
if(!empty($id)){
	$result_usuario = "DELETE FROM  posto  WHERE id_posto ='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<h2 style='color:green;'>Posto apagado com sucesso</h2>";
		header("Location: postosgerenciamento.php");
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Erro o Posto não foi apagado com sucesso</h2>";
		header("Location: postosgerenciamento.php");
	}
}else{	
	$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um Posto</h2>";
	header("Location: postosgerenciamento.php");
}
