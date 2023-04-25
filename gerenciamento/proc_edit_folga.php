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
  $qtd_mil = $_POST['qtd_mil'];
  $id = $_POST['id'];
  
 
  $result_usuario = "UPDATE previsao SET qtd_prevista='$qtd_mil'
  WHERE id_previsao = '$id' ";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
 
    echo $result_usuario;

	date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
    $observacao  =  'Mudado Para '. $qtd_mil;
    $datahoraa = (string) $datahora;    //  string $datahora;
      $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '8', '$id_desse_user')";
    $result = $conect->query($sqlAtividade);

		if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<h2 style='color:green;'>Folga Editado com sucesso</h2>";
				header("Location: folgagerenciamento.php");
			}else{
				
				$_SESSION['msg'] = "<h2 style='color:red;'>Erro a Folga não foi editada com sucesso / Nenhuma alteração feita</h2>";
				header("Location: folgagerenciamento.php");
			}
		}else{	
			$_SESSION['msg'] = "<h2 style='color:red;'>Necessário editar um Folga corretamente, Não se pode colocar o mesmo nome em um posto</h2>";
			header("Location: folgagerenciamento.php");
		}



