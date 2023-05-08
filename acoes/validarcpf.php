<?php

if(isset($_POST['id_usuario'])){
    session_start();
    include_once('../conexoes/conect.php');
  include_once('../conexoes/conecti.php');
  include_once('../acoes/conexao.php');
  include_once('../conexoes/conexaoo.php');
  include_once('../conexoes/conexao.php');
    $cpf = $_POST['email'];
    $id_usuario = $_POST['id_usuario'];
    $fk_militar = $_POST['fk_militar'];

function validaCPF($cpf = null) {

// Verifica se um número foi informado
if(empty($cpf)) {
    return false;
}

// Elimina possivel mascara
$cpf = preg_replace("/[^0-9]/", "", $cpf);
$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

// Verifica se o numero de digitos informados é igual a 11 
if (strlen($cpf) != 11) {
    return false;
}
// Verifica se nenhuma das sequências invalidas abaixo 
// foi digitada. Caso afirmativo, retorna falso
else if ($cpf == '00000000000' || 
    $cpf == '11111111111' || 
    $cpf == '22222222222' || 
    $cpf == '33333333333' || 
    $cpf == '44444444444' || 
    $cpf == '55555555555' || 
    $cpf == '66666666666' || 
    $cpf == '77777777777' || 
    $cpf == '88888888888' || 
    $cpf == '99999999999') {
    return false;
 // Calcula os digitos verificadores para verificar se o
 // CPF é válido
 } else {   
    
    for ($t = 9; $t < 11; $t++) {
        
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}
}
 if(validaCPF($cpf) == 1){
   
  $query_postos = $conexao->prepare("UPDATE usuarios SET valida='1', cpf='$cpf'
  WHERE id_senha = '$id_usuario'");
  $query_postos->execute(); //EXECUTA TABELA

    $_SESSION['msg'] = "<h2 style='color:yellow;'>CPF Cadastrado com sucesso!</h2>";
    header("Location: ../index.php");
 }else{
    $_SESSION['msg'] = "<h2 style='color:red;'>CPF INVALIDO! Insira um CPF válido!</h2>";
				header("Location: cpf.php");
 }
}
