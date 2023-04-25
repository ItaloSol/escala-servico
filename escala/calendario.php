<style>
.btn-dark {
    color: #000;
    background-color: #ffffff;
    border-color: #343a40;
}
</style>
<?php
include_once('../dados/escala.php');

if (isset($_POST['escala'])) {
    $Data_Selecionada = $_POST['d'];
   
}else{
    $Data_Selecionada = $Desc_Escala_Data[0];
}

$query_feriado = $conexao->prepare("SELECT * FROM `feriados` WHERE data >= '$Desc_Escala_Data[0]' AND data <= '$Data_Selecionada' ORDER BY `data` ASC " );
$query_feriado->execute();
    $Percorrer_Feriado = 0;
    $Quantidade_Feriado = 0;
    while($Percorrer_Feriadoriado = $query_feriado->fetch(PDO::FETCH_ASSOC)) {
        $Date_Feriado = $Percorrer_Feriadoriado['data']; 
        $motivo_feriado = $Percorrer_Feriadoriado['motivo']; 
        $id_feriado = $Percorrer_Feriadoriado['id']; 

        $Feriado_Data[$Percorrer_Feriado] = $Date_Feriado;
        $Feriado_Motivo[$Percorrer_Feriado] = $motivo_feriado;
        $Feriado_Id[$Percorrer_Feriado] = $id_feriado;
        $Percorrer_Feriado++;
        $Quantidade_Feriado++;
    }
  // echo 'Quantidade_Feriado '. $Quantidade_Feriado;
 //  echo '<br>';
    $Dia_Selecionado = date('d' ,strtotime($Data_Selecionada)); 
    $Mes_Selecionado = date('m' ,strtotime($Data_Selecionada));
    $Ano_Selecionado = date('Y' ,strtotime($Data_Selecionada));
    $data_fim = new DateTime("$Data_Selecionada");
    $Ultima_Data_Da_Escala = date('Y-m-d', strtotime('+'. 1 .'day',strtotime($Desc_Escala_Data[0])));

  //  echo 'Ultima_Data_Da_Escala '.$Ultima_Data_Da_Escala;
  //  echo '<br>';
    $dateStart = new \DateTime($Ultima_Data_Da_Escala);
    $dateNow   = new \DateTime(date($Data_Selecionada));
    
    $dateDiff = $dateStart->diff($dateNow);

  //  echo 'dateDiff '. $dateDiff->d;
    $diferenca_data = $dateDiff->d;
    
    
    /////
   
