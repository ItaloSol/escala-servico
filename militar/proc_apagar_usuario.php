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
$query_data_ultimo_sv = $conexao->prepare("SELECT * FROM militares WHERE atividade = '1' AND id = '$id' ORDER BY nome_de_guerra ASC ");//SELECIONA A TABELA DE MILITARES
$query_data_ultimo_sv->execute(); //EXECUTA TABELA

     
      while($ultimosv = $query_data_ultimo_sv->fetch(PDO::FETCH_ASSOC)  ){
        $graduacao = $ultimosv['graduacao'];  
		$nome = $ultimosv['nome_de_guerra'];
	  }
	  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
	  $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id'");//SELECIONA A TABELA DE MILITARES
                $Atividade_militar->execute(); //EXECUTA TABELA
                while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
                  $graduacao = $atv_mil['nome_graduacao'];
                  $nome = $atv_mil['nome_de_guerra'];
                  $observacao = $graduacao . ' '. $nome;
                }
	  $datahoraa = (string) $datahora;    //  string $datahora;
		$sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '5', '$id_desse_user')";
	  $result = $conect->query($sqlAtividade);
if(!empty($id)){
	$result_usuario = "DELETE FROM militares WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<h2 style='color:green;'>Usuário apagado com sucesso</h2>";
		header("Location: ../gerenciamento/deletargerencia.php");
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Erro o usuário não foi apagado com sucesso</h2>";
		header("Location: ../gerenciamento/deletargerencia.php");
	}
}else{	
	$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um usuário</h2>";
	header("Location: ../gerenciamento/deletargerencia.php");
}
