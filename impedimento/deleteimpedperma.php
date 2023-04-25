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
if(!empty($id)){
	$impedio = $conexao->prepare("SELECT * FROM impedimentos  WHERE impedimento_id='$id' " );
	$impedio->execute(); //EXECUTA TABELA
	$i = 0;
	while($reg = $impedio->fetch(PDO::FETCH_ASSOC)) { 
	$id_militar = $reg['fk_militares'];
	
	}
	date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
	$Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id_militar'");//SELECIONA A TABELA DE MILITARES
                $Atividade_militar->execute(); //EXECUTA TABELA
                while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
                  $graduacao = $atv_mil['nome_graduacao'];
                  $nome = $atv_mil['nome_de_guerra'];
                  $observacao = $graduacao . ' '. $nome;
                }
	$datahoraa = (string) $datahora;    //  string $datahora;
	  $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '23','$id_desse_user')";
	  $result = $conect->query($sqlAtividade); 


	$Updatemilitar = "UPDATE militares SET  atividade ='1' , fk_impedimento = null WHERE id='$id_militar' ";
	$result = $conexao->query($Updatemilitar);
	$result_usuario = "DELETE FROM impedimentos WHERE impedimento_id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<h2 style='color:green;'>Impedimento apagado com sucesso</h2>";
		header("Location: impedimento.php");
	}else{
		
		$_SESSION['msg'] = "<h2 style='color:red;'>Erro o Impedimento não foi apagado, não foi possivel encontrar o Impedimento </h2>";
		header("Location: impedimento.php");
	}
}else{	
	$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um Impedimento</h2>";
	header("Location: impedimento.php");
}
