<?php
// INCLUDES
include_once('../dados/resumo.php');
include_once('../dados/postos.php');
include_once('../dados/escala.php');

include_once('../dados/previsao.php');
//      //      //      //


$Ultima_Data_Da_Escala_Pf = date('Y-m-d', strtotime('+' . 0 . 'day', strtotime($Desc_Escala_Data[0])));
$Folga_ObrigatoriaSgt = date('Y-m-d', strtotime('-' . $Qtd_Prevista[1] . 'day', strtotime($Ultima_Data_Da_Escala_Pf)));
$Folga_ObrigatoriaCb = date('Y-m-d', strtotime('-' . $Qtd_Prevista[2] . 'day', strtotime($Ultima_Data_Da_Escala_Pf)));
$Folga_ObrigatoriaMot = date('Y-m-d', strtotime('-' . $Qtd_Prevista[3] . 'day', strtotime($Ultima_Data_Da_Escala_Pf)));
$Folga_ObrigatoriaEp = date('Y-m-d', strtotime('-' . $Qtd_Prevista[4] . 'day', strtotime($Ultima_Data_Da_Escala_Pf)));
$Folga_ObrigatoriaEv = date('Y-m-d', strtotime('-' . $Qtd_Prevista[5] . 'day', strtotime($Ultima_Data_Da_Escala_Pf)));
$Folga_ObrigatoriaSds = date('Y-m-d', strtotime('-' . $Qtd_Prevista[6] . 'day', strtotime($Ultima_Data_Da_Escala_Pf)));
$qtd_prevista =  $Qtd_Prevista[0];


if (isset($qtd_prevista)) {
    $Dia_Resumo = $qtd_prevista;
} else {
    $Dia_Resumo = '0';
}

if (isset($_POST['Resumo'])) {
    $Dia_Resumo = $_POST['Dia_Resumo'];
}


// VARIAVEIS DE CONTROLE DE LOOP
$dias = 0;
$Pagina_Atual = 0;
$hoje = date('Y-m-d');
$Pagina_Atual_Red = 0;
$Postos_Existentes;
$Id_Escalados = 0;
$Previstos_Escalados = '(0)';
$Percorrer_Feriado = 0;
$tipo_escala = 'PRETA';
$Militares = 0;
$Percorrer_Postos = 0;
$Date_Feriado = false;

$Data_Selecionada = date('Y-m-d', strtotime('+' . 0 . 'day', strtotime($Desc_Escala_Data[0])));
$dia_semanaEn = strtotime('%a', strtotime($Data_Selecionada));
$Data_compara = date('Y-m-d', strtotime('+' . 0 . 'day', strtotime($Desc_Escala_Data[0])));
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dataprevista = date('Y-m-d', strtotime($Data_Selecionada));
$exibedata = date('d/m/y', strtotime($Data_Selecionada));
$dia_semanaPt = utf8_encode(strftime('%a', strtotime($dataprevista)));
//      //      //      //
//echo $Data_compara;

?>
<style>
    .borrado {
        backdrop-filter: blur(5px);
    }
