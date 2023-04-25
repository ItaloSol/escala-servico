
<?php
session_start();
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
  require("../conexoes/conexao.php");
  $adm  = $_SESSION["usuario"][1];
  $nome = $_SESSION["usuario"][0];
  $id_desse_user = $_SESSION["usuario"][3];
} else {
  echo "<script>window.location = '../index.php'</script>";
}
include_once('../conexoes/conect.php');
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
date_default_timezone_set('America/Sao_Paulo');
if (isset($_POST['submit'])) {

  $data = $_POST['data'];
  if ($_POST['id_usuario0'] == '') {
    $id_mil = '0';
  } else {
    $id_mil = $_POST['id_usuario0'];
  }
  if ($_POST['id_usuario2'] == '') {
    $id_mil2 = '0';
  } else {
    $id_mil2 = $_POST['id_usuario2'];
  }
  $tiposv = $_POST['tiposv'];
  $idposto = $_POST['idposto'];
  $id_externo = $_POST['id_usuario2'];
  if (isset($_POST['troca'])) {
    $troca = $_POST['troca'];
  } else {
    $troca = 'NAO';
  }
  echo $troca;
  $id_troca = $_POST['id_usuario1'];
  if (isset($troca)) {
  } else {
    $troca = 'Nao';
  }
  $query_sd_posto = $conexao->prepare("SELECT * FROM posto WHERE id_posto = '$idposto'");
  $query_sd_posto->execute();
  while ($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
    $Tipo_Desse_Posto = $linha['tipo_sv'];
    $PostoId = $linha['id_posto'];
    $NomePosto = $linha['nome_posto'];
    $qtdPosto = $linha['qtd_mil'];
    $tipoFolga = $linha['tipo_folga'];
    $graduacaoPosto = $linha['posto_graduacao'];
    $servicoPosto = $linha['posto_servico'];
    $curso = $linha['curso'];
  }





  if ($troca == 'SIM') {
    date_default_timezone_set('America/Sao_Paulo');
    $datahora   = date('d/m/Y H:i:s a', time());

    $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id_troca'"); //SELECIONA A TABELA DE MILITARES
    $Atividade_militar->execute(); //EXECUTA TABELA
    while ($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
      $graduacao = $atv_mil['nome_graduacao'];
      $nome = $atv_mil['nome_de_guerra'];
      $trocado = $graduacao . ' ' . $nome;
    }
    $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id_mil2'"); //SELECIONA A TABELA DE MILITARES
    $Atividade_militar->execute(); //EXECUTA TABELA
    while ($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
      $graduacao = $atv_mil['nome_graduacao'];
      $nome = $atv_mil['nome_de_guerra'];
      $trocado2 = $graduacao . ' ' . $nome;
    }
    $observacao  =  $trocado . ' -> ' . $trocado2;
    $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '3', '$id_desse_user')";
    $result = $conect->query($sqlAtividade);


    $query = $conexao->prepare("INSERT INTO `escala` (`data`, `fk_militar`, `fk_posto`, `tipo`,`substituicao`,`s1`,`s2`) VALUES ('$data', '$id_troca',
        '$idposto', '$tiposv',1,$id_troca,$id_mil2)");
    $query->execute();
    $sql_definir = "UPDATE militares SET $tipoFolga = '$data' WHERE id='$id_troca'";
    $result = $conect->query($sql_definir);

    $_SESSION['msg'] = "<h2 style='color:green;'>Serviço adicionado com sucesso!!!</h2>";
    header('Location: definirinsert.php');
  }
  date_default_timezone_set('America/Sao_Paulo');
  $datahora   = date('d/m/Y H:i:s a', time());

  $datahoraa = (string) $datahora;    //  string $datahora;
  $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id_mil'"); //SELECIONA A TABELA DE MILITARES
  $Atividade_militar->execute(); //EXECUTA TABELA
  while ($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
    $graduacao = $atv_mil['nome_graduacao'];
    $nome = $atv_mil['nome_de_guerra'];
    $observacao = $graduacao . ' ' . $nome;
  }


  if ($troca == 'NAO') {
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '11', '$id_desse_user')";
    $result = $conect->query($sqlAtividade);


    $query = $conexao->prepare("INSERT INTO `escala` (`data`, `fk_militar`, `fk_posto`, `tipo`,`substituicao`,`s1`,`s2`) VALUES ('$data', '$id_mil',
        '$idposto', '$tiposv',null,0,0)");
    $query->execute();
    $sql_definir = "UPDATE militares SET $tipoFolga = '$data' WHERE id='$id_mil'";
    $result = $conect->query($sql_definir);

    $_SESSION['msg'] = "<h2 style='color:green;'>Serviço adicionado com sucesso!!!</h2>";
    header('Location: definirinsert.php');
  }
} else {
  $_SESSION['msg'] = "<h2 style='color:red;'>Erro! Nem todos os campos foram selecionados!!!</h2>";
  header('Location: definirinsert.php');
}
