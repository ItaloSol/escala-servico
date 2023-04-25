
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
  $a = 0;
  $idpostoexterno = $_POST['idpostoexterno'];
  $tiposv = $_POST['tiposv'];
  $contar = $_POST['conter'];
  $data = $_POST['data'];
  $f = 0;
  while($a < $contar){
    if(isset($_POST['escalado'.$a])){ 
    $id_selecionado[$f] = $_POST['escalado'.$a]; 
    $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id_selecionado[$f]'");//SELECIONA A TABELA DE MILITARES
    $Atividade_militar->execute(); //EXECUTA TABELA
    while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
        $graduacao = $atv_mil['nome_graduacao'];
        $nome = $atv_mil['nome_de_guerra'];
        $observacao[$f] = $graduacao . '_'. $nome;
    }
    $f++;
    }
    $a++;
  }
  // echo $idpostoexterno;
  // echo $tiposv;
  // print_r($id_selecionado);
  echo 'ERROR! <br><a href="../gerenciamento/addsvexterno.php">VOLTAR</a>';
  $inserir = 0;
  $a = count($id_selecionado);
  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
  $observacao  =  implode(" ", $observacao);
  $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '20', '$id_desse_user')";
    $result = $conect->query($sqlAtividade);
  while($a > $inserir){
    
   $query = $conexao->prepare("INSERT INTO `externa` ( `fk_militar`,`tipo`,`data`,`fk_posto`) VALUES ('$id_selecionado[$inserir]', '$tiposv',
   '$data', '$idpostoexterno')");
   $query->execute(); 
   $query = $conexao->prepare("UPDATE militares SET externo = '$data' WHERE id = $id_selecionado[$inserir]");
   $query->execute(); 
  $_SESSION['msg'] = "<h2 style='color:green;'>Serviço adicionado com sucesso!!!</h2>";
  header('Location: addsvexterno.php');   
    $inserir++;
  }


}else{
  $_SESSION['msg'] = "<h2 style='color:red;'>Erro! Nem todos os campos foram selecionados!!!</h2>";
  header('Location: definirinsert.php');       
  }

