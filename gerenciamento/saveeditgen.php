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
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $nome_de_guerra = $_POST['nome_de_guerra'];
 
  $graduacao = $_POST['graduacao'];
  $antiguidade = $_POST['antiguidade'];
  $data_ultimo_sv = $_POST['data_ultimo_sv'];
  $data_ultimo_sv_red = $_POST['data_ultimo_sv_red'];
  $servico = $_POST['servico'];
  $atividade = $_POST['atividade'];
  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
  $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id'");//SELECIONA A TABELA DE MILITARES
                $Atividade_militar->execute(); //EXECUTA TABELA
                while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
                  $graduacao = $atv_mil['nome_graduacao'];
                  $nome = $atv_mil['nome_de_guerra'];
                  $observacao = $graduacao . ' '. $nome;
                }
  $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '12', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);
  $sqlUpdate = "UPDATE militares SET   antiguidade='$antiguidade', nome_de_guerra='$nome_de_guerra',servico='$servico',graduacao='$graduacao',atividade='$atividade', data_ultimo_sv='$data_ultimo_sv', data_ultimo_sv_red='$data_ultimo_sv_red'
  WHERE id='$id' ";

  $result = mysqli_query($conn, $sqlUpdate);
  if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<h2 style='color:green;'>Militar Editado com sucesso!</h2>";
		header("Location: editmilitargerencia.php");
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Erro o usuário não foi editado!</h2>";
		header("Location: editmilitargerencia.php");
	}
}else{	
	$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um usuário!</h2>";
	header("Location: editmilitargerencia.php");
}