//   /   /   /   /   /   /   /   /   /   /   /       /
        // DECLARAÇÃO DE VARIAVEIS
    $Ev_Red = 0;
    $Ev_Pre = 0;
    $Miss_Pre = 0;
    $Ep_Red = 0;
    $Ep_Pre = 0;
    $Sgt_Red = 0; 
    $Sgt_Pre = 0;
    $Cab_Red = 0;
    $Cab_Pre = 0;
    $Mot_Red = 0;
    $Mot_Pre = 0;
    $Tipo_Sv_Previsto = 'PRETA'; 
    $Tipo_Sv_Previsto_Sgt = 'PRETA'; 
    $Ultima_Data_Da_Escala = date('Y-m-d', strtotime('+'. 1 .'day',strtotime($Desc_Escala_Data[0]))); 
    $Escala = false;
    $EscalaExterna = false;
    $dia_semanaEn = strtotime('%a',strtotime($Data_Selecionada));
    //      //  /   /       /   /   /   //  /   /   ///
    
    // echo 'Data Selecionada = '. $Data_Selecionada . '<br>';
    // echo 'Ultima Data Da Escala = '.$Ultima_Data_Da_Escala .'<br>';
    $query_sd_posto = $conexao->prepare("SELECT * FROM externa WHERE data = '$Data_Selecionada'  "); 
    $query_sd_posto->execute(); 
    $i = 0;
     while($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
    $quatidade = $linha['fk_militar'];
    $EscalaExterna = true;
    $i++;
    }
    $QtdServicoExterno = $i;
     if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
        $Tipo_Sv_Previsto = 'VERMELHA'; 
     }
     if($dia_semanaEn == 'sab' or $dia_semanaEn == 'dom' ){
        $Tipo_Sv_Previsto = 'VERMELHA'; 
     }
     $Feriado = 3;
     $a = 0;
     while($a < $Quantidade_Feriado){
        if($Feriado_Data[$a] == $Data_Selecionada){
            $Tipo_Sv_Previsto = 'VERMELHA';
           $Feriado = 1;
        }
        $a++;
     }
  
    if($Data_Selecionada < $Ultima_Data_Da_Escala){
        $Escala = true;
    }
       
    // echo 'O intervalo puro = '. $Percorrer_Diferenca . '<br>';
        $Percorrer_Diferenca = 0;
        $Pegando_Finais_De_Semana = 0;
        while($Percorrer_Diferenca < $diferenca_data){
            $Buscando_Final_De_Semana = date('Y-m-d', strtotime('+'. $Percorrer_Diferenca .'day',strtotime($Ultima_Data_Da_Escala)));
            $Convertendo_Final_De_Semana = strftime('%a',strtotime($Buscando_Final_De_Semana));
    // echo $Convertendo_Final_De_Semana . '<br>';
            if($Convertendo_Final_De_Semana == 'Sat' or $Convertendo_Final_De_Semana == 'Sun'){
                $Pegando_Finais_De_Semana++;
            }
            $Percorrer_Diferenca++;
        }
    // echo 'Pegou = '. $Pegando_Finais_De_Semana .' Finais de semana<br>';
    
        $Pagina_Preta = $diferenca_data - $Pegando_Finais_De_Semana;
        if(isset($Feriado_Data)){
            $Pagina_Preta = $Pagina_Preta - $Quantidade_Feriado;
            
        }
        if($Pagina_Preta == -1){
            $Pagina_Preta = 0;
        }
    //    echo '<br>';
    //  echo 'Pagina certa PRETA é = '. $Pagina_Preta. '<br>';

        $Ev_Pre = $Pagina_Preta;
        $Ep_Pre = $Pagina_Preta;
        $Sgt_Pre = $Pagina_Preta;
        $Cab_Pre = $Pagina_Preta;
        $Mot_Pre = $Pagina_Preta;
        $Miss_Pre = $Pagina_Preta;

       
        $Percorrer_Diferenca = 0;
        $Pegando_Dias_De_Semana = 0;
        while($Percorrer_Diferenca < $diferenca_data){
            $Buscando_Dia_De_Semana = date('Y-m-d', strtotime('+'. $Percorrer_Diferenca .'day',strtotime($Ultima_Data_Da_Escala)));
            $Convertendo_Dia_De_Semana = strftime('%a',strtotime($Buscando_Dia_De_Semana));
  //   echo $Convertendo_Dia_De_Semana . '<br>';
            if($Convertendo_Dia_De_Semana != 'Sat' && $Convertendo_Dia_De_Semana != 'Sun'){
                $Pegando_Dias_De_Semana++;

            }
            $Percorrer_Diferenca++;
        }

    //   $Pegando_Dias_De_Semana = $Pegando_Dias_De_Semana - $Menos_Qtd_Feriado;
    //    echo $Menos_Qtd_Feriado;
    // echo 'Pegou = '. $Pegando_Dias_De_Semana .' Dias de semana<br>';
        $Pagina_Vermlha = $Percorrer_Diferenca - $Pegando_Dias_De_Semana;
        if(isset($Feriado_Data[0])){
            if($Data_Selecionada == $Feriado_Data[0]){

            }else{
                $Pagina_Vermlha = $Pagina_Vermlha + $Quantidade_Feriado;
            }
        }
       
        
    
      //  echo 'Pagina certa VERMELHA é = '. $Pagina_Vermlha. '<br>';

        $Ev_Red = $Pagina_Vermlha;
        $Ep_Red = $Pagina_Vermlha;
        $Sgt_Red = $Pagina_Vermlha; 
        $Cab_Red = $Pagina_Vermlha;
        $Mot_Red = $Pagina_Vermlha;

    
    ////// 
    // DATAS
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dataprevista = date('Y-m-d',strtotime($Data_Selecionada)); 
    $exibedata = date('d/m/y',strtotime($Data_Selecionada)); 
    $dia_semanaPt = strftime('%a',strtotime($Data_Selecionada));
  ////
  
//  echo $dia_semanaEn . ' '. $Tipo_Sv_Previsto;
 ?>

