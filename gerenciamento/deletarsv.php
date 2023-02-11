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

if (isset($_GET['id'])) {
  include_once('../conexoes/conect.php');

  $id_escala = $_GET['id'];
  $sqlSelect = "SELECT * FROM escala a INNER JOIN militares m ON a.fk_militar = m.id WHERE a.id_escala=$id_escala";
  $result = $conect->query($sqlSelect);
  $tipo_sv = $_GET['tipo'];
  $id_posto = $_GET['id_posto'];
  $tipo_posto = $_GET['posto'];
  if ($tipo_sv == 'PRETA') {
    $tipo = 1;
  }
  if ($tipo_sv == 'VERMELHA') {
    $tipo = 2;
  }
  echo $tipo . '<br>';
  echo $id_escala . '<br>';

  while ($user_data = mysqli_fetch_assoc($result)) {
    $id = $user_data['id'];
    $nome_de_guerra = $user_data['nome_de_guerra'];
    $graduacao = $user_data['graduacao'];
  }
  date_default_timezone_set('America/Sao_Paulo');
  $datahora   = date('d/m/Y H:i:s a', time());
  $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id'");//SELECIONA A TABELA DE MILITARES
  $Atividade_militar->execute(); //EXECUTA TABELA
  while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
      $graduacao = $atv_mil['nome_graduacao'];
      $nome = $atv_mil['nome_de_guerra'];
      $observacao = $graduacao . ' '. $nome;
  }
  $datahoraa = (string) $datahora;    //  string $datahora;
  $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '28', '$id_desse_user')";
  $result = $conect->query($sqlAtividade);
  echo $tipo . '<BR>';
  
    $sqlSelect = "SELECT * FROM militares WHERE id=$id";

    $result = $conect->query($sqlSelect);

    /*print_r($result);*/

    if ($result->num_rows > 0) {

      while ($user_data = mysqli_fetch_assoc($result)) {
        $dados = [
        'nome_de_guerra' => $user_data['nome_de_guerra'],
        'graduacao' => $user_data['graduacao'],
        'antiguidade' => $user_data['antiguidade'],
        'servico' => $user_data['servico'],
        'atividade' => $user_data['atividade'],
        'data_ultimo_sv_red' => $user_data['data_ultimo_sv_red'],
        'data_ultimo_sv' => $user_data['data_ultimo_sv'],
        'missao' => $user_data['missao'],
        'missao_red' => $user_data['missao_red'],
        'externo' => $user_data['externo'],
        'externo_red' => $user_data['externo_red'],
        'escalado_externo' => $user_data['escalado_externo'],
        'escalado_externo_red' => $user_data['escalado_externo_red']
        ];
      }
      echo $nome_de_guerra . '<BR>';
    } else {
      header('Location: ../gerenciamento/deletar_sv.php');
    }
    $sqlSelect = "DELETE FROM escala WHERE id_escala= $id_escala";
    $result = $conect->query($sqlSelect);
    
    
    $sql = "SELECT * FROM `escala` WHERE fk_militar = '$id' AND data < '$dados[$tipo_posto]' AND fk_posto = '$id_posto' ORDER BY data DESC LIMIT 1 ";
      $sxecute = $conect->query($sql);
      echo $sql . '<br>';
      while ($fire = mysqli_fetch_assoc($sxecute)) {
        $data = $fire['data'];
        $fk_militar = $fire['fk_militar'];
        echo $data . ' - ' . $fk_militar . '<br>';
      }
    
      if (isset($data)) {
        echo 'atualiza';
        $sql = "UPDATE militares SET $tipo_posto = '$data' WHERE id='$id' ";
        echo $sql;
       $sxecute = $conect->query($sql);
        $_SESSION['msg'] = "<h2 style='color:green;'>Serviço Excluido com sucesso!</h2>";
        header('Location: ../gerenciamento/deletar_sv.php');
      } else {
        echo 'nova';
        $sql = "UPDATE militares SET $tipo_posto = '2000-01-01' WHERE id='$id' ";
        $sxecute = $conect->query($sql);
        $_SESSION['msg'] = "<h2 style='color:green;'>Serviço Excluido com sucesso!</h2>";
        header('Location: ../gerenciamento/deletar_sv.php');
      }
    
    
      }else {

      $_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um usuário!</h2>";
      header("Location: gerenciamento/deletar_sv.php");
    }
    
    
    
  