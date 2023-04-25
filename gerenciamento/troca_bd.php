
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
  
  $banco = $_POST['banco'];
 

 
  echo $banco . "<br>";
  $_SESSION['bd'] = [$banco];
   print_r( $_SESSION['bd']);
 
 

  
   date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
   $observacao  =  'Mudado '. $banco;
   $datahoraa = (string) $datahora;    //  string $datahora;
	 $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '6', '$id_desse_user')";
   $result = $conect->query($sqlAtividade);
 



		if(isset($_SESSION['bd'])){
				$_SESSION['msg'] = "<h2 style='color:green;'>Banco de dados mudado com sucesso</h2>";
				header("Location: trocarbanco.php");
			}else{
				
				$_SESSION['msg'] = "<h2 style='color:red;'>Erro o Banco de dados não foi alterado com sucesso</h2>";
				header("Location: trocarbanco.php");
			}
		}else{	
			$_SESSION['msg'] = "<h2 style='color:red;'>Necessário Selecionar um Banco de dados corretamente</h2>";
			header("Location: trocarbanco.php");
		}


	
