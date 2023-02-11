<?php
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
include_once('../dados/postos.php');
include_once('../dados/escala.php');



//////////////////////////////////////// CONTROLE DE QUANTIDADE 
//// SOLDADOS







////////////////////////// CABO


/////////////////////////////////////// SARGENTO

//////////////////////////////// SOLDADO EP 


//////////////////////////////////// SOLDADO EV


// $query_registrored = $conexao->prepare("SELECT * FROM militares WHERE  fk_cursos != '1' AND atividade = '1' AND graduacao = '1' ORDER BY data_ultimo_sv ASC, antiguidade DESC" );
// $query_registrored->execute(); //EXECUTA TABELA
// $i = 0;
// while($regred = $query_registrored->fetch(PDO::FETCH_ASSOC)) { 
// $id = $regred['id'];
// $antiguidade = $regred['antiguidade'];
// $nome_de_guerra = $regred['nome_de_guerra'];
// $servico = $regred['servico'];
// $graduacao = $regred['graduacao'];
// $atividade = $regred['atividade'];
// $data_ultimo_sv = $regred['data_ultimo_sv'];
// $fk_impedimento = $regred['fk_impedimento'];
// $data_ultimo_sv_red = $regred['data_ultimo_sv_red'];
//     $Resumo_Soldado_Ev_Id[$i] = $id;
//     $Resumo_Soldado_Ev_Antiguidade[$i] = $antiguidade;
//     $Resumo_Soldado_Ev_Nome[$i] = $nome_de_guerra;
//     $Resumo_Soldado_Ev_Servico[$i] = $servico;
//     $Resumo_Soldado_Ev_Graduacao[$i] = $graduacao;
//     $Resumo_Soldado_Ev_Atividade[$i] = $atividade;
//     $Resumo_Soldado_Ev_Data_Ultimo_Sv[$i] = $data_ultimo_sv;
//     $Resumo_Soldado_Ev_Id_Impedimento[$i] = $fk_impedimento;
//     $Resumo_Soldado_Ev_Data_ultimo_Sv_Red[$i] = $data_ultimo_sv_red;
//     $i++; 
// }
// $Limit_Eve = $i;
// // $a = 0;
// // echo $i;
// // while($a < $i){
// //    echo  $Resumo_Soldado_Ev_Nome[$a]."<br>";
// //     $a++;
// // }
// $query_registrored = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos != '1' AND atividade = '1' AND graduacao = '1' ORDER BY data_ultimo_sv_red ASC, antiguidade DESC" );
// $query_registrored->execute(); //EXECUTA TABELA
// $i = 0;
// while($regred = $query_registrored->fetch(PDO::FETCH_ASSOC)) { 
// $id = $regred['id'];
// $antiguidade = $regred['antiguidade'];
// $nome_de_guerra = $regred['nome_de_guerra'];
// $servico = $regred['servico'];
// $graduacao = $regred['graduacao'];
// $atividade = $regred['atividade'];
// $data_ultimo_sv = $regred['data_ultimo_sv'];
// $fk_impedimento = $regred['fk_impedimento'];
// $data_ultimo_sv_red = $regred['data_ultimo_sv_red'];
//     $Red_Resumo_Soldado_Ev_Id[$i] = $id;
//     $Red_Resumo_Soldado_Ev_Antiguidade[$i] = $antiguidade;
//     $Red_Resumo_Soldado_Ev_Nome[$i] = $nome_de_guerra;
//     $Red_Resumo_Soldado_Ev_Servico[$i] = $servico;
//     $Red_Resumo_Soldado_Ev_Graduacao[$i] = $graduacao;
//     $Red_Resumo_Soldado_Ev_Atividade[$i] = $atividade;
//     $Red_Resumo_Soldado_Ev_Data_Ultimo_Sv[$i] = $data_ultimo_sv;
//     $Red_Resumo_Soldado_Ev_Id_Impedimento[$i] = $fk_impedimento;
//     $Red_Resumo_Soldado_Ev_Data_ultimo_Sv_Red[$i] = $data_ultimo_sv_red;
//     $i++; 
// }


