




<?php
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
$query_escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON a.fk_militar = m.id INNER JOIN posto p ON a.fk_posto = p.id_posto INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao ORDER BY a.data DESC , a.fk_posto asc");//SELECIONA A TABELA DE MILITARES
 $query_escala->execute(); //EXECUTA TABELA
 $a = 0;
 if($escala = $query_escala->fetch(PDO::FETCH_ASSOC)) {  
  $dataescala = $escala['data'];
 }
if (isset($_POST['escala'])) {
  $Data_Selecionada = $_POST['d'];
}else{
  $Data_Selecionada = $dataescala;
}

 $query_escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON a.fk_militar = m.id INNER JOIN posto p ON a.fk_posto = p.id_posto ORDER BY a.data ASC , a.fk_posto asc");//SELECIONA A TABELA DE MILITARES
 $query_escala->execute(); //EXECUTA TABELA
 $a = 0;
 while($escala = $query_escala->fetch(PDO::FETCH_ASSOC)) {     
   $idescala = $escala['id_escala'];
   $dataescala = $escala['data'];
   $nome_de_guerraescala = $escala['nome_de_guerra'];
   $servicoescala = $escala['tipo'];
   $postoescala = $escala['nome_posto'];
   $idmilitar = $escala['id'];
   $antiguidade = $escala['antiguidade'];
   $servico = $escala['servico'];
   $graduacao = $escala['graduacao'];
   $atividade = $escala['atividade'];
   $data_ultimo_sv = $escala['data_ultimo_sv'];
   $fk_impedimento = $escala['fk_impedimento'];
   $data_ultimo_sv_red = $escala['data_ultimo_sv_red'];
   $nomes1 = $escala['s1'];
   $nomes2 = $escala['s2'];
   $subistituicao = $escala['substituicao'];

    // DADOS DA ESCALA 
    $Escala_Id[$a] = $idescala;
    $Escala_Data[$a] = $dataescala;
    $Escala_Nome_Militar[$a] = $nome_de_guerraescala;
    $Escala_Tipo[$a] = $servicoescala;
    $Escala_Posto[$a] = $postoescala;
  //         //           //
  // SUBISTITUIÇÃO
  $Subistituido_S1_Id[$a] = $nomes1;
  $Subistituido_S2_Id[$a] = $nomes2;
  $Subistituido_Quest[$a] = $subistituicao;

  // DADOS DOS MILITARES NA ESCALA
        $Escala_Militar_Id[$a] = $idmilitar;
        $Escala_Militar_Antiguidade[$a] = $antiguidade;
        $Escala_Militar_Nome[$a] = $nome_de_guerraescala;
        $Escala_Militar_Servico[$a] = $servico;
        $Escala_Militar_Graduacao[$a] = $graduacao;
        $Escala_Militar_Atividade[$a] = $atividade;
        $Escala_Militar_Data_Ultimo_Sv[$a] = $data_ultimo_sv;
        $Escala_Militar_Id_Impedimento[$a] = $fk_impedimento;
        $Escala_Militar_Data_ultimo_Sv_Red[$a] = $data_ultimo_sv_red;
  //           //          //    
       $a++;

 }
 $Quantidade_Por_Escala = 0;

 $query_escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON a.fk_militar = m.id INNER JOIN posto p ON a.fk_posto = p.id_posto INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE p.prioridade != '-1' ORDER BY a.data DESC , p.prioridade asc, antiguidade ASC");//SELECIONA A TABELA DE MILITARES
 $query_escala->execute(); //EXECUTA TABELA
 $a = 0;
 while($escala = $query_escala->fetch(PDO::FETCH_ASSOC)) {     
   $idescala = $escala['id_escala'];
   $idpostoe = $escala['id_posto'];
   $dataescala = $escala['data'];
   $nome_de_guerraescala = $escala['nome_de_guerra'];
   $nome_secao = $escala['secao'];
   $servicoescala = $escala['tipo'];
   $postoescala = $escala['nome_posto'];
   $idmilitar = $escala['id'];
   $antiguidade = $escala['antiguidade'];
   $servico = $escala['servico'];
   $graduacao = $escala['nome_graduacao'];
   $atividade = $escala['atividade'];
   $data_ultimo_sv = $escala['data_ultimo_sv'];
   $fk_impedimento = $escala['fk_impedimento'];
   $data_ultimo_sv_red = $escala['data_ultimo_sv_red'];
   $nomes1 = $escala['s1'];
   $nomes2 = $escala['s2'];
   $subistituicao = $escala['substituicao'];
  
   // DADOS DA ESCALA 
   $Desc_Escala_Id_Posto[$a] = $idpostoe;
   $Desc_Escala_Id[$a] = $idescala;
   $Desc_Escala_Data[$a] = $dataescala;
   $Desc_Escala_Nome_Militar[$a] = $nome_de_guerraescala;
   $Desc_Escala_Tipo[$a] = $servicoescala;
   $Desc_Escala_Posto[$a] = $postoescala;
 //         //           //
  // SUBISTITUIÇÃO
  $Desc_Subistituido_S1_Id[$a] = $nomes1;
  $Desc_Subistituido_S2_Id[$a] = $nomes2;
  $Desc_Subistituido_Quest[$a] = $subistituicao;
  //    //    //    //
 // DADOS DOS MILITARES NA ESCALA
       $Desc_Escala_Militar_Id[$a] = $idmilitar;
       $Desc_Escala_Militar_Antiguidade[$a] = $antiguidade;
       $Desc_Escala_Militar_Nome[$a] = $nome_de_guerraescala;
       $Desc_Escala_Nome_Secao[$a] = $nome_secao;
       $Desc_Escala_Militar_Servico[$a] = $servico;
       $Desc_Escala_Militar_Graduacao[$a] = $graduacao;
       $Desc_Escala_Militar_Atividade[$a] = $atividade;
       $Desc_Escala_Militar_Data_Ultimo_Sv[$a] = $data_ultimo_sv;
       $Desc_Escala_Militar_Id_Impedimento[$a] = $fk_impedimento;
       $Desc_Escala_Militar_Data_ultimo_Sv_Red[$a] = $data_ultimo_sv_red;
  //           //          //    
   $a++;

 }
 $total_Escala = $a;
 $i = 0;
 while($i < $total_Escala){
    if($Desc_Escala_Data[$i] == $Data_Selecionada){
      $Quantidade_Por_Escala++;
      $i++;
    }else{
      $i++;
    }
 }
