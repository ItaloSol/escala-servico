<?php

if (isset($_POST['id_usuario'])) {
    session_start();
    include_once('../conexoes/conect.php');
    include_once('../conexoes/conecti.php');
    include_once('../acoes/conexao.php');
    include_once('../conexoes/conexaoo.php');
    include_once('../conexoes/conexao.php');
    $data_nasc = $_POST['data_nasc'];
    $id_usuario = $_POST['id_usuario'];
    $fk_militar = $_POST['fk_militar'];

    
   

        $query_postos = $conexao->prepare("UPDATE militares SET data_nasc = '$data_nasc'
  WHERE id = '$fk_militar'");
        $query_postos->execute(); //EXECUTA TABELA

        $_SESSION['msg'] = "<h2 style='color:yellow;'>Data de nascimento atualizada com sucesso!</h2>";
        header("Location: ../index.php");
   
}
