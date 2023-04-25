
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
    $contar = $_POST['conter'];
    $f = 0;
    while($a < $contar){
      if(isset($_POST['escalado'.$a])){ 
      $id_selecionado[$f] = $_POST['escalado'.$a]; 
      $f++;
      }
      $a++;
    }
   echo $contar;
   print_r($id_selecionado);
  echo 'ERROR! <br><a href="../gerenciamento/insertanotacao.php">VOLTAR</a>';
  $inserir = 0;
  $a = count($id_selecionado);
  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
   $observacao  =  implode(" ", $id_selecionado);
   $datahoraa = (string) $datahora;    //  string $datahora;
     $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '30', '$id_desse_user')";
     $result = $conect->query($sqlAtividade);
    while($a > $inserir){
        $query_impedimento = $conexao->prepare("SELECT * FROM anotacoes WHERE id_anotacoes = '$id_selecionado[$inserir]'");//SELECIONA A TABELA DE MILITARES
        $query_impedimento->execute(); //EXECUTA TABELA
      while($impedimento = $query_impedimento->fetch(PDO::FETCH_ASSOC)) {
          $sts = $impedimento['sts'];
        }
        if($sts == 1){
            echo '<br>Desativa';
            // Para desativar
            $query = $conexao->prepare("UPDATE anotacoes SET sts = 2 WHERE id_anotacoes = '$id_selecionado[$inserir]'");
            $query->execute(); 
        }
        if($sts == 2){
            // Para ativar
            echo '<br>aTIVA';
            $query = $conexao->prepare("UPDATE anotacoes SET sts = 1 WHERE id_anotacoes = '$id_selecionado[$inserir]'");
    $query->execute(); 

        }
    
   $_SESSION['msg'] = "<h2 style='color:green;'>Anotação Desativada/Ativada com sucesso!!!</h2>";
  header('Location: insertanotacao.php');   
     $inserir++;
   }


}
if(isset($_POST['delete'])){
    $a = 0;
    $contar = $_POST['conter'];
    $f = 0;
    while($a < $contar){
      if(isset($_POST['escalado'.$a])){ 
      $id_selecionado[$f] = $_POST['escalado'.$a]; 
      $f++;
      }
      $a++;
    }
  echo $contar;
  print_r($id_selecionado);
  echo 'ERROR! <br><a href="../gerenciamento/insertanotacao.php">VOLTAR</a>';
  $inserir = 0;
  $a = count($id_selecionado);
  date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
  $observacao  =  implode(" ", $id_selecionado);
  $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '31', '$id_desse_user')";
    $result = $conect->query($sqlAtividade);
    while($a > $inserir){
      
        
            echo '<br>Desativa';
            // Para desativar
            $query = $conexao->prepare("DELETE FROM anotacoes WHERE id_anotacoes = '$id_selecionado[$inserir]'");
            $query->execute(); 
            
            $inserir++;  
            $_SESSION['msg'] = "<h2 style='color:green;'>Anotação Excluida com sucesso!!!</h2>";
  header('Location: insertanotacao.php');  
    }
   
}


