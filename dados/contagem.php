<?php
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
include_once('../dados/postos.php');

/// CABOS
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE atividade = '1' AND graduacao = '3' ORDER BY data_ultimo_sv ASC , antiguidade DESC " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}




$Quantidade_Cabo_Ativos = $i ;
//      //      //      //
/// SOLDADO MOTORISTA
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos = '2' AND atividade = '1'  ORDER BY data_ultimo_sv ASC , antiguidade DESC " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}



$Quantidade_Motora_Ativos = $i ;
//      //      //      //      //
/// SOLDADOS EV
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos = '1' AND atividade = '1' AND graduacao = '1' ORDER BY data_ultimo_sv ASC , antiguidade DESC " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}

$Quantidade_Ev_Ativos = $i ;
//      //      //      //      //
/// SOLDADO EP
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos = '1' AND atividade = '1' AND graduacao = '2' 
                                    ORDER BY data_ultimo_sv ASC , antiguidade DESC  " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}



$Quantidade_Ep_Ativos = $i ;
//      //      //      //      //
/// SARTGENTOS
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE atividade = '1' AND graduacao = '4' ORDER BY data_ultimo_sv ASC , antiguidade DESC " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];
$Id_DeSgTS[$i] =  $id;
    $i++;
}
$Quantidade_Sgt_Ativos = $i ;

$id_desse_user = 241;
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE id = $id_desse_user " );
$query_registro->execute(); //EXECUTA TABELA

if($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
    $graduacao = $reg['graduacao'];
}

// $asdasd_Posdao = $conexao->prepare("SELECT posto_graduacao , count(posto_graduacao) as qtd, SUM(qtd_mil) AS qtd_diaria 
// FROM posto WHERE posto_graduacao = '$id_graduacao' AND status_posto = 1 AND tipo_folga != 'data_ultimo_sv_red' AND tipo_folga != 'missao_red' AND tipo_folga != 'escalado_externo_red' AND tipo_folga != 'externo_red' " );
// $asdasd_Posdao->execute();     
// if($reg2 = $asdasd_Posdao->fetch(PDO::FETCH_ASSOC)) { 
//     $total_diario = $reg2['qtd_diaria'];
// }

$query_registro = $conexao->prepare("SELECT * FROM graduacoes " );
$query_registro->execute(); //EXECUTA TABELA
$graduus = 1;
function chamando($id_graduacao) {
    global $conexao;
    $Postos_asdas = $conexao->prepare("SELECT graduacao , count(graduacao) as qtd FROM militares WHERE graduacao = $id_graduacao " );
    $Postos_asdas->execute();     
    if($reg1 = $Postos_asdas->fetch(PDO::FETCH_ASSOC)) { 
        $total = $reg1['qtd'];
    }
  return $total - 1;
}
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 

    $id_graduacao = $reg['id_graduacao'];
    
    $Array_Ativos_Preta[$id_graduacao] = [
        'graduacao' => $id_graduacao,
        'qtd' => chamando($id_graduacao)
    
    ];
$graduus++;
}


//      //      //      //      //
//
//  INATIVOS
//
//
//      //      //      //      //
/// CABOS INATIVOS
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE atividade = '0' AND graduacao = '3' ORDER BY data_ultimo_sv ASC , antiguidade DESC " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}



$Quantidade_Cabo_Inativos = $i ;
//      //      //      //
/// SOLDADO MOTORISTA INATIVOS
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos = '2' AND atividade = '0'  ORDER BY data_ultimo_sv ASC , antiguidade DESC " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}



$Quantidade_Motora_Inativos = $i ;
//      //      //      //      //
/// SOLDADOS EV INATIVOS
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos = '1' AND atividade = '0' AND graduacao = '1' ORDER BY data_ultimo_sv ASC , antiguidade DESC " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}



$Quantidade_Ev_Inativos = $i ;
//      //      //      //      //
/// SOLDADO EP INATIVOS
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE fk_cursos = '1' AND atividade = '0' AND graduacao = '2' 
                                    ORDER BY data_ultimo_sv ASC , antiguidade DESC  " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}



$Quantidade_Ep_Inativos = $i ;
//      //      //      //      //
/// SARTGENTOS INATIVOS
$query_registro = $conexao->prepare("SELECT * FROM militares WHERE atividade = '0' AND graduacao = '4' ORDER BY data_ultimo_sv ASC , antiguidade DESC " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
$id = $reg['id'];

    $i++;
}



$Quantidade_Sgt_Inativos = $i ;
//      //      //      //      //

