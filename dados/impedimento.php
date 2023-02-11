<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../dados/impedimento.php');
include_once('../dados/postos.php');
include_once('../dados/previsao.php');
if (isset($_POST['escala'])) {
    $Data_Selecionada = $_POST['d'];
   
}
if(isset($_POST['imped'])){
    $Dia_Listado_Nov =  '('. $_POST['imped'] .')';
}else{
    $Dia_Listado_Nov =  '(0)';
}
$Contar_Preta = $conexao->prepare("SELECT * FROM impedimentos i INNER JOIN militares m ON m.id = i.fk_militares WHERE '$Data_Selecionada' BETWEEN  i.data_inicio AND i.data_final");
$Contar_Preta->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $Contar_Preta->fetch(PDO::FETCH_ASSOC)) { 
//echo  $Cont['nome_de_guerra'].'<br>';
$Impedido_Listado[$i] = $Cont['id'];
$i++;
}

if(isset($Impedido_Listado)){
    $Impedido_Lista = '(' . implode(',', $Impedido_Listado) .')';
 }else{
    $Impedido_Listado = 0;
    $Impedido_Lista = '(0)';
 }
 if (isset($_POST['dia'])) {
    $Dia_Selecionado = $_POST['dia'];
    if($_POST['feriado'] == '1'){
        $Dia_Selecionado = 'dom';
    }
    }
    $ver_dia = $conexao->prepare("SELECT * FROM  militares  WHERE data_de_sv LIKE '%$Dia_Selecionado%'");
$ver_dia->execute(); //EXECUTA TABELA
$i = 1;
while($impdia = $ver_dia->fetch(PDO::FETCH_ASSOC)) { 
//echo  $Cont['nome_de_guerra'].'<br>';
$Dia_Listado[$i] = $impdia['id'];
$i++;
}
if(isset($Dia_Listado)){
    $Impedido_Dia = '(' . implode(',', $Dia_Listado) .')';
 }else{
    $Dia_Listado = 0;
    $Impedido_Dia = '(0)';
 }
//  echo  ' ' . $Impedido_Dia; 