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
  $graduacao = $_POST['graduacao'];
  $tipo_sv = $_POST['tipo_sv'];
  $status_posto = 1;
  $antiguidade_posto = $_POST['antiguidade_posto'];
  if($servico == 'VERMELHA'){
    if($tipo_sv != 'externo'){
      $tipo_sv = $tipo_sv . '_red';
    }
   }

  echo 'Dia -> '. $dia . '<br>';
  echo 'Nome -> '. $nome . "<br>";
  echo 'Quantidade de mil -> '. $qtd_mil . "<br>";
  echo 'servico -> '. $servico . "<br>";
  echo 'graduacao -> '. $graduacao . "<br>";
  echo 'tipo de folga -> '. $tipo_sv . "<br>";
  echo 'curso -> '. $curso . "<br>";
  echo 'Prioridade -> '. $Prioridade . "<br>";
 


  

//   date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
//   $observacao  =  'Posto '.$nome;
//   $datahoraa = (string) $datahora;    //  string $datahora;
//     // $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '15', '$id_desse_user')";
//     // $result = $conect->query($sqlAtividade);



   $result_usuario = "INSERT INTO posto (nome_posto, qtd_mil, posto_graduacao, posto_servico, status_posto, data_posto, prioridade, tipo_folga, curso, guarnicao_posto, data_atividade, posto_antiguidade) VALUES ('$nome' ,'$qtd_mil' ,'$graduacao', '$servico', '$status_posto', '$dia', '$Prioridade', '$tipo_sv', '$curso', '$repitir', '$dia_troca', '$antiguidade_posto' )";
   $result = $conect->query($result_usuario);
   
  echo $result_usuario;

// echo 'sucesso';


 		
 				$_SESSION['msg'] = "<h2 style='color:green;'>Posto Adicionado com sucesso</h2>";
	header("Location: postosgerenciamento.php");
    
 		}else{	
 			$_SESSION['msg'] = "<h2 style='color:red;'>Necessário Cadastrar um Posto corretamente, Não se pode colocar o mesmo nome em um posto</h2>";
 		header("Location: postosgerenciamento.php");
 		}



