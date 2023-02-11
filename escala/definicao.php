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

if (isset($_POST['svdefinido'])) {
    $_SESSION['msg'] = "<h2 style='color:green;'>Serviço adicionado com sucesso!!!</h2>";

    $Quantidade_De_Militares = $_POST['qtd'];
    $Data_A_Definir = $_POST['data'];

    $a = 0;
    while ($a < $Quantidade_De_Militares) {
        $Posto_Id_Definir[$a] = $_POST['id_posto_a' . $a];
        $Definir_Servico_Por_Id[$a] = $_POST['id_definir' . $a];
        if ($Definir_Servico_Por_Id[$a] < 0) {
            $_SESSION['msg'] = "<h2 style='color:red;'>Erro! Nem todos os nomes foram selecionados!!!</h2>";
            header('Location: autoescala.php');
        }
        $a++;
    }
    $Quantidade_De_Militares_Verifica = count($Definir_Servico_Por_Id);
    if ($Quantidade_De_Militares == $Quantidade_De_Militares_Verifica) {


        $Quantidade = count($Definir_Servico_Por_Id);
        $a = 0;
        while ($a < $Quantidade_De_Militares) {
            echo '<br> Definir_Servico_Por_Id => ' . $Definir_Servico_Por_Id[$a];
            $a++;
        }
        date_default_timezone_set('America/Sao_Paulo');
        $datahora   = date('d/m/Y H:i:s a', time());
        $observacao  =  'Sem alteração Dia ' . $Data_A_Definir;
        $datahoraa = (string) $datahora;    //  string $datahora;
        $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '1', '$id_desse_user')";
          $result = $conect->query($sqlAtividade);

        $i = 0;
        $a = 0;
        $r = 0;
        while ($a < $Quantidade_De_Militares) {
            $query_sd_posto = $conexao->prepare("SELECT * FROM posto WHERE id_posto = '$Posto_Id_Definir[$a]'");
            $query_sd_posto->execute();

            if ($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {

                $Postos_Nome_Escalado_Definir = $linha['nome_posto'];
                $Quantidade_Mil_Posto_Selec = $linha['qtd_mil'];
                $Tipo_Posto_Selec = $linha['tipo_folga'];
                $Id_Posto_Selec = $linha['id_posto'];
                $Tipo_De_Sv = $linha['posto_servico'];
                $Posto_Graduacao_Selec = $linha['posto_graduacao'];
                echo '=> Nome: ' . $Postos_Nome_Escalado_Definir . ' ';
            }

            $query = $conexao->prepare("INSERT INTO `escala` (`data`, `fk_militar`, `fk_posto`, `tipo`,`substituicao`,`s1`,`s2`) VALUES ('$Data_A_Definir', '$Definir_Servico_Por_Id[$a]',
                '$Posto_Id_Definir[$a]', '$Tipo_De_Sv',null,0,0)");
            $query->execute();
            $sql_definir = "UPDATE militares SET $Tipo_Posto_Selec = '$Data_A_Definir' WHERE id='$Definir_Servico_Por_Id[$a]'";
            $result = $conect->query($sql_definir);
            $a++;
        }
    } else {
        $_SESSION['msg'] = "<h2 style='color:red;'>Erro! Nem todos os nomes foram selecionados!!!</h2>";
        header('Location: autoescala.php');
    }
    header('Location: autoescala.php');
}
//      //      //      //      //
if (isset($_POST['definirsv'])) {
    $_SESSION['msg'] = "<h2 style='color:green;'>Serviço adicionado com sucesso!!!</h2>";

    $Quantidade_De_Militares = $_POST['qtd'];
    $Data_A_Definir = $_POST['data'];
    $a = 0;
    date_default_timezone_set('America/Sao_Paulo');
    $datahora   = date('d/m/Y H:i:s a', time());
    $observacao  =  'Com alteração Dia ' . $Data_A_Definir;
    $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '25', '$id_desse_user')";
     $result = $conect->query($sqlAtividade);
    while ($a < $Quantidade_De_Militares) {
        $Posto_Id_Definir[$a] = $_POST['id_posto_a' . $a];
        $Definir_Servico_Por_Nome[$a] = $_POST['usuario' . $a];
        $Definir_Servico_Por_Id[$a] = $_POST['id_usuario' . $a];

        if ($Definir_Servico_Por_Id[$a] != $Quantidade_De_Militares) {
            $_SESSION['msg'] = "<h2 style='color:red;'>Erro! Nem todos os nomes foram selecionados!!!</h2>";
            header('Location: autoescala.php');
        }
        $a++;
    }
    $Quantidade = count($Definir_Servico_Por_Id);
    $i = 0;
    $r = 0;
    $a = 0;
    while ($a < $Quantidade) {
        echo $_POST['id_usuario' . $a];
        echo   $Definir_Servico_Por_Nome[$a] . '<br>';
        echo $Definir_Servico_Por_Id[$a] . '<br>';

        $query_sd_posto = $conexao->prepare("SELECT * FROM posto WHERE id_posto = $Posto_Id_Definir[$a]");
        $query_sd_posto->execute();

        if ($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
            $Postos_Nome_Escalado_Definir = $linha['nome_posto'];
            $Quantidade_Mil_Posto_Selec = $linha['qtd_mil'];
            $Tipo_Posto_Selec = $linha['tipo_folga'];
            $Id_Posto_Selec = $linha['id_posto'];
            $Tipo_De_Sv = $linha['posto_servico'];
            $Posto_Graduacao_Selec = $linha['posto_graduacao'];
            echo '=> Nome: ' . $Postos_Nome_Escalado_Definir . ' ';
        }
        echo 'Id posto Vermelha => ' . $Posto_Id_Definir[$a] . '<br>';
        $query = $conexao->prepare("INSERT INTO `escala` (`data`, `fk_militar`, `fk_posto`, `tipo`,`substituicao`,`s1`,`s2`) VALUES ('$Data_A_Definir', '$Definir_Servico_Por_Id[$a]', '$Posto_Id_Definir[$a]', '$Tipo_De_Sv',null,0,0)");
        $query->execute();
        $sql_definir = "UPDATE militares SET $Tipo_Posto_Selec = '$Data_A_Definir' WHERE id='$Definir_Servico_Por_Id[$a]'";
        $result = $conect->query($sql_definir);
        echo ' Nome => ' . $Posto_Id_Definir[$a] . ' $M => ' . $Definir_Servico_Por_Id[$a] . '<br>';
        $a++;
    }
    header('Location: autoescala.php');
}
//      //      //      //      //
if (isset($_POST['substituir'])) {

    $_SESSION['msg'] = "<h2 style='color:green;'>Serviço substituido com sucesso!!!</h2>";
    date_default_timezone_set('America/Sao_Paulo');
    $datahora   = date('d/m/Y H:i:s a', time());
    

    $a = 0;
    $Quantidade_De_Militares = $_POST['qtd'];
    $Data_A_Definir = $_POST['data'];
    $Total_De_Militares_Escalados = $_POST['num_escalado'];
    while ($a < $Total_De_Militares_Escalados) {
        $Posto_Id_Definir[$a] = $_POST['id_posto_a' . $a];
        if (isset($_POST['escala' . $a])) {
            $Escala_Antiga[$a] = $_POST['escala' . $a];
        }
        // $Posto_Escala_Antiga[$a] = $_POST['posto_escalado'.$a];
        $a++;
    }
    $observacao  =  'Com alteração Dia ' . $Data_A_Definir;
    $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '26', '$id_desse_user')";
     $result = $conect->query($sqlAtividade);

    $a = 0;
    if (isset($_POST['escala' . $a])) {
        $Quantidade_Escala_Antiga = count($Escala_Antiga);
    }
    $a = 0;
    while ($a < $Quantidade_De_Militares) {

        $Definir_Servico_Por_Nome[$a] = $_POST['usuario' . $a];
        $Definir_Servico_Por_Id[$a] = $_POST['id_usuario' . $a];
        if ($Definir_Servico_Por_Id[$a] <= 0) {
            $_SESSION['msg'] = "<h2 style='color:red;'>Erro! Nem todos os nomes foram selecionados!!!</h2>";
     header('Location: autoescala.php');
        }
        $a++;
    }
    $Quantidade = count($Definir_Servico_Por_Id);
    echo $Quantidade .' = '. $Quantidade_De_Militares;
    $i = 0;
    $a = 0;
    $r = 0;
    $Existe_Servico = 'inexistente';
    while ($a < $Quantidade_De_Militares) {
        echo '<br>Sobre o '. $Definir_Servico_Por_Nome[$a] . ' ----------------------- <br>';
        $query_sd_posto = $conexao->prepare("SELECT * FROM posto WHERE id_posto = $Posto_Id_Definir[$a]");
        $query_sd_posto->execute();

        if ($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
            $Postos_Nome_Escalado_Definir = $linha['nome_posto'];
            $Quantidade_Mil_Posto_Selec = $linha['qtd_mil'];
            $Tipo_Posto_Selec = $linha['tipo_folga'];
            $Id_Posto_Selec = $linha['id_posto'];
            $Tipo_De_Sv = $linha['posto_servico'];
            $Posto_Graduacao_Selec = $linha['posto_graduacao'];
            
        }
 echo "SELECT * FROM escala a INNER JOIN posto p ON a.fk_posto = p.id_posto WHERE a.id_escala = '$Escala_Antiga[$a]' <br>";
        $Consulta_Escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN posto p ON a.fk_posto = p.id_posto WHERE a.id_escala = '$Escala_Antiga[$a]'");
        $Consulta_Escala->execute();


        if ($Consulta = $Consulta_Escala->fetch(PDO::FETCH_ASSOC)) {
            $Existe_Servico = 'existe';
            $id_escala = $Consulta['id_escala'];
          
            $fk_militar_id = $Consulta['fk_militar'];
            $tipo = $Consulta['tipo'];
            $queryi = $conexao->prepare("DELETE FROM escala WHERE id_escala = '$id_escala'");
             $queryi->execute();
        }
        echo "SELECT * FROM escala a INNER JOIN posto p ON a.fk_posto = p.id_posto WHERE a.fk_militar = '$fk_militar_id' AND p.tipo_folga = '$Tipo_Posto_Selec' AND data < '$Data_A_Definir' ORDER BY DATA DESC LIMIT 1<br>";
        $Consulta_Escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN posto p ON a.fk_posto = p.id_posto WHERE a.fk_militar = '$fk_militar_id' AND p.tipo_folga = '$Tipo_Posto_Selec' AND data < '$Data_A_Definir' ORDER BY DATA DESC LIMIT 1");
        $Consulta_Escala->execute();


        if ($Consulta = $Consulta_Escala->fetch(PDO::FETCH_ASSOC)) {
           
            $data1 = $Consulta['data'];
            $fk_militar_id = $Consulta['fk_militar'];
            $tipo = $Consulta['tipo'];
        

            echo 'achou <br>';

            $sqlUpdate2 = "UPDATE militares SET $Tipo_Posto_Selec = '$data1' WHERE id ='$fk_militar_id'";
            $resultii = $conect->query($sqlUpdate2);
            $sqlUpdate0 = "UPDATE militares SET $Tipo_Posto_Selec = '$Data_A_Definir' WHERE id ='$Definir_Servico_Por_Id[$a]'";
            $result = $conect->query($sqlUpdate0); 
            $query = $conexao->prepare("INSERT INTO `escala` (`data`, `fk_militar`, `fk_posto`, `tipo`,`s1`,`s2`) VALUES ('$Data_A_Definir', 
                       '$Definir_Servico_Por_Id[$a]', '$Posto_Id_Definir[$a]', '$Tipo_De_Sv','0','0')");
            $query->execute();
            
        }else {
            echo 'não achou <br>';
            $_SESSION['msg'] = "<h2 style='color:green;'>Serviço foi mudado com sucesso!!! </h2>";
            
            $sqlUpdate2 = "UPDATE militares SET $Tipo_Posto_Selec = '2000-01-01' WHERE id ='$fk_militar_id'";
            $resultii = $conect->query($sqlUpdate2);
            $sqlUpdate0 = "UPDATE militares SET $Tipo_Posto_Selec = '$Data_A_Definir' WHERE id ='$Definir_Servico_Por_Id[$a]'";
            $result = $conect->query($sqlUpdate0);
            
            $query = $conexao->prepare("INSERT INTO `escala` (`data`, `fk_militar`, `fk_posto`, `tipo`,`s1`,`s2`) VALUES ('$Data_A_Definir', 
                       '$Definir_Servico_Por_Id[$a]', '$Posto_Id_Definir[$a]', '$Tipo_De_Sv','0','0')");
            $query->execute();
           
        }
            echo '------------------ Fim do  ----------------<br>';
        $a++;
    }
       
           
        
    



    header('Location: autoescala.php');
}
//
if(isset($_GET['dt'])){
    
    $Data_A_Definir = $_GET['dt'];
    $_SESSION['msg'] = "<h2 style='color:green;'>Serviço adicionado com sucesso!!!</h2>";
    date_default_timezone_set('America/Sao_Paulo');
    $datahora   = date('d/m/Y H:i:s a', time());
    $observacao  =  'Com alteração Dia ' . $Data_A_Definir;
    $datahoraa = (string) $datahora;    //  string $datahora;
    $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '33', '$id_desse_user')";
     $result = $conect->query($sqlAtividade);

     $query = $conexao->prepare("INSERT INTO `escala` (`data`, `fk_militar`, `fk_posto`, `tipo`,`substituicao`,`s1`,`s2`) VALUES ('$Data_A_Definir', '3', '8', 'NENHUM',null,0,0)");
     $query->execute();

     header('Location: autoescala.php');
}