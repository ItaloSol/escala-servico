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
  $nome_de_guerra = strtoupper($_POST['nome_de_guerra']);
  $graduacao = $_POST['graduacao'];
  $antiguidade = $_POST['antiguidade'];
  $servico = strtoupper($_POST['SERVICO']);
  $atividade = $_POST['atividade'];
  $curso = $_POST['curso'];
 
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
  if(!isset($dia)){
    $dia = '-';
  }
  echo $dia . '<BR>';
  $svP= $_POST['data_ultimo_sv'];
  $svR= $_POST['data_ultimo_sv_red'];
  $svM= $_POST['missao'];
  $svmr= $_POST['missao_red'];
  $svep= $_POST['escada_externo'];
  $sver= $_POST['escada_externo_red'];
  $sve= $_POST['externo'];

  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
  $observacao  =  $graduacao . ' '. $nome_de_guerra;
  $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '12', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);


  $sqlUpdate = "UPDATE militares SET   
   antiguidade='$antiguidade',
   nome_de_guerra='$nome_de_guerra',
   servico='$servico',
   
   data_de_sv='$dia',
   graduacao='$graduacao',
   atividade='$atividade', 
   missao='$svM', 
   fk_cursos='$curso',
   externo='$sve' ,
   data_ultimo_sv='$svP', 
   data_ultimo_sv_red='$svR',
   missao_red='$svmr',
   externo = '$sve',
   escalado_externo = '$svep',
   escalado_externo_red = '$sver'
  WHERE id='$id' ";

$pg = $_POST['pg'];
  
  $result = mysqli_query($conn, $sqlUpdate);
  if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<h2 style='color:green;'>Militar Editado com sucesso!</h2>";
		header("Location: ../militar/editarcadastro.php?id=$id&pg=$pg");
	}else{
		$_SESSION['msg'] = "<h2 style='color:red;'>Erro o usuário não foi editado!</h2>";
		header("Location: ../militar/editarcadastro.php?id=$id&pg=$pg");
	}
}else{	
	$_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um usuário!</h2>";
	header("Location: ../militar/editarcadastro.php?id=$id&pg=$pg");
}