//////////////////// MOTORISTA


// $query_registrored = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos != '1' AND servico != 'VERMELHA' AND atividade = '1' AND graduacao LIKE '%SOLDADO%'  ORDER BY data_ultimo_sv ASC, antiguidade DESC" );
// $query_registrored->execute(); //EXECUTA TABELA
// $i = 0;
// while($regred = $query_registrored->fetch(PDO::FETCH_ASSOC)) { 
// $id = $regred['id'];
// $antiguidade = $regred['antiguidade'];
// $nome_de_guerra = $regred['nome_de_guerra'];
// $servico = $regred['servico'];
// $graduacao = $regred['graduacao'];
// $atividade = $regred['atividade'];
// $data_ultimo_sv = $regred['data_ultimo_sv'];
// $fk_impedimento = $regred['fk_impedimento'];
// $data_ultimo_sv_red = $regred['data_ultimo_sv_red'];
//     $Resumo_Soldado_S_Id[$i] = $id;
//     $Resumo_Soldado_S_Antiguidade[$i] = $antiguidade;
//     $Resumo_Soldado_S_Nome[$i] = $nome_de_guerra;
//     $Resumo_Soldado_S_Servico[$i] = $servico;
//     $Resumo_Soldado_S_Graduacao[$i] = $graduacao;
//     $Resumo_Soldado_S_Atividade[$i] = $atividade;
//     $Resumo_Soldado_S_Data_Ultimo_Sv[$i] = $data_ultimo_sv;
//     $Resumo_Soldado_S_Id_Impedimento[$i] = $fk_impedimento;
//     $Resumo_Soldado_S_Data_ultimo_Sv_Red[$i] = $data_ultimo_sv_red;
//     $i++; 
// }
// $Limit_Se = $i;
// $a = 0;
// echo $i;
// while($a < $i){
//    echo  $Resumo_Soldado_S_Nome[$a]."<br>";
//     $a++;
// }
// echo '------------------------------------';

$query_registrored = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos != '1' AND servico != 'PRETA' AND atividade = '1' AND graduacao LIKE '%SOLDADO%' ORDER BY data_ultimo_sv_red ASC, antiguidade DESC " );
$query_registrored->execute(); //EXECUTA TABELA
$i = 0;
while($regred = $query_registrored->fetch(PDO::FETCH_ASSOC)) { 
$id = $regred['id'];
$antiguidade = $regred['antiguidade'];
$nome_de_guerra = $regred['nome_de_guerra'];
$servico = $regred['servico'];
$graduacao = $regred['graduacao'];
$atividade = $regred['atividade'];
$data_ultimo_sv = $regred['data_ultimo_sv'];
$fk_impedimento = $regred['fk_impedimento'];
$data_ultimo_sv_red = $regred['data_ultimo_sv_red'];
    $Red_Resumo_Soldado_S_Id[$i] = $id;
    $Red_Resumo_Soldado_S_Antiguidade[$i] = $antiguidade;
    $Red_Resumo_Soldado_S_Nome[$i] = $nome_de_guerra;
    $Red_Resumo_Soldado_S_Servico[$i] = $servico;
    $Red_Resumo_Soldado_S_Graduacao[$i] = $graduacao;
    $Red_Resumo_Soldado_S_Atividade[$i] = $atividade;
    $Red_Resumo_Soldado_S_Data_Ultimo_Sv[$i] = $data_ultimo_sv;
    $Red_Resumo_Soldado_S_Id_Impedimento[$i] = $fk_impedimento;
    $Red_Resumo_Soldado_S_Data_ultimo_Sv_Red[$i] = $data_ultimo_sv_red;
    $i++; 
}
$Limit_SeRed = $i;