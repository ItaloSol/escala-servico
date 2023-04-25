  <!-- Import dos Contadores em JavaScript -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>


  <?php

  use Sabberworm\CSS\Property\Import;

  include_once('../conexoes/conecti.php');
  include_once('../acoes/conexao.php');
  include_once('../conexoes/conexaoo.php');
  include_once('../conexoes/conexao.php');
  include_once('../conexoes/conect.php');

  $query = $conexao->prepare("SELECT * FROM usuarios u INNER JOIN militares m ON u.fk_militar = m.id WHERE u.fk_militar = $id_desse_user");
  $query->execute();
  $dataprevista = date('Y-m-d');
  function diasDatas($data_inicial, $data_final)
  {
    $diferenca = strtotime($data_final) - strtotime($data_inicial);
    $dias = floor($diferenca / (60 * 60 * 24));
    return $dias;
  }
  while ($User_cont = $query->fetch(PDO::FETCH_ASSOC)) {

    $id_conta = $User_cont['id_senha'];
    $Nome_User = $User_cont['nome'];
    $fk_militar = $User_cont['fk_militar'];
    $Data_Ultimo_SV_Preta = $User_cont['data_ultimo_sv'];

    //  data_ultimo_sv
    $data_ultimo_sv = $User_cont['data_ultimo_sv'];


    $folga_data_ultimo_sv = diasDatas($data_ultimo_sv, $dataprevista);
    $Mostrar_Data_data_ultimo_sv = date('d/m/Y', strtotime($User_cont['data_ultimo_sv']));

    // data_ultimo_sv_red
    $data_ultimo_sv_red = $User_cont['data_ultimo_sv_red'];



    $folga_data_ultimo_sv_red = diasDatas($data_ultimo_sv_red, $dataprevista);;
    $Mostrar_Data_data_ultimo_sv_red = date('d/m/Y', strtotime($User_cont['data_ultimo_sv_red']));

    // escalado_externo
    $escalado_externo = $User_cont['escalado_externo'];


    $folga_escalado_externo = diasDatas($escalado_externo, $dataprevista);;
    $Mostrar_Data_escalado_externo = date('d/m/Y', strtotime($User_cont['escalado_externo']));

    // escalado_externo_red
    $escalado_externo_red = $User_cont['escalado_externo_red'];


    $folga_escalado_externo_red = diasDatas($escalado_externo_red, $dataprevista);;
    $Mostrar_Data_escalado_externo_red = date('d/m/Y', strtotime($User_cont['escalado_externo_red']));

    // missao

    $missao = $User_cont['missao'];

    $folga_missao = diasDatas($missao, $dataprevista);
    $Mostrar_Data_missao = date('d/m/Y', strtotime($User_cont['missao']));

    // missao_red

    $missao_red = $User_cont['missao_red'];

    $folga_missao_red = diasDatas($missao_red, $dataprevista);;
    $Mostrar_Data_missao_red = date('d/m/Y', strtotime($User_cont['missao_red']));

    // externa

    $externa_d = $User_cont['externo'];

    $data_inicio_d = new DateTime($externa_d);

    $folga_externa_d = diasDatas($externa_d, $dataprevista);
    $Mostrar_Data_externa_d = date('d/m/Y', strtotime($User_cont['externo']));

    include_once('../dados/contagem.php');

    // print_r($Array_Ativos_Preta[$graduacao]);

  ?>



  <?php



    // echo "</tr>";

    //
    // echo "</head>";//
    // echo "</table>";

  }
