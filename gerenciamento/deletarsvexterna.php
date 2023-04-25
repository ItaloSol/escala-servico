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
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
if(isset($_GET['id'])){  
    $id_escala = $_GET['id'];
 
    $sqlSelect = "SELECT * FROM externa e INNER JOIN militares m ON e.fk_militar = m.id WHERE e.id_externa = $id_escala";
    $result = $conect->query($sqlSelect);
    while($user_data = mysqli_fetch_assoc($result)){
        $fk_militar = $user_data['fk_militar'];
        $data = $user_data['data'];
        $graduacao = $user_data['graduacao'];
        $nome_de_guerra = $user_data['nome_de_guerra'];
    }

    $sqlSelect = "SELECT * FROM externa WHERE fk_militar = $fk_militar AND data < '$data'";
    $result = $conect->query($sqlSelect);
    while($user_data = mysqli_fetch_assoc($result)){
        
        $dataatu = $user_data['data'];
    }

    if(isset($dataatu)){

    }else{
        $dataatu = '2022-01-01';
    }

    date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
    $Atividade_militar = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$fk_militar'");//SELECIONA A TABELA DE MILITARES
    $Atividade_militar->execute(); //EXECUTA TABELA
    while($atv_mil = $Atividade_militar->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
        $graduacao = $atv_mil['nome_graduacao'];
        $nome = $atv_mil['nome_de_guerra'];
        $observacao = $graduacao . ' '. $nome;
    }
    $datahoraa = (string) $datahora;    //  string $datahora;
      $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '21', '$id_desse_user')";
      $result = $conect->query($sqlAtividade); 
   
    

   
    $sqlSelect = "DELETE FROM externa  WHERE id_externa=$id_escala";
    $result = $conect->query($sqlSelect);
    $query = $conexao->prepare("UPDATE militares SET externo = '$dataatu' WHERE id = $fk_militar");
    $query->execute(); 
    $_SESSION['msg'] = "<h2 style='color:green;'>Serviço Excluido com sucesso!</h2>";
            header('Location: ../gerenciamento/deleteexterno.php');
 

    }else{
        
        $_SESSION['msg'] = "<h2 style='color:red;'>Necessário selecionar um usuário!</h2>";
        header("Location: gerenciamento/deleteexterno.php");
        
    }
   