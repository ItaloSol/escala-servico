<style>

  
  
</style>
<?php
if ($Escala == false) {
  $Buscar_Ids = 0;
  $Data_Ontem =  date('Y-m-d', strtotime('-' . 1 . 'day', strtotime($Data_Selecionada)));
   ?>
  <div class="row">
    
    <div class="col-6"><div style="left:55%;" class="abrir btn btn-danger" onclick="acaomodal()" >Definir data de servico</div></div>
    
    <div class="col-6"><div onclick="acaosem()" style="left:55%;" class="abrir btn rounded-pill btn-warning">Ver Militares não escalados</div></div>
  </div>
  <!-- <div onclick="acao()" class="btn">Definir Serviço Do Militar</div> !-->

  <div class="modal  " >
    <div onclick="fecharmodal()" class="fechar">X</div>
    <?php
    $Total_De_Militares_Escalados = count($Escalados_Id);

    $a = 0;
    $i = 0;
    while ($a < $Total_De_Militares_Escalados) {
      $query_registro = $conexao->prepare("SELECT * FROM militares WHERE id = '$Escalados_Id[$a]' ");
      $query_registro->execute(); //EXECUTA TABELA
      while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
        $id = $reg['id'];
        $antiguidade = $reg['antiguidade'];
        $nome_de_guerra = $reg['nome_de_guerra'];
        $servico = $reg['servico'];
        $graduacao = $reg['graduacao'];
        $atividade = $reg['atividade'];
        $data_ultimo_sv = $reg['data_ultimo_sv'];
        $fk_impedimento = $reg['fk_impedimento'];
        $data_ultimo_sv_red = $reg['data_ultimo_sv_red'];
        $Escalado_Prev_Id[$i] = $id;
        $Escalado_Prev_Antiguidade[$i] = $antiguidade;
        $Escalado_Prev_Nome[$i] = $nome_de_guerra;
        $Escalado_Prev_Servico[$i] = $servico;
        $Escalado_Prev_Graduacao[$i] = $graduacao;
        $Escalado_Prev_Atividade[$i] = $atividade;
        $Escalado_Prev_Data_Ultimo_Sv[$i] = $data_ultimo_sv;
        $Escalado_Prev_Id_Impedimento[$i] = $fk_impedimento;
        $Escalado_Prev_Data_ultimo_Sv_Red[$i] = $data_ultimo_sv_red;
        $i++;
      }
      $a++;
    }
    $i = 0;
    echo '<table class="table table-bordered table-condensed dtable">';
    echo '<tr>';
    echo '<td style="color: black;"  bgcolor="white">';
    echo "<b>Posto</b>";
    echo '</td>';
    echo '<td style="color: black;" bgcolor="white">';
    echo "<b>Militar</b>";
    echo '</td>';
    echo '<td style="color: black;" bgcolor="white">';
    echo "<b>Antiguidade</b>";
    echo '</td>';
    echo '<td style="color: black;" bgcolor="white">';
    echo "<b>Data do ultimo Sv Preta</b>";
    echo '</td>';
    echo '<td style="color: black;" bgcolor="white">';
    echo "<b>Data do ultimo Sv Vermelha</b>";
    echo '</td>';
    echo '</tr>';
    while ($i < $a) {
      echo '<tr>';
      echo '<td style="color: black;" bgcolor="white">';
      echo $POSTO[$i] . "<br>";
      echo '</td>';
      echo '<td style="color: black;" bgcolor="white">';
      echo $Escalado_Prev_Nome[$i] . "<br>";
      echo '</td>';
      echo '<td style="color: black;" bgcolor="white">';
      echo $Escalado_Prev_Antiguidade[$i] . "<br>";
      echo '</td>';
      echo '<td style="color: black;" bgcolor="white">';
      echo $Escalado_Prev_Data_Ultimo_Sv[$i] . "<br>";
      echo '</td>';
      echo '<td style="color: black;" bgcolor="white">';
      echo $Escalado_Prev_Data_ultimo_Sv_Red[$i] . "<br>";
      echo '</td>';
      echo "<input type='hidden' name='milsair' value=" . $Escalado_Prev_Id[$i] . ">";
      echo '</tr>';
      $i++;
    }

    echo '</table>';
    echo $Tipo_Sv_Previsto;
    ?>
    <form method="POST" action="definicao.php">
      <input type="hidden" id="data" name="data" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Data_Selecionada ?>">
      <input type="hidden" id="TIPO" name="tipo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto ?>">
      <input type="hidden" id="qtd" name="qtd" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Total_De_Militares_Escalados ?>">
      <input type="hidden" id="tipo_sgt" name="tipo_sgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sgt ?>">
      <?php
      $a = 0;
      while ($a < $Id_Escalados) { ?>
        <input type="hidden" name="id_posto_a<?= $a ?>" id="id_posto_a<?= $a ?>" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ print_r($Id_Dos_Postos_Escalados[$a]); ?>">
        <input type="hidden" name="id_definir<?= $a ?>" id="id_definir<?= $a ?>" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ print_r($Escalados_Id[$a]); ?>">
      <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ $a++;
      } ?>
      <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($Desc_Escala_Data[0] != $Data_Ontem) {
        echo '<b>Defina o serviço da data anterio!</b>';
      } else { ?>
        <b>Definir essa guarnição de serviço a cima</b>
        <input type="submit" name="svdefinido" id="svdefinido">
      <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ } ?>
    </form>
    <?php
    $x = 0;
    $Numero_Contagem[0] = 0;
    $Numero_Contagem[1] = 1;
    $Numero_Contagem[2] = 2;
    $Numero_Contagem[3] = 3;
    $Numero_Contagem[4] = 4;
    $Numero_Contagem[5] = 5;
    $Numero_Contagem[6] = 6;
    $Numero_Contagem[7] = 7;
    $Numero_Contagem[8] = 8;
    $Numero_Contagem[9] = 9;
    $Numero_Contagem[10] = 10;
    $Numero_Contagem[11] = 11;
    $Numero_Contagem[12] = 12;
    $Numero_Contagem[13] = 13;
    $Numero_Contagem[14] = 14;
    $Numero_Contagem[15] = 15;
    $Numero_Contagem[16] = 16;
    $Numero_Contagem[17] = 17;
    $Numero_Contagem[18] = 18;
    $Numero_Contagem[19] = 19;
    $Numero_Contagem[20] = 20;


    ?>
    <br>
    <b style="font-size: 20px;"><?= $exibedata ?> Definir data de serviço para os militares:</b>
    <form action="definicao.php" method="POST">
      <input type="hidden" id="data" name="data" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Data_Selecionada ?>">
      <input type="hidden" id="TIPO" name="tipo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto ?>">
      <input type="hidden" id="qtd" name="qtd" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Total_De_Militares_Escalados ?>">
      <input type="hidden" id="tipo_sgt" name="tipo_sgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sgt ?>">
      <?php
      $a = 0;
      while ($a < $Id_Escalados) { ?>
        <input type="hidden" name="id_posto_a<?= $a ?>" id="id_posto_a<?= $a ?>" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ print_r($Id_Dos_Postos_Escalados[$a]); ?>">
      <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ $a++;
      } ?>
      <?php
      $x = 0;
      while ($x < $Id_Escalados) {

        if ($Numero_Contagem[$x] == 0) {
          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="carregar_usuarios(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '">';
        }
        if ($Numero_Contagem[$x] == 1) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="mostrar_usuarios(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 2) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuarios(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 3) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariostres(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 4) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosquatro(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 5) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuarioscinco(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 6) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosseis(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 7) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariossete(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 8) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosoito(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 9) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosnove(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }

        if ($Numero_Contagem[$x] == 10) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdez(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 11) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdez(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 12) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdez(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 13) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdez(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 14) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosquatorze(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 15) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosquinze(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 16) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdezeseis(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 17) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdezesete(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 18) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdezoito(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 19) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdezenove(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }
        if ($Numero_Contagem[$x] == 20) {

          echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
          echo '<input type="text" style="text-transform:uppercase" value="'.$Escalado_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosvinte(this.value)" />';
          echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
          echo '<input type="hidden" value="'.$Escalado_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
        }


        echo '<br>';
        $x++;
      }
      if ($Desc_Escala_Data[0] != $Data_Ontem) {
        echo '<b>Defina o serviço da data anterio!</b>';
      } else {
        echo '<input type="submit" name="definirsv" id="definirsv">';
        echo '</form>';
      } ?>


      <!--- <div onclick="fechar()" class="fechar">X</div> !-->
  </div>
  <div class="informacao">
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ }
  //    ///     ///     ///     ///     ///     /// 
  ?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($Escala == true) {  ?>
    <div class="row">
      <div onclick="acaomodal()" style="left:25%; " class="abrir btn btn-danger">Troca de servico</div>
    </div>
    <!-- <div onclick="acao()" class="btn">Definir Serviço Do Militar</div> !-->

    <div class="modal" style="z-index: 1;">
      <div onclick="fecharmodal()" class="fechar">X</div>
      <?php
      $Total_De_Militares_Escalados = count($Definidos_Id);
      $a = 0;
      $i = 0;
      while ($a < $Total_De_Militares_Escalados) {
        $query_registro = $conexao->prepare("SELECT * FROM militares WHERE id = '$Definidos_Id[$a]' ");
        $query_registro->execute(); //EXECUTA TABELA
        while ($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) {
          $id = $reg['id'];
          $antiguidade = $reg['antiguidade'];
          $nome_de_guerra = $reg['nome_de_guerra'];
          $servico = $reg['servico'];
          $graduacao = $reg['graduacao'];
          $atividade = $reg['atividade'];
          $data_ultimo_sv = $reg['data_ultimo_sv'];
          $fk_impedimento = $reg['fk_impedimento'];
          $data_ultimo_sv_red = $reg['data_ultimo_sv_red'];
          $Definido_Prev_Id[$i] = $id;
          $Definido_Prev_Antiguidade[$i] = $antiguidade;
          $Definido_Prev_Nome[$i] = $nome_de_guerra;
          $Definido_Prev_Servico[$i] = $servico;
          $Definido_Prev_Graduacao[$i] = $graduacao;
          $Definido_Prev_Atividade[$i] = $atividade;
          $Definido_Prev_Data_Ultimo_Sv[$i] = $data_ultimo_sv;
          $Definido_Prev_Id_Impedimento[$i] = $fk_impedimento;
          $Definido_Prev_Data_ultimo_Sv_Red[$i] = $data_ultimo_sv_red;
          $i++;
        }
        $a++;
      }

      $i = 0;
      echo '<table class="table table-bordered table-condensed dtable">';
      echo '<tr>';
      echo '<td style="color: black;" bgcolor="white">';
      echo "<b>Posto</b>";
      echo '</td>';
      echo '<td style="color: black;" bgcolor="white">';
      echo "<b>Militar</b>";
      echo '</td>';
      echo '<td style="color: black;" bgcolor="white">';
      echo "<b>Antiguidade</b>";
      echo '</td>';
      echo '<td style="color: black;" bgcolor="white">';
      echo "<b>Data do ultimo Sv Preta</b>";
      echo '</td>';
      echo '<td style="color: black;" bgcolor="white">';
      echo "<b>Data do ultimo Sv Vermelha</b>";
      echo '</td>';
      echo '</tr>';
      while ($i < $a) {
        echo '<tr>';
        echo '<td style="color: black;" bgcolor="white">';
        echo $POSTO_Definido[$i] . "<br>";
        echo '</td>';
        echo '<td style="color: black;" bgcolor="white">';
        echo $Definido_Prev_Nome[$i] . "<br>";
        echo '</td>';
        echo '<td style="color: black;" bgcolor="white">';
        echo $Definido_Prev_Antiguidade[$i] . "<br>";
        echo '</td>';
        echo '<td style="color: black;" bgcolor="white">';
        echo $Definido_Prev_Data_Ultimo_Sv[$i] . "<br>";
        echo '</td>';
        echo '<td style="color: black;" bgcolor="white">';
        echo $Definido_Prev_Data_ultimo_Sv_Red[$i] . "<br>";
        echo '</td>';
        echo "<input type='hidden' name='milsair' value=" . $Definido_Prev_Id[$i] . ">";
        echo '</tr>';
        $i++;
      }

      echo '</table>';
      ?>
      <?php
      $x = 0;
      $Numero_Contagem[0] = 0;
      $Numero_Contagem[1] = 1;
      $Numero_Contagem[2] = 2;
      $Numero_Contagem[3] = 3;
      $Numero_Contagem[4] = 4;
      $Numero_Contagem[5] = 5;
      $Numero_Contagem[6] = 6;
      $Numero_Contagem[7] = 7;
      $Numero_Contagem[8] = 8;
      $Numero_Contagem[9] = 9;
      $Numero_Contagem[10] = 10;
      $Numero_Contagem[11] = 11;
      $Numero_Contagem[12] = 12;
      $Numero_Contagem[13] = 13;
      $Numero_Contagem[14] = 14;
      $Numero_Contagem[15] = 15;
      $Numero_Contagem[16] = 16;
      $Numero_Contagem[17] = 17;
      $Numero_Contagem[18] = 18;
      $Numero_Contagem[19] = 19;
      $Numero_Contagem[20] = 20;


      ?>
      <br>
      <b style="font-size: 20px;"><?= $exibedata ?> Definir serviço para os militares:</b>
      <form action="definicao.php" method="POST">
        <input type="hidden" id="data" name="data" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Data_Selecionada ?>">
        <input type="hidden" id="TIPO" name="tipo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto ?>">
        <input type="hidden" id="qtd" name="qtd" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Total_De_Militares_Escalados ?>">
        <input type="hidden" id="tipo_sgt" name="tipo_sgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sgt ?>">
        <input type="hidden" id="num_escalado" name="num_escalado" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Total_De_Militares_Escalados ?>">
        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ $a = 0;
        while ($a < $Total_De_Militares_Escalados) {
          echo '<input type="hidden" id="escala' . $a . '" name="escala' . $a . '" value="' . $Id_Escalada[$a] . '">';
          echo '<input type="hidden" id="id_posto_a' . $a . '" name="id_posto_a' . $a . '" value="' . $Id_Dos_Postos_Escalados[$a] . '">';
          echo '<input type="hidden" id="posto_escalado' . $a . '" name="posto_escalado' . $a . '" value="' . $Id_Dos_Postos_Escalados[$a] . '">';
          $a++;
        }
        ?>

        <?php
        $x = 0;
        $a = 0;
        while ($x < $Total_De_Militares_Escalados) {

          if ($Numero_Contagem[$x] == 0) {
            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="carregar_usuarios(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '">';
          }
          if ($Numero_Contagem[$x] == 1) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="mostrar_usuarios(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 2) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuarios(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 3) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariostres(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 4) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosquatro(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 5) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuarioscinco(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 6) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosseis(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 7) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariossete(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 8) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosoito(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 9) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosnove(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          if ($Numero_Contagem[$x] == 10) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdez(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 11) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosonze(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 12) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdoze(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 13) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariostreze(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 14) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosquatorze(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 14) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosquatorze(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 15) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosquinze(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 16) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdezeseis(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 17) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdezesete(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 18) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdezoito(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 19) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosdezenove(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }
          if ($Numero_Contagem[$x] == 20) {

            echo '<label for="usuario' . $Numero_Contagem[$x] . '" >' . $POSTO_Definido[$x] . '</label>';
            echo '<input type="text" style="text-transform:uppercase" value="'.$Definido_Prev_Nome[$x].'" name="usuario' . $Numero_Contagem[$x] . '"  id="usuario' . $Numero_Contagem[$x] . '" placeholder="Pesquisar usuário" onkeyup="listar_usuariosvinte(this.value)" />';
            echo '<span id="resultado_pesquisa' . $Numero_Contagem[$x] . '"></span>';
            echo '<input type="hidden" value="'.$Definido_Prev_Id[$x].'" name="id_usuario' . $Numero_Contagem[$x] . '"  id="id_usuario' . $Numero_Contagem[$x] . '"/>';
          }

          echo '<br>';


          if ($Posto_Qtd_Mil[$a] > 1) {
          }
          if ($Posto_Qtd_Mil[$a] == 1) {
            $a++;
          }
          $x++;
        }
        echo $Tipo_Sv_Previsto;
        echo '<br><b>Substituir o serviço!</b>';
        ?> <?php
          echo '<input type="submit" name="substituir" id="substituir">';
          echo '</form>';

          echo '<div class="informacao">';
        } ?>