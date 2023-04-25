<?php
include_once('../dados/escala.php');

if (isset($_GET['escala'])) {
    $Data_Selecionada = $_GET['d'];
   
}else{
    $Data_Selecionada = $Data_Atual_Atualizada;
}

 if(isset($_POST['sgt'])){
        $Sgt_Vermlha = $_POST['sgt'];
    }else{
        $Sgt_Vermlha =  0;
    }

    $Dia_Selecionado = date('d' ,strtotime($Data_Selecionada)); 
    $Mes_Selecionado = date('m' ,strtotime($Data_Selecionada));
    $Ano_Selecionado = date('Y' ,strtotime($Data_Selecionada));

    $query_feriado = $conexao->prepare("SELECT * FROM `feriados` ORDER BY `data` ASC " );
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
       
//   /   /   /   /   /   /   /   /   /   /   /       /
        // DECLARAÇÃO DE VARIAVEIS
    $Ev_Red = 0;
    $Ev_Pre = 0;
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
    $dia_semanaEn = strftime('%a',strtotime($Data_Selecionada));
    //      //  /   /       /   /   /   //  /   /   ///
    
    // echo 'Data Selecionada = '. $Data_Selecionada . '<br>';
    // echo 'Ultima Data Da Escala = '.$Ultima_Data_Da_Escala .'<br>';
     if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){
        $Tipo_Sv_Previsto = 'VERMELHA'; 
     }
     $a = 0;
     while($a < $Quantidade_Feriado){
        if($Feriado_Data[$a] == $Data_Selecionada){
            $Tipo_Sv_Previsto = 'VERMELHA';
        }
        $a++;
     }
     if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' or $dia_semanaEn == 'Fri'){
        $Tipo_Sv_Previsto_Sgt = 'VERMELHA'; 
     }
    if($Data_Selecionada < $Ultima_Data_Da_Escala){
        $Escala = true;
    }
    if($Tipo_Sv_Previsto == 'PRETA'){
        $data_inicio = new DateTime("$Ultima_Data_Da_Escala");
        $data_fim = new DateTime("$Data_Selecionada");
         // Resgata diferença entre as datas
        $dateInterval = $data_inicio->diff($data_fim);
        $O_Intervalo_Puro = $dateInterval->days;
       // echo 'O intervalo puro = '. $O_Intervalo_Puro . '<br>';
        $Percorrer_Distancia = 0;
        $Pegando_Finais_De_Semana = 0;
        while($Percorrer_Distancia < $O_Intervalo_Puro){
            $Buscando_Final_De_Semana = date('Y-m-d', strtotime('+'. $Percorrer_Distancia .'day',strtotime($Ultima_Data_Da_Escala)));
            $Convertendo_Final_De_Semana = strftime('%a',strtotime($Buscando_Final_De_Semana));
        // echo $Convertendo_Final_De_Semana . '<br>';
            if($Convertendo_Final_De_Semana == 'Sat' or $Convertendo_Final_De_Semana == 'Sun'){
                $Pegando_Finais_De_Semana++;
            }
            $Percorrer_Distancia++;
        }
       // echo 'Pegou = '. $Pegando_Finais_De_Semana .' Finais de semana<br>';
        $Pagina_Preta = $O_Intervalo_Puro - $Pegando_Finais_De_Semana;
       // echo 'Pagina certa é = '. $Pagina_Preta. '<br>';

        $Ev_Pre = $Pagina_Preta;
        $Ep_Pre = $Pagina_Preta;
        $Sgt_Pre = $Pagina_Preta;
        $Cab_Pre = $Pagina_Preta;
        $Mot_Pre = $Pagina_Preta;

    }
    if($Tipo_Sv_Previsto == 'VERMELHA'){
        $data_inicio = new DateTime("$Ultima_Data_Da_Escala");
        $data_fim = new DateTime("$Data_Selecionada");
         // Resgata diferença entre as datas
        $dateInterval = $data_inicio->diff($data_fim);
        $O_Intervalo_Puro = $dateInterval->days;
       // echo 'O intervalo puro = '. $O_Intervalo_Puro . '<br>';
        $Percorrer_Distancia = 0;
        $Pegando_Dias_De_Semana = 0;
        while($Percorrer_Distancia < $O_Intervalo_Puro){
            $Buscando_Dia_De_Semana = date('Y-m-d', strtotime('+'. $Percorrer_Distancia .'day',strtotime($Ultima_Data_Da_Escala)));
            $Convertendo_Dia_De_Semana = strftime('%a',strtotime($Buscando_Dia_De_Semana));
        // echo $Convertendo_Dia_De_Semana . '<br>';
            if($Convertendo_Dia_De_Semana != 'Sat' && $Convertendo_Dia_De_Semana != 'Sun'){
                $Pegando_Dias_De_Semana++;
            }
            $Percorrer_Distancia++;
        }
       // echo 'Pegou = '. $Pegando_Dias_De_Semana .' Dias de semana<br>';
        $Pagina_Vermlha = $O_Intervalo_Puro - $Pegando_Dias_De_Semana;
       // echo 'Pagina certa é = '. $Pagina_Vermlha. '<br>';

        $Ev_Red = $Pagina_Vermlha;
        $Ep_Red = $Pagina_Vermlha;
        $Sgt_Red = $Pagina_Vermlha; 
        $Cab_Red = $Pagina_Vermlha;
        $Mot_Red = $Pagina_Vermlha;

    }
    
    ////// 
    // DATAS
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dataprevista = date('Y-m-d',strtotime($Data_Selecionada)); 
    $exibedata = date('d/m/y',strtotime($Data_Selecionada)); 
    $dia_semanaPt = strftime('%a',strtotime($Data_Selecionada));
  ////
  
   


  
 ?>

<!-- <form method="post"  >
  Escolha a Data:
  
  <input type="date" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Data_Selecionada; ?>" name="d">
  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($Escala == false){ 
      if($dia_semanaEn == 'Sat' or $dia_semanaEn == 'Sun' ){?>
  <input type="hidden" name="sd_ep" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ep_Red; ?>">
  <input type="hidden" name="sd_ev" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ev_Red; ?>">
  <input type="hidden" name="sd_motora" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Mot_Red; ?>">
 
  <input type="hidden" name="cabo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Cab_Red; ?>">
  <input type="hidden" name="tipo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto; ?>">
  <input type="hidden" name="tiposgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto_Sgt; ?>">
  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ }else{
      ?>
   <input type="hidden" name="sd_ep" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ep_Pre; ?>">
  <input type="hidden" name="sd_ev" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Ev_Pre; ?>">
  <input type="hidden" name="sd_motora" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Mot_Pre; ?>">
  
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
  <input type="hidden" name="sd_motora" value="0">
  <input type="hidden" name="sgt" value="0">
  <input type="hidden" name="cabo" value="0">
  <input type="hidden" name="tipo" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto; ?>">
  <input type="hidden" name="tiposgt" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Tipo_Sv_Previsto_Sgt; ?>">
  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ } ?> 
  <input type="submit" name='escala'> <b style='font-size: 10px;'><= APERTE 2 VEZES O BOTÃO!!</b>
</form> -->
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