<form method="POST"  >
  <b style="color: white;"> Escolha a Data:  </b>
  
  <span class="datepicker-toggle">
  <span class="datepicker-toggle-button"></span>
  <input style="max-height: 25px; border-radius: 0.375rem" type="date" class="datepicker-input" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Data_Selecionada; ?>" name="d">
</span> 
  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($Escala == false){ 
      if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){?>
  <input type="hidden" name="sd_ep" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ep_Red; ?>">
  <input type="hidden" name="sd_miss" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Miss_Pre; ?>">
  <input type="hidden" name="sd_ev" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ev_Red; ?>">
  <input type="hidden" name="feriado" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Feriado; ?>">
  <input type="hidden" name="pagina_pre" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ev_Pre; ?>">
  <input type="hidden" name="pagina" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ev_Red; ?>">
  <input type="hidden" name="dia" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $dia_semanaPt; ?>">
  <input type="hidden" name="sd_motora" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Mot_Red; ?>">
  <?php
   if(isset($Impedido_Dia)){
    if($Impedido_Dia != '(0)'){
      ?>  <input type="hidden" name="imped" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Red_Cabo_Id[0] ?>"> <?php
    }
    
   }?> 
  <input type="hidden" name="cabo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Cab_Red; ?>">
  <input type="hidden" name="tipo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto; ?>">
  <input type="hidden" name="tiposgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto_Sgt; ?>">
  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ }else{
      ?>
   <input type="hidden" name="sd_ep" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ep_Pre; ?>">
  <input type="hidden" name="sd_ev" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ev_Pre; ?>">
  <input type="hidden" name="pagina_pre" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ev_Pre; ?>">
  <input type="hidden" name="pagina" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ev_Red; ?>">
  <input type="hidden" name="feriado" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Feriado; ?>">
  <input type="hidden" name="sd_miss" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Miss_Pre; ?>">
  <input type="hidden" name="dia" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $dia_semanaPt; ?>">
  <input type="hidden" name="sd_motora" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Mot_Pre; ?>">
  <?php
   if(isset($Impedido_Dia)){
    if($Impedido_Dia != '(0)'){
      ?>  <input type="hidden" name="imped" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Cabo_Id[0] ?>"> <?php
    }
    
   }?> 

  <input type="hidden" name="cabo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Cab_Pre; ?>">
  <input type="hidden" name="tipo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto; ?>">
  <input type="hidden" name="tiposgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto_Sgt; ?>">
      <?php
  } 
  if($dia_semanaEn == 'Fri' or $dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun'){
      echo  '<input type="hidden" name="sgt" value="'.$Sgt_Red.'">';
  }else{
    echo  '<input type="hidden" name="sgt" value="'.$Sgt_Pre.'">';
  }
  } ?>
  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($Escala == true){ ?>
    <input type="hidden" name="sd_ep" value="0">
  <input type="hidden" name="sd_ev" value="0">
  <input type="hidden" name="pagina" value="0">
  <input type="hidden" name="dia" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $dia_semanaPt; ?>">
  <input type="hidden" name="sd_motora" value="0">
  <input type="hidden" name="sgt" value="0">
  <input type="hidden" name="feriado" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Feriado; ?>">
  <input type="hidden" name="pagina_pre" value="0">
  <input type="hidden" name="sd_miss" value="0">
  <input type="hidden" name="cabo" value="0">
  <input type="hidden" name="tipo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto; ?>">
  <input type="hidden" name="tiposgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto_Sgt; ?>">
  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ } ?> 
  <!-- <b style='font-size: 10px;'><= APERTE 2 VEZES O BOTÃO!!</b> -->
  <input type="submit" style="padding: 1px;  max-height: 21px;"  class="btn btn-dark" value="PESQUISAR" name='escala'> 
</form>
<?php	 
if(isset($_SESSION['msgM'])){
    echo $_SESSION['msgM'];
  unset($_SESSION['msgM']);
  }   

  if(isset($_SESSION['msgC'])){
    echo $_SESSION['msgC'];
  unset($_SESSION['msgC']);
  }  
  if(isset($_SESSION['msgEv'])){
    echo $_SESSION['msgEv'];
  unset($_SESSION['msgEv']);
  } 
  if(isset($_SESSION['msgEp'])){
    echo $_SESSION['msgEp'];
  unset($_SESSION['msgEp']);
  } 
  if(isset($_SESSION['msgSgt'])){
    echo $_SESSION['msgSgt'];
  unset($_SESSION['msgSgt']);
  } 
  