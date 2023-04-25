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
if(!empty($_GET['id'])){  
    include_once('../conexoes/conect.php');
    
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];
    $mod = $_GET['mod'];
    echo $tipo.'<BR>';
    $sqlSelect = "SELECT * FROM militares WHERE id=$id";
  
    $result = $conect->query($sqlSelect);
  
    /*print_r($result);*/
    if($result->num_rows > 0){
      
      while($user_data = mysqli_fetch_assoc($result)){
        $nome_de_guerra = $user_data['nome_de_guerra'];
        $data_ultimo_sv_red = $user_data['data_ultimo_sv_red'];
        $graduacao = $user_data['graduacao'];
        $antiguidade = $user_data['antiguidade'];
        $data_ultimo_sv = $user_data['data_ultimo_sv'];
        $servico = $user_data['servico'];
        $atividade = $user_data['atividade'];
      }
     
    }else{
      header('Location: ../gerenciamento/editmilitargerencia.php');
     }
    
     if($mod == 'PRETA'){
         echo $id .'<BR>';
                echo 'DATA ULTIMO SV '. $data_ultimo_sv .'<BR>';
                echo 'PRETA'.'<BR>';
                date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
                $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id'");//SELECIONA A TABELA DE MILITARES
                $Atividade_militar->execute(); //EXECUTA TABELA
                while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
                  $graduacao = $atv_mil['nome_graduacao'];
                  $nome = $atv_mil['nome_de_guerra'];
                  $observacao = $graduacao . ' '. $nome;
                }
        
          $datahoraa = (string) $datahora;    //  string $datahora;
            $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '18', '$id_desse_user')";
            $result = $conect->query($sqlAtividade);
            
         
                $sql = "SELECT * FROM escala a INNER JOIN posto p ON p.id_posto = a.fk_posto WHERE p.tipo_folga = '$tipo' AND a.fk_militar = '$id' AND a.data < '$Data_Atual_Atualizada' AND  a.tipo = 'PRETA' ORDER BY data DESC LIMIT 1 ";
                $sxecute = $conect->query($sql);
                echo $sql .'<br>';
                while($fire = mysqli_fetch_assoc($sxecute)){
                    $data = $fire['data'];
                    $fk_militar = $fire['fk_militar'];
                    echo $data .' - '. $fk_militar . '<br>';
                    
                  }
                  if(isset($data)){
                      echo 'atualiza';
                    $sql = "UPDATE militares SET $tipo='$data' WHERE id='$id' ";
                    $sxecute = $conect->query($sql);
                    $_SESSION['msg'] = "<h2 style='color:green;'>Militar Editado com sucesso!</h2>";
                    header('Location: ../gerenciamento/editmilitargerencia.php');
                  }else{
                    echo 'nova';
                    $sql = "UPDATE militares SET $tipo='2000-01-01' WHERE id='$id' ";
                    $sxecute = $conect->query($sql);
                    $_SESSION['msg'] = "<h2 style='color:green;'>Militar Editado e Nenhum serviço encontrado!</h2>";
                    header('Location: ../gerenciamento/editmilitargerencia.php');
                  }
                

     }
     if($mod == 'VERMELHA'){
        echo $id .'<BR>';
                echo 'DATA ULTIMO SV '. $data_ultimo_sv .'<BR>';
                echo 'PRETA'.'<BR>';
                date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
                $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$id'");//SELECIONA A TABELA DE MILITARES
                $Atividade_militar->execute(); //EXECUTA TABELA
                while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
                  $graduacao = $atv_mil['nome_graduacao'];
                  $nome = $atv_mil['nome_de_guerra'];
                  $observacao = $graduacao . ' '. $nome;
                }
          $datahoraa = (string) $datahora;    //  string $datahora;
            $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '19', '$id_desse_user')";
            $result = $conect->query($sqlAtividade);
            
              $sql = "SELECT * FROM escala a INNER JOIN posto p ON p.id_posto = a.fk_posto WHERE p.tipo_folga = '$tipo' AND a.fk_militar = '$id' AND a.data < '$Data_Atual_Atualizada' AND  a.tipo = 'VERMELHA' ORDER BY data DESC LIMIT 1 ";
              $sxecute = $conect->query($sql);
              echo $sql .'<br>';
              while($fire = mysqli_fetch_assoc($sxecute)){
                  $data = $fire['data'];
                  $fk_militar = $fire['fk_militar'];
                  echo $data .' - '. $fk_militar . '<br>';
                  
                }
                if(isset($data)){
                    echo 'atualiza';
                    $sql = "UPDATE militares SET $tipo='$data' WHERE id='$id' ";
                    $sxecute = $conect->query($sql);
                    $_SESSION['msg'] = "<h2 style='color:green;'>Militar Editado com sucesso!</h2>";
                    header('Location: ../gerenciamento/editmilitargerencia.php');
                    
                  }else{
                      echo 'nova';
                    $sql = "UPDATE militares SET $tipo='2000-01-01' WHERE id='$id' ";
                    $sxecute = $conect->query($sql);
                    $_SESSION['msg'] = "<h2 style='color:green;'>Militar Editado com sucesso e Nenhum serviço encontrado!!</h2>";
                    header('Location: ../gerenciamento/editmilitargerencia.php');
                    
                  }
              
    }
   
    }else{
        
        $_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um usuário!</h2>";
        header("Location: gerenciamento/editmilitargerencia.php");
    }
   