</style>
<div class="card" style="background-size: cover; background-color: #373d42; backdrop-filter: blur(5px);">
    <h5 style="text-align: center; background-color: yellow; color: green;" class="card-header"><b style=" font-size: 22px;">DEFINIDO</b></h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table borrado table-hover table-bordered">
                <thead>
                    <tr style='color: white;'>
                        <th>DATA</th>
                        <th>POSTO</th>
                        <th>GUARNIÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ $query_escala = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON a.fk_militar = m.id INNER JOIN posto p ON a.fk_posto = p.id_posto INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE p.prioridade != '-1' AND a.data >= '$hoje' ORDER BY a.data ASC , p.prioridade asc"); //SELECIONA A TABELA DE MILITARES
                    $query_escala->execute(); //EXECUTA TABELA
                    $a = 0;
                    while ($escala = $query_escala->fetch(PDO::FETCH_ASSOC)) {
                        $ontem[$a] = $escala['data'];
                        $idescala = $escala['id_escala'];
                        $idpostoe = $escala['id_posto'];
                        $dataescala = $escala['data'];
                        $nome_de_guerraescala = $escala['nome_de_guerra'];
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
                        $dataescala1 = date('d/m/y', strtotime($dataescala));
                        $dia_pt = utf8_encode(strftime('%a', strtotime($dataescala)));
                        $nomes2 = $escala['s2'];
                        $subistituicao = $escala['substituicao'];

                        if ($servicoescala == 'VERMELHA') {
                            echo "<tr style='background-color: red; color: white;'>";
                        } else {
                            echo "<tr style='color: white;'>";
                        }
                        $b = $a - 1;
                        if ($b == -1) {
                            $b = 0;
                        }
                        // echo $ontem[$b] .' '. $b.' ->  '.$a.' '.  $ontem[$a] . '<br>';
                        if ($ontem[$b] != $ontem[$a]) {

                            echo "<tr  style='color: white;'><td  colspan='3'><hr></td></tr>";
                        }
                        echo "
    <td style=' color: white; text-align: center;' ><b>" . $dataescala1 . "<br>" . $dia_pt . "</b></td>
    <td style='color: white;'><b>" . $postoescala . "</b></td>
    ";
                        if ($nomes2 > 1) {
                            $query_troca = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = '$nomes2'"); //SELECIONA A TABELA DE MILITARES
                            $query_troca->execute(); //EXECUTA TABELA

                            if ($troca = $query_troca->fetch(PDO::FETCH_ASSOC)) {
                                $nome_de_guerra_S = $troca['nome_de_guerra'];
                                $graduacao_s = $troca['nome_graduacao'];

                                if ($idmilitar == $id_desse_user) {
                                    echo "
        <td  style='color: white; background-color: yellow;'><b>" . $graduacao_s . " " . $nome_de_guerra_S . " <span style='font-size: 12px;'>Saiu " . $graduacao . " " . $nome_de_guerraescala . " </span></b></td>";
                                } else {
                                    echo "
        <td style='color: white;' ><b>" . $graduacao_s . " " . $nome_de_guerra_S . " <span style='font-size: 12px;'>Saiu " . $graduacao . " " . $nome_de_guerraescala . " </span></b></td>";
                                }
                            }
                        } else {
                            if ($idmilitar == $id_desse_user) {
                                echo "
            <td style='color: black; background-color: yellow;'><b>" . $graduacao . " " . $nome_de_guerraescala . "</b></td>";
                            } else {
                                echo "
            <td style='color: white;'><b>" . $graduacao . " " . $nome_de_guerraescala . "</b></td>";
                            }
                        }
                        echo "
</tr>";

                        $a++;
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card" style="background-size: cover;background-color: #373d42; backdrop-filter: blur(5px);">
    <h5 style="text-align: center; background-color: green; color: yellow;" class="card-header"><b style=" font-size: 22px;">PREVISÃO</b></h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table borrado table-hover table-bordered">
                <thead>
                    <tr style="color: white;">
                        <th>DATA</th>
                        <th>POSTO</th>
                        <th>GUARNIÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function paginacao($data)
                    {
                        global $Desc_Escala_Data;
                        global $Postos_Dias;
                        global $i;
                        $Qtd_Pagina_do_Posto = 0;
                        $data_1 = date('Y-m-d', strtotime('+ 1 day', strtotime($Desc_Escala_Data[0])));
                        $dateStart = new \DateTime($Desc_Escala_Data[0]);
                        $dateNow   = new \DateTime(date($data));
                        $dateDiff = $dateStart->diff($dateNow);
                        $diferenca_data = $dateDiff->d;
                        $ir = 0;
                        if ($diferenca_data == 1) {
                            $Qtd_Pagina_do_Posto = 0;
                        } else {
                            while ($ir < $diferenca_data) {
                                $data_analisar = date('Y-m-d', strtotime('+' . $ir . 'day', strtotime($data_1)));
                                $nome_semana = strftime('%a', strtotime($data_analisar));
                                if ($nome_semana != 'seg' && $nome_semana != 'ter' && $nome_semana != 'qua' && $nome_semana != 'qui' && $nome_semana != 'sex' && $nome_semana != 'dom') {
                                    $nome_semana = 'sáb';
                                }
                                if (in_array($nome_semana, $Postos_Dias[$i])) {
                                    $Qtd_Pagina_do_Posto++;
                                }
                                $ir++;
                            }
                            $Qtd_Pagina_do_Posto =  $Qtd_Pagina_do_Posto - 1;
                        }
                        return $Qtd_Pagina_do_Posto;
                    }
                    if (isset($_POST['Dia_Resumo'])) {
                        $Qtd_Prevista[0] = $_POST['Dia_Resumo'];
                    }
                    if ($Qtd_Prevista[0] != 0) {
                        do {
                            $dias++;
                            $dataprevista = date('Y-m-d', strtotime('+' . $dias . 'day', strtotime($Data_Selecionada)));
                            $exibedata = date('d/m/y', strtotime('+' . $dias . 'day', strtotime($Data_Selecionada)));
                            $dia_semanaPt = utf8_encode(strftime('%a', strtotime($dataprevista)));
                            if ($dia_semanaPt != 'seg' && $dia_semanaPt != 'ter' && $dia_semanaPt != 'qua' && $dia_semanaPt != 'qui' && $dia_semanaPt != 'sex' && $dia_semanaPt != 'dom') {
                                $dia_semanaPt = 'sáb';
                            }


                            if ($dia_semanaPt == 's�b' or $dia_semanaPt == 'sab' or $dia_semanaPt == 'Sab') {
                                $dia_semanaPt = 'sáb';
                            }
                            if ($dia_semanaPt == 'sáb' || $dia_semanaPt == 'dom') {
                                $tipo_escala = 'VERMELHA';
                            }
                            if ($dia_semanaPt != 'sáb' && $dia_semanaPt != 'dom') {
                                $tipo_escala = 'PRETA';
                            }
                            //
                            //
                            //  IMPEDIMENTO DIARIO 
                            if (isset($_POST['imped'])) {
                                $Dia_Listado_Nov =  '(' . $_POST['imped'] . ')';
                            } else {
                                $Dia_Listado_Nov =  '(0)';
                            }
                            $Contar_Preta = $conexao->prepare("SELECT * FROM impedimentos i INNER JOIN militares m ON m.id = i.fk_militares WHERE '$Data_Selecionada' BETWEEN  i.data_inicio AND i.data_final");
                            $Contar_Preta->execute(); //EXECUTA TABELA
                            $i = 0;
                            while ($Cont = $Contar_Preta->fetch(PDO::FETCH_ASSOC)) {
                                //echo  $Cont['nome_de_guerra'].'<br>';
                                $Impedido_Listado[$i] = $Cont['id'];
                                $i++;
                            }

                            if (isset($Impedido_Listado)) {
                                $Impedido_Lista = '(' . implode(',', $Impedido_Listado) . ')';
                            } else {

                                $Impedido_Lista = '(0)';
                            }

                            $ver_dia = $conexao->prepare("SELECT * FROM  militares  WHERE data_de_sv LIKE '%$dia_semanaPt%'");
                            $ver_dia->execute(); //EXECUTA TABELA
                            $i = 1;
                            while ($impdia = $ver_dia->fetch(PDO::FETCH_ASSOC)) {
                                //echo  $Cont['nome_de_guerra'].'<br>';
                                $Dia_Listado[$i] = $impdia['id'];
                                $i++;
                            }
                            if (isset($Dia_Listado)) {
                                $Impedido_Dia = '(' . implode(',', $Dia_Listado) . ')';
                            } else {

                                $Impedido_Dia = '(0)';
                            }
                            // FIM IMPEDIMENTO DIARIO 
                            //

                            //IMPEDIMENTO EXTERNA 
                            //
                            //
                            $query_externa = $conexao->prepare("SELECT * FROM externa e INNER JOIN militares m ON m.id = e.fk_militar INNER JOIN posto p ON p.id_posto = e.fk_posto INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE e.data = '$dataprevista'");
                            $query_externa->execute();
                            $i = 0;
                            while ($linha = $query_externa->fetch(PDO::FETCH_ASSOC)) {
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

                            if (isset($Externa_Id_Militar)) {

                                $Impedido_Externa = '(' . implode(',', $Externa_Id_Militar) . ')';
                            } else {
                                $Impedido_Externa = '(0)';
                            }

                            // FIM IMPEDIMENTO EXTERNA
                            //

                            // IMPEDIMENTO TROCA
                            //
                            //
                            $Data_fo = date('Y-m-d', strtotime('+' . 1 . 'day', strtotime($Desc_Escala_Data[0])));
                            $Data_folga_troca = date('Y-m-d', strtotime('-' . $Qtd_Prevista[12] . 'day', strtotime($Data_fo)));
                            //echo ' data '. $Desc_Escala_Data[0] . ' - '. $Data_fo; 

                            $Contar_Preta = $conexao->prepare("SELECT * FROM escala a INNER JOIN militares m ON m.id = a.fk_militar WHERE data < '$Data_fo' AND data > '$Data_folga_troca' AND substituicao = '1' ");
                            $Contar_Preta->execute(); //EXECUTA TABELA
                            $i = 0;
                            while ($Cont = $Contar_Preta->fetch(PDO::FETCH_ASSOC)) {
                                //echo  $Cont['nome_de_guerra'].'<br>';
                                $Troca_Sv[$i] = $Cont['s2'];
                                $i++;
                            }

                            if (isset($Troca_Sv)) {

                                $Impedido_Troca_Lista = '(' . implode(',', $Troca_Sv) . ')';
                            } else {
                                $Impedido_Troca_Lista = '(0)';
                            }
                            // FIM IMPEDIMENTO TROCA
                            //
                            //

                            $query_postos = $conexao->prepare("SELECT * FROM posto WHERE status_posto = '1' AND tipo_folga != 'externo' AND data_posto LIKE '%$dia_semanaPt%' ORDER BY prioridade ASC");
                            $query_postos->execute(); //EXECUTA TABELA
                            $i = 1;
                            $Quantidade_total_militar = 0;
                            while ($posto = $query_postos->fetch(PDO::FETCH_ASSOC)) {
                                $id_posto = $posto['id_posto'];
                                $nome_posto = $posto['nome_posto'];
                                $qtd_mil = $posto['qtd_mil'];
                                $posto_graduacao = $posto['posto_graduacao'];
                                $posto_servico = $posto['posto_servico'];
                                $status_posto = $posto['status_posto'];
                                $data_posto = $posto['data_posto'];
                                $prioridade = $posto['prioridade'];
                                $tipo_folga = $posto['tipo_folga'];
                                $curso = $posto['curso'];
                                $atividade_posto = $posto['guarnicao_posto'];
                                $data_atividade = $posto['data_atividade'];
                                $antiguidade_posto = $posto['posto_antiguidade'];

                                $Postos_Id[$i] = $id_posto;
                                $Postos_Nome[$i] = $nome_posto;
                                $Postos_Qtd[$i] = $qtd_mil;
                                $Postos_Graduacao[$i] = $posto_graduacao;
                                $Postos_Servico[$i] = $posto_servico;
                                $Postos_Status[$i] = $status_posto;
                                $Postos_Datas[$i] = $data_posto;
                                $Postos_Orden[$i] = $prioridade;
                                $Postos_Folga[$i] = $tipo_folga;
                                $Postos_Curso[$i] = $curso;
                                $Postos_Atividade[$i] = $atividade_posto;
                                $Postos_Data_Atividade[$i] = $data_atividade;
                                $Postos_Antiguidade_Posto[$i] = $antiguidade_posto;
                                $Postos_Dias[$i] = explode('-', $data_posto);

                                //  in_array($dia_semanaPt , $Postos_Dias[$i])    -> Como verificar a data
                                $valor_pagina = paginacao($dataprevista) * $qtd_mil;
                                $cada_posto[$i] = $valor_pagina;
                                $Pagina_Atual_Array[$i] = "ORDER BY m.$Postos_Folga[$i] ASC , m.antiguidade " . $antiguidade_posto . " LIMIT $valor_pagina  , $Postos_Qtd[$i]";
                                if ($atividade_posto == '2') {
                                    $query_buscar_militar_anterior = $conexao->prepare("SELECT * FROM escala WHERE fk_posto = '$id_posto' AND tipo = '$posto_servico' ORDER BY data DESC");
                                    $query_buscar_militar_anterior->execute(); //EXECUTA TABELA
                                    if ($militar_buscado = $query_buscar_militar_anterior->fetch(PDO::FETCH_ASSOC)) {
                                        $id_militar_sv_anterior = $militar_buscado['fk_militar'];
                                        $id_militar_sv_anterior_[$i] = $militar_buscado['fk_militar'];
                                    }
                                    if ($data_atividade == $dia_semanaPt) {
                                        $desativar_repetircao = true;
                                        $Pagina_Atual_Array[$i] = "ORDER BY m.$Postos_Folga[$i] ASC , m.antiguidade " . $antiguidade_posto . " LIMIT $Pagina_Atual , $Postos_Qtd[$i]";
                                    } else {
                                        $desativar_repetircao = false;
                                        $Pagina_Atual_Array[$i] = " m.id = " . $id_militar_sv_anterior . "";
                                    }
                                }

                                if ($posto_servico == 'PRETA') {
                                    $Diferente_De[$i] = 'VERMELHA';
                                }
                                if ($posto_servico == 'VERMELHA') {
                                    $Diferente_De[$i] = 'PRETA';
                                }

                                if ($posto_graduacao == 1) {
                                    $g[$i] = 6;
                                } elseif ($posto_graduacao == 2) {
                                    $g[$i] = 4;
                                } elseif ($posto_graduacao == 3) {
                                    $g[$i] = 2;
                                } elseif ($posto_graduacao == 4) {
                                    $g[$i] = 1;
                                } elseif ($posto_graduacao == 19) {
                                    $g[$i] = 5;
                                }
                                if ($Postos_Graduacao[$i] == '19') {
                                    $Postos_Graduacao[$i] = '(1,2)';
                                } else {
                                    $Postos_Graduacao[$i] = '(' . $Postos_Graduacao[$i] . ')';
                                }

                                $Quantidade_total_militar = $Quantidade_total_militar + $qtd_mil;
                                if ($curso != 1) {
                                    $Busca_Curso_Graduacao[$i] = " AND m.fk_cursos = '$Postos_Curso[$i]' ";
                                } else {
                                    $Busca_Curso_Graduacao[$i] = " AND m.graduacao IN $Postos_Graduacao[$i] AND m.fk_cursos = '$Postos_Curso[$i]'";
                                }
                                $i++;
                            }
                            // print_r($Postos_Nome);
                            $Qtd_Postos = $i;
                            if ($Qtd_Postos == 6) {
                                $Qtd_Postos = 6;
                            }
                            // '<br>';

                            $Folga_Externa = date('Y-m-d', strtotime('-' . $Qtd_Prevista[8] . 'day', strtotime($dataprevista)));
                            // '<br>';
                            $Folga_Missao = date('Y-m-d', strtotime('-' . $Qtd_Prevista[9] . 'day', strtotime($dataprevista)));

                            $Folga_Escalado_Externo = date('Y-m-d', strtotime('-' . $Qtd_Prevista[11] . 'day', strtotime($dataprevista)));

                            $busca = 1;
                            $h = 0;

                            $Previstos_Escalados = '(0)';

                            //  echo $Previstos_Escalados . '<br>';
                            //   echo "DATA: ".$exibedata." <br> Impedido_Troca_Lista: ".$Impedido_Troca_Lista ."<br> Previstos_Escalados: ". $Previstos_Escalados. "<br> Impedido_Dia: ". $Impedido_Dia."<br> Impedido_Externa: " . $Impedido_Externa. "<br> ";
                            while ($Qtd_Postos > $busca) {
                                $Verificar_Sgt_Id = 0;
                                $n = $g[$busca];
                                //    echo '<br>PRETA: '. $Pagina_Atual . ' VERMELHA: '. $Pagina_Atual_Red. '<br>';

                                if ($Postos_Servico[$busca] == 'PRETA') {
                                    $Folga_Obrigatoria = date('Y-m-d', strtotime('-' .  $Qtd_Prevista[$n] . 'day', strtotime($dataprevista)));

                                    $query_registro_Escala = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao
                                WHERE m.data_ultimo_sv_red < '$Folga_Obrigatoria' AND m.data_ultimo_sv < '$Folga_Obrigatoria' AND m.externo < '$Folga_Externa' AND m.externo_red < '$Folga_Externa' AND m.id NOT IN $Impedido_Lista 
                                AND m.escalado_externo < '$Folga_Escalado_Externo' AND m.escalado_externo_red < '$Folga_Escalado_Externo' AND id NOT IN $Impedido_Troca_Lista AND id NOT IN  $Previstos_Escalados AND id NOT IN $Impedido_Dia 
                                AND m.missao_red < '$Folga_Missao' AND m.missao < '$Folga_Missao' AND id NOT IN $Impedido_Externa AND m.servico != '$Diferente_De[$busca]'  
                                 AND m.servico != 'LICENCIADO' $Busca_Curso_Graduacao[$busca] $Pagina_Atual_Array[$busca]");
                                    if (isset($id_militar_sv_anterior_[$busca]) && $desativar_repetircao == false) {
                                        $query_registro_Escala = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao
                                    WHERE m.id = $id_militar_sv_anterior");
                                    }
                                }
                                if ($Postos_Servico[$busca] == 'VERMELHA') {
                                    $Folga_Obrigatoria = date('Y-m-d', strtotime('-' .  $Qtd_Prevista[$n] . 'day', strtotime($dataprevista)));

                                    $query_registro_Escala = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao
                          WHERE m.data_ultimo_sv < '$Folga_Obrigatoria'  AND m.data_ultimo_sv_red < '$Folga_Obrigatoria' AND m.missao_red < '$Folga_Missao' AND m.externo < '$Folga_Externa' AND m.externo_red < '$Folga_Externa' 
                          AND m.id NOT IN $Impedido_Lista AND m.servico != 'LICENCIADO' AND m.escalado_externo < '$Folga_Escalado_Externo' AND id NOT IN $Impedido_Troca_Lista AND m.escalado_externo_red < '$Folga_Escalado_Externo' 
                          AND id NOT IN $Impedido_Dia AND m.missao < '$Folga_Missao' AND id NOT IN $Impedido_Externa AND m.missao < '$Folga_Missao' AND m.servico != '$Diferente_De[$busca]'  
                          $Busca_Curso_Graduacao[$busca] $Pagina_Atual_Array[$busca]");
                                    if (isset($id_militar_sv_anterior_[$busca]) && $desativar_repetircao == false) {
                                        $query_registro_Escala = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao
                        WHERE  m.id = $id_militar_sv_anterior");
                                    }
                                }
                                $query_registro_Escala->execute(); //EXECUTA TABELA
                                while ($reg = $query_registro_Escala->fetch(PDO::FETCH_ASSOC)) {
                                    $id_m = $reg['id'];
                                    $antiguidade = $reg['antiguidade'];
                                    $nome_de_guerra = $reg['nome_de_guerra'];
                                    $servico = $reg['servico'];
                                    $graduacao = $reg['graduacao'];
                                    $nome_graduacao = $reg['nome_graduacao'];
                                    $atividade = $reg['atividade'];
                                    $data_ultimo_sv = $reg['data_ultimo_sv'];
                                    $fk_impedimento = $reg['fk_impedimento'];
                                    $data_ultimo_sv_red = $reg['data_ultimo_sv_red'];
                                    $Previsto_Para_Id[$h] = $id_m;
                                    $Previsto_Nome_Graduacao[$h] = $nome_graduacao;
                                    $Previsto_Para_Antiguidade[$h] = $antiguidade;
                                    $Previsto_Para_Nome[$h] = $nome_de_guerra;
                                    $Previsto_Para_Servico[$h] = $servico;
                                    $Previsto_Para_Graduacao[$h] = $graduacao;
                                    $Previsto_Para_Atividade[$h] = $atividade;
                                    $Previsto_Para_Data_Ultimo_Sv[$h] = $data_ultimo_sv;
                                    $Previsto_Para_Id_Impedimento[$h] = $fk_impedimento;
                                    $Previsto_Para_Data_ultimo_Sv_Red[$h] = $data_ultimo_sv_red;
                                    //  echo $Folga_Obrigatoria .'<br>'. $Postos_Servico[$busca]. ' <br>'; echo $nome_de_guerra . '<br>';
                                    $Escalados_Previstos[$h] = $Previsto_Para_Id[$h];
                                    $h++;
                                }
                                $busca++;


                                if (isset($Previsto_Para_Id)) {
                                    $Total_Previstos = count($Previsto_Para_Id);
                                } else {
                                    break;
                                }

                                if (isset($Escalados_Previstos)) {
                                    $Previstos_Escalados = '(' . implode(',', $Escalados_Previstos) . ')';
                                } else {
                                    $Previstos_Escalados = '(0)';
                                }
                            }


                            if ($tipo_escala == 'PRETA') {
                                echo '<tr style="color: white;">';
                            } elseif ($tipo_escala == 'VERMELHA') {
                                echo '<tr style="background-color: red; color: white;">';
                            }
                            echo '<td>
                            <section style="text-align: center; padding-top: 5%; font-size: large;"><strong> ' . $exibedata . ' <br> ' . $dia_semanaPt . '</strong></section>
                        </td>
                        <td><ul class="list-unstyled users-list m-0 avatar-group  align-items-center">';
                            $Percorrer_Postos = 1;
                            $qtd_contagem_postos = 0;
                            while ($Percorrer_Postos < $Qtd_Postos) {

                                echo '<li>
                                ' . $Postos_Nome[$Percorrer_Postos] . '
                                </li>';

                                if ($Postos_Qtd[$Percorrer_Postos] > 1 && $qtd_contagem_postos < $Postos_Qtd[$Percorrer_Postos]) {
                                    $qtd_contagem_postos++;
                                } elseif ($Postos_Qtd[$Percorrer_Postos] <= 1) {
                                    $Percorrer_Postos++;
                                }
                                if ($qtd_contagem_postos == $Postos_Qtd[$Percorrer_Postos]) {
                                    $Percorrer_Postos++;
                                    $qtd_contagem_postos = 0;
                                }
                            }
                            echo '</ul></td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group  align-items-center">';
                            $Percorrer_Militares = 0;
                            while ($h > $Percorrer_Militares) {
                                if ($Previsto_Para_Id[$Percorrer_Militares] == $id_desse_user) {
                                    echo "<b style='color: black; background-color: green; font-size: 20px;'>";
                                }
                                echo '<li>
                                ' . $Previsto_Nome_Graduacao[$Percorrer_Militares] . ' ' . $Previsto_Para_Nome[$Percorrer_Militares] . '
                                </li>';

                                if ($Previsto_Para_Id[$Percorrer_Militares] == $id_desse_user) {
                                    echo '</b>';
                                }
                                $Percorrer_Militares++;
                            }


                            echo '</ul>
                        </td>

                      </tr>';
                            if ($tipo_escala == 'PRETA') {
                                $Pagina_Atual++;
                            }
                            if ($tipo_escala == 'VERMELHA') {
                                $Pagina_Atual_Red++;
                            }
                        } while ($Qtd_Prevista[0] > $dias);
                    } else {
                        echo '<tr  style="color: white; font-size: 30px; font-family: Fantasy; "><td>Nenhuma previsão disponivel no painel! <b style="color: green;">Confira no menu de Escala.</b> </td><td></td><td></td> </tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>