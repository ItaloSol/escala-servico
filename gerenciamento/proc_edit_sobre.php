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
  $qtd_sgt = $_POST['qtd_sgt'];
  $qtd_cabo = $_POST['qtd_cabo'];
  $qtd_mot = $_POST['qtd_mot'];
  $qtd_soldados = $_POST['qtd_soldados'];
  $qtd_missao = $_POST['qtd_Missao'];
  $id = $_POST['id'];
  

 

	$recebe = $qtd_sgt. $qtd_cabo.$qtd_mot . $qtd_soldados . $qtd_missao;
	date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
	$observacao  =  'Mudado Para '. $recebe;
	$datahoraa = (string) $datahora;    //  string $datahora;
	  $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '9', '$id_desse_user')";
	$result = $conect->query($sqlAtividade);
	echo $recebe;
   $result_usuario = "UPDATE previsao SET qtd_prevista='$recebe'
  WHERE id_previsao = '$id' ";
 	$resultado_usuario = mysqli_query($conn, $result_usuario);
 
     echo $result_usuario;



		if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<h2 style='color:green;'>sobreaviso Editado com sucesso</h2>";
				header("Location: sobreaviso.php");
			}else{
				
				$_SESSION['msg'] = "<h2 style='color:red;'>Erro a sobreaviso não foi editada com sucesso / Nenhuma alteração feita</h2>";
				header("Location: sobreaviso.php");
			}
		}else{	
			$_SESSION['msg'] = "<h2 style='color:red;'>Necessário editar um sobreaviso corretamente, Não se pode colocar o mesmo nome em um posto</h2>";
			header("Location: sobreaviso.php");
		}



