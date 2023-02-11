<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../dados/previsao.php');
include_once('../dados/externa.php');
include_once('../dados/escala.php');
include_once('../dados/trocadesv.php');
include_once('../dados/impedimento.php');
if (isset($_POST['escala'])) {
    $Data_Selecionada = $_POST['d'];
    $String = $_POST['pagina_pre'];
    $Pagina_Atual = (int)$String;
    $String_Red = $_POST['pagina'];
    $Pagina_Atual_Red = (int)$String_Red;
    $Tipo_Servico_Escolhido = $_POST['tipo'];
    $Dia_Semana = $_POST['dia'];
    if ($Dia_Semana == 's�b' or $Dia_Semana == 'sab' or $Dia_Semana == 'Sab') {
        $Dia_Semana = 'sáb';
    }
    $Feriado = $_POST['feriado'];
    if ($Feriado == '1') {
        $Dia_Semana = 'fer';
       // $Tipo_Servico_Escolhido = 'VERMELHA';
    }
    function paginacao($data) {
        global $Desc_Escala_Data;
        global $Postos_Dias;
        global $i;
        $Qtd_Pagina_do_Posto = 0;
        $data_1 = date('Y-m-d', strtotime('+ 1 day',strtotime($Desc_Escala_Data[0])));
        $dateStart = new \DateTime($Desc_Escala_Data[0]);
            $dateNow   = new \DateTime(date($data));
            $dateDiff = $dateStart->diff($dateNow);
            $diferenca_data = $dateDiff->d;
            $ir = 0;
            if($diferenca_data == 1){
                $Qtd_Pagina_do_Posto = 0;
            }else{ 
            while($ir < $diferenca_data){
                $data_analisar = date('Y-m-d', strtotime('+'. $ir .'day',strtotime($data_1)));
                $nome_semana = strftime('%a',strtotime($data_analisar));
                if ($nome_semana != 'seg' && $nome_semana != 'ter' && $nome_semana != 'qua' && $nome_semana != 'qui' && $nome_semana != 'sex' && $nome_semana != 'dom') {
                    $nome_semana = 'sáb';
                }
                if(in_array($nome_semana , $Postos_Dias[$i])){
                    $Qtd_Pagina_do_Posto++;
                }
                $ir++;
            }
            $Qtd_Pagina_do_Posto =  $Qtd_Pagina_do_Posto - 1;
        }
      return $Qtd_Pagina_do_Posto;
    }
 //  print_r(paginacao($Data_Selecionada));
    if ($Escala == false) {
        $query_postos = $conexao->prepare("SELECT * FROM posto WHERE status_posto = '1' AND tipo_folga != 'externo' AND prioridade != '-1' AND data_posto LIKE '%$Dia_Semana%'  ORDER BY prioridade ASC");
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
            
            $valor_pagina = paginacao($Data_Selecionada) * $qtd_mil;

            $Pagina_Atual_Array[$i] = "ORDER BY m.$Postos_Folga[$i] ASC , m.antiguidade ".$antiguidade_posto." LIMIT $valor_pagina  , $Postos_Qtd[$i]"; 
            if($atividade_posto == '2'){
                $query_buscar_militar_anterior = $conexao->prepare("SELECT * FROM escala WHERE fk_posto = '$id_posto' AND tipo = '$posto_servico' ORDER BY data DESC");
                $query_buscar_militar_anterior->execute(); //EXECUTA TABELA
                if ($militar_buscado = $query_buscar_militar_anterior->fetch(PDO::FETCH_ASSOC)) {
                    $id_militar_sv_anterior = $militar_buscado['fk_militar'];
                }

                if($data_atividade == $Dia_Semana){
                    $Pagina_Atual_Array[$i] = "ORDER BY m.$Postos_Folga[$i] ASC , m.antiguidade ".$antiguidade_posto." LIMIT $Pagina_Atual , $Postos_Qtd[$i]"; 
                }else{
                    $Pagina_Atual_Array[$i] = " AND m.id = ".$id_militar_sv_anterior."";
                }
                // if($Dia_Semana == 'nao'){
                //     $Pagina_Atual_Array[$i] = " AND m.id = ".$id_militar_sv_anterior."";
                // }
            }



            //  in_array($dia_semanaPt , $Postos_Dias[$i])    -> Como verificar a data
            $g[$i] = $Postos_Graduacao[$i];
            if($Postos_Graduacao[$i] == '19'){
                $Postos_Graduacao[$i] = '(1,2)';
            }else{
                $Postos_Graduacao[$i] = '('. $Postos_Graduacao[$i] . ')';
            }

            if ($posto_servico == 'PRETA') {
                $Diferente_De[$i] = 'VERMELHA';
            }
            if ($posto_servico == 'VERMELHA') {
                $Diferente_De[$i] = 'PRETA';
            }

        
            $Quantidade_total_militar = $Quantidade_total_militar + $qtd_mil;

            $i++;
        }
       // print_r($Postos_Nome);
        $Qtd_Postos = $i;
        if ($Qtd_Postos == 6) {
            $Qtd_Postos = 6;
        }
        // '<br>';

        $Folga_Externa = date('Y-m-d', strtotime('-' . $Qtd_Prevista[4] . 'day', strtotime($Data_Selecionada)));
        // '<br>';
        $Folga_Missao = date('Y-m-d', strtotime('-' . $Qtd_Prevista[1] . 'day', strtotime($Data_Selecionada)));

        $Folga_Escalado_Externo = date('Y-m-d', strtotime('-' . $Qtd_Prevista[4] . 'day', strtotime($Data_Selecionada)));
        // echo $Folga_Escalado_Externo . '<br>';
        // echo $Folga_Missao . '<br>';
        // echo $Folga_Externa . '<br>';
        $busca = 1;
        $h = 0;
        $Previstos_Escalados = '(0)';
        while ($Qtd_Postos > $busca) {
            $n = $g[$busca];
        //    echo '<br>PRETA: '. $Pagina_Atual . ' VERMELHA: '. $Pagina_Atual_Red. '<br>';
            
                if ($Postos_Servico[$busca] == 'PRETA') {
                    $Folga_Obrigatoria = date('Y-m-d', strtotime('-' .  $Qtd_Prevista_Graduacoes[$n] . 'day', strtotime($Data_Selecionada)));
                     $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao
                WHERE m.data_ultimo_sv_red < '$Folga_Obrigatoria' AND m.data_ultimo_sv < '$Folga_Obrigatoria' AND m.externo < '$Folga_Externa' AND m.externo_red < '$Folga_Externa' AND m.id NOT IN $Impedido_Lista 
                AND m.escalado_externo < '$Folga_Escalado_Externo' AND m.escalado_externo_red < '$Folga_Escalado_Externo' AND id NOT IN $Impedido_Troca_Lista AND id NOT IN  $Previstos_Escalados AND id NOT IN $Impedido_Dia 
                AND m.missao_red < '$Folga_Missao' AND m.missao < '$Folga_Missao' AND id NOT IN $Impedido_Externa AND m.servico != '$Diferente_De[$busca]'  
                AND m.fk_cursos = '$Postos_Curso[$busca]' AND m.servico != 'LICENCIADO' AND m.graduacao IN $Postos_Graduacao[$busca] $Pagina_Atual_Array[$busca]");
            }
                if ($Postos_Servico[$busca] == 'VERMELHA') {
                    $Folga_Obrigatoria = date('Y-m-d', strtotime('-' .  $Qtd_Prevista_Graduacoes[$n] . 'day', strtotime($Data_Selecionada)));
               
                     $query_registro = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao
          WHERE m.data_ultimo_sv < '$Folga_Obrigatoria'  AND m.data_ultimo_sv_red < '$Folga_Obrigatoria' AND m.missao_red < '$Folga_Missao' AND m.externo < '$Folga_Externa' AND m.externo_red < '$Folga_Externa' 
          AND m.id NOT IN $Impedido_Lista AND m.servico != 'LICENCIADO' AND m.escalado_externo < '$Folga_Escalado_Externo' AND id NOT IN $Impedido_Troca_Lista AND m.escalado_externo_red < '$Folga_Escalado_Externo' 
          AND id NOT IN  $Previstos_Escalados AND id NOT IN $Impedido_Dia AND m.missao < '$Folga_Missao' AND id NOT IN $Impedido_Externa AND m.missao < '$Folga_Missao' AND m.servico != '$Diferente_De[$busca]'  
          AND m.fk_cursos = '$Postos_Curso[$busca]'  AND m.graduacao IN $Postos_Graduacao[$busca] $Pagina_Atual_Array[$busca]");
                
            }
            $query_registro->execute(); //EXECUTA TABELA
            while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
                $id = $reg['id'];
                $antiguidade = $reg['antiguidade'];
                $nome_de_guerra = $reg['nome_de_guerra'];
                $servico = $reg['servico'];
                $graduacao = $reg['graduacao'];
                $nome_graduacao = $reg['nome_graduacao'];
                $atividade = $reg['atividade'];
                $data_ultimo_sv = $reg['data_ultimo_sv'];
                $fk_impedimento = $reg['fk_impedimento'];
                $data_ultimo_sv_red = $reg['data_ultimo_sv_red'];
                $Previsto_Para_Id[$h] = $id;
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
            
            if(isset($Previsto_Para_Id)){
                $Total_Previstos = count($Previsto_Para_Id);
            }else{
                $Total_Previstos = 0;
                break;
            }
        
            if (isset($Escalados_Previstos)) {
                $Previstos_Escalados = '(' . implode(',', $Escalados_Previstos) . ')';
            } else {
                $Previstos_Escalados = '(0)';
            }
        }
       //  echo $Postos_Qtd[2];
    }
    if(!isset($Total_Previstos)){
        $Total_Previstos = 0;
    }
}
