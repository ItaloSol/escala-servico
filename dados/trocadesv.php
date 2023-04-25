<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
include_once('../dados/postos.php');
include_once('../dados/escala.php');
$Data_fo = date('Y-m-d', strtotime('+' . 1 . 'day', strtotime($Desc_Escala_Data[0])));
$Data_folga_troca = date('Y-m-d', strtotime('-' . $Qtd_Prevista[12] . 'day', strtotime($Data_fo)));
//echo ' data '. $Desc_Escala_Data[0] . ' - '. $Data_fo; 

$Contar_Preta = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON m.id = a.fk_militar WHERE data < '$Data_fo' AND data > '$Data_folga_troca' AND substituicao = '1' ");
$Contar_Preta->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $Contar_Preta->fetch(PDO::FETCH_ASSOC)) { 
//echo  $Cont['nome_de_guerra'].'<br>';
$Troca_Sv[$i] = $Cont['s2'];
$i++;
}

if(isset($Troca_Sv)){
    $Impedido_Troca_Lista = '(' . implode(',', $Troca_Sv) .')';
 }else{
    $Troca_Sv = 0;
    $Impedido_Troca_Lista = '(0)';
 }

// print_r($Impedido_Troca_Lista);
?>