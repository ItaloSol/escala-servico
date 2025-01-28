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
  date_default_timezone_set('America/Sao_Paulo');
if(isset($_POST['submit'])){
  $nome = strtoupper($_POST['nome']);
  $qtd_mil = $_POST['qtd_mil'];
  $servico = $_POST['SERVICO'];
  $guarnicao_troca = $_POST['repitir'];
  if($guarnicao_troca == 'sim'){
    $repitir = 2;
  }else{
    $repitir = 1;
  }
  $dia_troca = $_POST['dia_troca'];
  $d = 8;
  $a = 0;
  while($a < $d ){
    if(isset($_POST['dia'.$a])){
      if(isset($dia)){
        $dia = $dia . $_POST['dia'.$a];
      }else{
        $dia = $_POST['dia'.$a];
      }
      
    }
    $a++;
  }
  $Prioridade = $_POST['Prioridade'];
  $curso = $_POST['curso'];
  $id = $_POST['id'];
  $graduacao = $_POST['graduacao'];
  $tipo_sv = $_POST['tipo_sv'];
  $status_posto = $_POST['status_posto'];
  $antiguidade_posto = $_POST['antiguidade_posto'];
  $escala_um_secao =$_POST['um_militar'];
  if($servico == 'VERMELHA'){
    $tipo_sv = $tipo_sv . '_red';
   }

  echo 'Dia -> '. $dia . '<br>';
  echo 'Nome -> '. $nome . "<br>";
  echo 'Quantidade de mil -> '. $qtd_mil . "<br>";
  echo 'servico -> '. $servico . "<br>";
  echo 'graduacao -> '. $graduacao . "<br>";
  echo 'tipo de folga -> '. $tipo_sv . "<br>";
  echo 'curso -> '. $curso . "<br>";
  echo 'Prioridade -> '. $Prioridade . "<br>";
 
  $existe_nome = false;
  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
$observacao  =  'Posto '.$nome;
$datahoraa = (string) $datahora;    //  string $datahora;
  $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '16', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);
  if($existe_nome == false){
  $result_usuario = "UPDATE posto SET nome_posto='$nome',qtd_mil='$qtd_mil', posto_antiguidade = '$antiguidade_posto' , posto_graduacao='$graduacao',posto_servico='$servico',data_posto='$dia',tipo_folga='$tipo_sv',curso='$curso',prioridade='$Prioridade',status_posto='$status_posto', guarnicao_posto = '$repitir', data_atividade = '$dia_troca',   escala_um_secao = '$escala_um_secao'
  WHERE id_posto = '$id' ";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
 
    echo $result_usuario;



		if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<h2 style='color:green;'>Posto Editado com sucesso</h2>";
				header("Location: postosgerenciamento.php");
			}else{
				
				$_SESSION['msg'] = "<h2 style='color:red;'>Erro o posto não foi editado com sucesso / Nenhuma alteração feita</h2>";
				header("Location: postosgerenciamento.php");
			}
		}else{	
			$_SESSION['msg'] = "<h2 style='color:red;'>Necessário editar um Posto corretamente, Não se pode colocar o mesmo nome em um posto</h2>";
			header("Location: postosgerenciamento.php");
		}

}

