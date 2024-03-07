<?php
if(isset($_POST['submit'])){  
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
    
    $nome_de_guerra = strtoupper($_POST['nome_de_guerra']);
    $graduacao = $_POST['graduacao'];
    $servico = strtoupper($_POST['SERVICO']);
    $atividade = $_POST['atividade'];
    $curso = $_POST['curso'];
    $cpf = $_POST['cpf'];
    $d = 8;
    $a = 0;
    $dia = '';
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
    
    echo $dia . '<BR>';
    $svP= $_POST['data_ultimo_sv'];
    $svR= $_POST['data_ultimo_sv_red'];
    $svM= $_POST['missao'];
    $svmr= $_POST['missao_red'];
    $svep= $_POST['escada_externo'];
    $sver= $_POST['escada_externo_red'];
    $sve= $_POST['externo'];
    $previsao = $conexao->prepare("SELECT * FROM militares WHERE graduacao = '$graduacao' ORDER BY antiguidade DESC");//SELECIONA A TABELA DE MILITARES
    $previsao->execute(); //EXECUTA TABELA
    $a = 0;
    if($previsto = $previsao->fetch(PDO::FETCH_ASSOC)) {
    $antiguidade = $previsto['antiguidade'] + 1;
    }
    if(!isset($antiguidade)){
      $antiguidade = 1;
    }
    /*
    $teste = "\n";
    echo $folga;
    echo $teste;
    echo $atividade;
    echo $teste;
    echo $antiguidade;
    echo $teste;
    echo $graduacao;
    echo $teste;
    echo $nome_de_guerra;
    echo $teste;
    echo $servico;
    echo $teste;
    echo $telefone;
  */
  echo  $antiguidade .'<BR>'. $nome_de_guerra .'<BR>'. $servico .'<BR>'. $graduacao .'<BR>'. $atividade .'<BR>'. $svP .'<BR>'. $svR .'<BR>'. $sve .'<BR>'.  $sver .'<BR>'. $svM .'<BR>'. $svmr .'<BR>'. $svep .'<BR>'. $sver .'<BR>'. $cpf .'<BR>'. $curso ;
  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
  // $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.nome_de_guerra = '$nome_de_guerra' AND antiguidade = '$antiguidade' ");//SELECIONA A TABELA DE MILITARES
  // $Atividade_militar->execute(); //EXECUTA TABELA
  // while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
  //     $graduacao = $atv_mil['nome_graduacao'];
  //     $nome = $atv_mil['nome_de_guerra'];
  //     $observacao = $graduacao . ' '. $nome_de_guerra;
  // }
  $observacao = $graduacao . ' '. $nome_de_guerra;
  $datahoraa = (string) $datahora;    //  string $datahora;
  $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '4', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);

 
     $query = "INSERT INTO militares(antiguidade,nome_de_guerra,servico,graduacao,atividade,data_ultimo_sv,data_ultimo_sv_red, externo, externo_red,missao, missao_red, escalado_externo,escalado_externo_red,cpf,fk_cursos,data_de_sv) VALUES 
     ('$antiguidade','$nome_de_guerra','$servico','$graduacao','$atividade','$svP','$svR','$sve', '$sver','$svM','$svmr','$svep','$sver','$cpf','$curso','$dia')";
                                                     
   echo $query ;
            
    $result = mysqli_query($conn, $query);
  
     
        $_SESSION['msg'] = "<h2 style='color:green;'>Militar cadastrado com sucesso!</h2>";
      header("Location: cadastrar.php");
   
    
   
  }else{
    echo 'nada';
  }