//echo $Quantidade_Por_Escala;
 $query_escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON a.fk_militar = m.id INNER JOIN posto p ON a.fk_posto = p.id_posto WHERE a.tipo = 'PRETA' ORDER BY a.data DESC , a.fk_posto asc");//SELECIONA A TABELA DE MILITARES
 $query_escala->execute(); //EXECUTA TABELA
 $a = 0;
 while($escala = $query_escala->fetch(PDO::FETCH_ASSOC)) {     
   $idescala = $escala['id_escala'];
   $dataescala = $escala['data'];
   $nome_de_guerraescala = $escala['nome_de_guerra'];
   $servicoescala = $escala['tipo'];
   $postoescala = $escala['nome_posto'];
   $idmilitar = $escala['id'];
   $antiguidade = $escala['antiguidade'];
   $servico = $escala['servico'];
   $graduacao = $escala['graduacao'];
   $atividade = $escala['atividade'];
   $data_ultimo_sv = $escala['data_ultimo_sv'];
   $fk_impedimento = $escala['fk_impedimento'];
   $data_ultimo_sv_red = $escala['data_ultimo_sv_red'];
   $nomes1 = $escala['s1'];
   $nomes2 = $escala['s2'];
   $subistituicao = $escala['substituicao'];
  
   // DADOS DA ESCALA 
   $Preta_Desc_Escala_Id[$a] = $idescala;
   $Preta_Desc_Escala_Data[$a] = $dataescala;
   $Preta_Desc_Escala_Nome_Militar[$a] = $nome_de_guerraescala;
   $Preta_Desc_Escala_Tipo[$a] = $servicoescala;
   $Preta_Desc_Escala_Posto[$a] = $postoescala;
 //         //           //
 // SUBISTITUIÇÃO
 $Preta_Subistituido_S1_Id[$a] = $nomes1;
 $Preta_Subistituido_S2_Id[$a] = $nomes2;
 $Preta_Subistituido_Quest[$a] = $subistituicao;
 //    //    //    //
 // DADOS DOS MILITARES NA ESCALA
       $Preta_Desc_Escala_Militar_Id[$a] = $idmilitar;
       $Preta_Desc_Escala_Militar_Antiguidade[$a] = $antiguidade;
       $Preta_Desc_Escala_Militar_Nome[$a] = $nome_de_guerraescala;
       $Preta_Desc_Escala_Militar_Servico[$a] = $servico;
       $Preta_Desc_Escala_Militar_Graduacao[$a] = $graduacao;
       $Preta_Desc_Escala_Militar_Atividade[$a] = $atividade;
       $Preta_Desc_Escala_Militar_Data_Ultimo_Sv[$a] = $data_ultimo_sv;
       $Preta_Desc_Escala_Militar_Id_Impedimento[$a] = $fk_impedimento;
       $Preta_Desc_Escala_Militar_Data_ultimo_Sv_Red[$a] = $data_ultimo_sv_red;
  //           //          //    
   $a++;

 }
 $query_escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON a.fk_militar = m.id INNER JOIN posto p ON a.fk_posto = p.id_posto WHERE a.tipo = 'VERMELHA' ORDER BY a.data DESC , a.fk_posto asc");//SELECIONA A TABELA DE MILITARES
 $query_escala->execute(); //EXECUTA TABELA
 $a = 0;
 while($escala = $query_escala->fetch(PDO::FETCH_ASSOC)) {     
   $idescala = $escala['id_escala'];
   $dataescala = $escala['data'];
   $nome_de_guerraescala = $escala['nome_de_guerra'];
   $servicoescala = $escala['tipo'];
   $postoescala = $escala['nome_posto'];
   $idmilitar = $escala['id'];
   $antiguidade = $escala['antiguidade'];
   $servico = $escala['servico'];
   $graduacao = $escala['graduacao'];
   $atividade = $escala['atividade'];
   $data_ultimo_sv = $escala['data_ultimo_sv'];
   $fk_impedimento = $escala['fk_impedimento'];
   $data_ultimo_sv_red = $escala['data_ultimo_sv_red'];
   $nomes1 = $escala['s1'];
   $nomes2 = $escala['s2'];
   $subistituicao = $escala['substituicao'];
  
   // DADOS DA ESCALA 
   $Red_Desc_Escala_Id[$a] = $idescala;
   $Red_Desc_Escala_Data[$a] = $dataescala;
   $Red_Desc_Escala_Nome_Militar[$a] = $nome_de_guerraescala;
   $Red_Desc_Escala_Tipo[$a] = $servicoescala;
   $Red_Desc_Escala_Posto[$a] = $postoescala;
 //         //           //
  // SUBISTITUIÇÃO
  $Red_Desc_Subistituido_S1_Id[$a] = $nomes1;
  $Red_Desc_Subistituido_S2_Id[$a] = $nomes2;
  $Red_Desc_Subistituido_Quest[$a] = $subistituicao;
//    //    //    //
 // DADOS DOS MILITARES NA ESCALA
       $Red_Desc_Escala_Militar_Id[$a] = $idmilitar;
       $Red_Desc_Escala_Militar_Antiguidade[$a] = $antiguidade;
       $Red_Desc_Escala_Militar_Nome[$a] = $nome_de_guerraescala;
       $Red_Desc_Escala_Militar_Servico[$a] = $servico;
       $Red_Desc_Escala_Militar_Graduacao[$a] = $graduacao;
       $Red_Desc_Escala_Militar_Atividade[$a] = $atividade;
       $Red_Desc_Escala_Militar_Data_Ultimo_Sv[$a] = $data_ultimo_sv;
       $Red_Desc_Escala_Militar_Id_Impedimento[$a] = $fk_impedimento;
       $Red_Desc_Escala_Militar_Data_ultimo_Sv_Red[$a] = $data_ultimo_sv_red;
  //           //          //    
   $a++;

 }
 $Quantidade_De_Escala = $a - 1;
 

 
 
 
// $i = 0;
//   while(2 > $i ){
//       echo "--------------";
//       echo  $Red_Desc_Escala_Id[$i] ."<br>".   $Red_Desc_Escala_Data[$i] ."<br>".     $Red_Desc_Escala_Nome_Militar[$i] ."<br>" .$Red_Desc_Escala_Tipo[$i] ."<br>".
//       $Red_Desc_Escala_Posto[$i] ."<br>".      $Red_Desc_Escala_Militar_Id[$i] ."<br>".  $Red_Desc_Escala_Militar_Antiguidade[$i] ."<br>".    $Red_Desc_Escala_Militar_Nome[$i] ."<br>".
//       $Red_Desc_Escala_Militar_Servico[$i] ."<br>".$Red_Desc_Escala_Militar_Graduacao[$i] ."<br>".  $Red_Desc_Escala_Militar_Atividade[$i] ."<br>".  $Red_Desc_Escala_Militar_Id_Impedimento[$i] ."<br>";
//       echo "--------------";
//       $i++;
//   }