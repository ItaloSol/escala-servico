<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../dados/postos.php');
include_once('../dados/previsao.php');
include_once('../dados/escala.php');
if (isset($_POST['escala'])) {
    $Data_Selecionada = $_POST['d'];
    
}else{
    $Data_Selecionada = $Desc_Escala_Data[0];
}
//echo $Data_Selecionada;
$query_externa = $conexao->prepare("SELECT * FROM externa e INNER JOIN militares m ON m.id = e.fk_militar INNER JOIN posto p ON p.id_posto = e.fk_posto INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE e.data = '$Data_Selecionada'"); 
$query_externa->execute(); 
$i = 0;
 while($linha = $query_externa->fetch(PDO::FETCH_ASSOC)) {
    $id_externa = $linha['id_externa'];
    $fk_militar = $linha['nome_de_guerra']; 
    $data = $linha['data'];
    $id_militar = $linha['id'];
    $graduacao = $linha['nome_graduacao'];
    $fk_posto = $linha['nome_posto'];
    $tipo = $linha['tipo'];
    
    $Externa_Id_Militar[$i] = $id_militar;
    $Externa_ID[$i] = $id_externa;
    $Externa_Graduacao[$i] = $graduacao;
    $Externa_Nome[$i] = $fk_militar;
    $Externa_Data[$i] = $data;
    $Externa_Posto[$i] = $fk_posto;
    $Externa_Tipo[$i] = $tipo;
    $i++;
    
 }
 
 if(isset($Externa_Id_Militar)){
    $Impedido_Externa = '(' . implode(',', $Externa_Id_Militar) .')';
 }else{
    $Externa_Id_Militar = 0;
    $Impedido_Externa = '(0)';
 }
// print_r($Impedido_Externa);
// echo $Impedido_Externa;