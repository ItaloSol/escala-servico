
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');

    $query_sd_posto = $conexao->prepare("SELECT * FROM posto WHERE status_posto = '1' ORDER BY id_posto ASC "); 
    $query_sd_posto->execute(); 
    $i = 0;
     while($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
        $PostoId = $linha['id_posto'];
        $NomePosto = $linha['nome_posto']; 
        $qtdPosto = $linha['qtd_mil'];
        $tipoFolga = $linha['tipo_folga'];
        $graduacaoPosto = $linha['posto_graduacao'];
        $servicoPosto = $linha['posto_servico'];
        $curso = $linha['curso'];
        $Posto_ID[$i] = $PostoId;
        $Posto_Nome[$i] = $NomePosto;
        $Posto_Qtd_Mil[$i] = $qtdPosto;
        $Posto_Tipo_Sv[$i] = $tipoFolga;
        $Posto_Curso[$i] = $curso;
        $Posto_Graducao[$i] = $graduacaoPosto;
        $Posto_Servico[$i] = $servicoPosto;
        if($Posto_Graducao[$i] == '2'){
            if($Posto_Tipo_Sv[$i] != 'missao'){
            if( $Posto_Servico[$i] == 'PRETA'){
               if(isset($Posto_Qtd_Mil_Soma_Ev)){
                  $Posto_Qtd_Mil_Soma_Ev = $Posto_Qtd_Mil[$i] +  $Posto_Qtd_Mil_Soma_Ev;         
                  }else{ 
               $Posto_Qtd_Mil_Soma_Ev = $Posto_Qtd_Mil[$i];
                  }
                  if(isset($Qtd_Mil_Ev)){
                     $Qtd_Mil_Ev = $Posto_Qtd_Mil[$i] +  $Qtd_Mil_Ev;
                  }else{ 
               $Qtd_Mil_Ev = $Posto_Qtd_Mil[$i];
                  }
               }
            }
            if($Posto_Graducao[$i] == '2'){
               if($Posto_Tipo_Sv[$i] == 'missao'){
               if( $Posto_Servico[$i] == 'PRETA'){
                  if(isset($Posto_Qtd_Mil_Soma_Miss)){
                     $Posto_Qtd_Mil_Soma_Miss = $Posto_Qtd_Mil[$i] +  $Posto_Qtd_Mil_Soma_Miss;         
                     }else{ 
                  $Posto_Qtd_Mil_Soma_Miss = $Posto_Qtd_Mil[$i];
                     }
                     if(isset($Qtd_Mil_Miss)){
                        $Qtd_Mil_Miss = $Posto_Qtd_Mil[$i] +  $Qtd_Mil_Miss;
                     }else{ 
                  $Qtd_Mil_Miss = $Posto_Qtd_Mil[$i];
                     }
                  }
               }
            }
            if($Posto_Servico[$i] == 'VERMELHA'){
               if(isset($Posto_Qtd_Mil_Soma_Ev_Red)){
                  $Posto_Qtd_Mil_Soma_Ev_Red = $Posto_Qtd_Mil[$i] +  $Posto_Qtd_Mil_Soma_Ev_Red;         
                  }else{ 
               $Posto_Qtd_Mil_Soma_Ev_Red = $Posto_Qtd_Mil[$i];
                  }
                  if(isset($Qtd_Mil_Ev_Red)){
                     $Qtd_Mil_Ev_Red = $Posto_Qtd_Mil[$i] +  $Qtd_Mil_Ev_Red;
                  }else{ 
               $Qtd_Mil_Ev_Red = $Posto_Qtd_Mil[$i];
                  }
            }
          
         }
        if($Posto_Graducao[$i] == '3'){
           if(isset($Posto_Qtd_Mil_Cb)){ 
           $Posto_Qtd_Mil_Cb = $Posto_Qtd_Mil[$i] +  $Posto_Qtd_Mil_Cb;
           }else{
            $Posto_Qtd_Mil_Cb = $Posto_Qtd_Mil[$i];
           }
        }
        if($Posto_Curso[$i] != '1'){ 
         if(isset($Qtd_Motorista)){
            $Qtd_Motorista = $Posto_Qtd_Mil[$i] +  $Qtd_Motorista;
         }else{ 
         $Qtd_Motorista = $Posto_Qtd_Mil[$i];
         }
         }
            if($Posto_Graducao[$i] == '2'){
               if($Posto_Curso[$i] == 'MOTORISTA'){ 
                  if(isset($Qtd_Mil_Ep_Escala_Resumo)){
                     $Qtd_Mil_Ep_Escala_Resumo = $Posto_Qtd_Mil[$i] +  $Qtd_Mil_Ep_Escala_Resumo;
                  }else{ 
                  $Qtd_Mil_Ep_Escala_Resumo = $Posto_Qtd_Mil[$i];
                  }
               }
            }
            if($Posto_Graducao[$i] == '4'){
               
                  if(isset($Qtd_Posto_Sgt)){
                     $Qtd_Posto_Sgt = $Posto_Qtd_Mil[$i] +  $Qtd_Posto_Sgt;
                  }else{ 
                  $Qtd_Posto_Sgt = $Posto_Qtd_Mil[$i];
                  }
               
            }
            if($Posto_Graducao[$i] == '19'){
               if($Posto_Curso[$i] == '1'){ 
                  if(isset($Qtd_Mil_S)){
                     $Qtd_Mil_S = $Posto_Qtd_Mil[$i] +  $Qtd_Mil_S;
                  }else{ 
                  $Qtd_Mil_S = $Posto_Qtd_Mil[$i];
                  }
               }
            }
         $i++;
   }
  $total_de_posto = count($Posto_ID);

  // echo $Qtd_Mil_Ep_Escala_Resumo.
   $Qtd_Postos = $i;
   //NUMERO DE POSTOS QUE EXISTE
   $Militares_Por_Dia = $Posto_Qtd_Mil[0];
    $Postos_Existentes = $i ;
    $a = 1;
    while($a < $i){
       $Militares_Por_Dia = $Militares_Por_Dia + $Posto_Qtd_Mil[$a];
       $a++;
    }

    $query_sd_posto = $conexao->prepare("SELECT * FROM posto WHERE tipo_folga = 'externo' ORDER BY id_posto ASC "); 
    $query_sd_posto->execute(); 
    $i = 0;
     while($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
        $PostoId = $linha['id_posto'];
        $NomePosto = $linha['nome_posto']; 
        $qtdPosto = $linha['qtd_mil'];
        $graduacaoPosto = $linha['posto_graduacao'];
        $servicoPosto = $linha['posto_servico'];

        $Posto_Externo_ID[$i] = $PostoId;
        $Posto_Externo_Nome[$i] = $NomePosto;
        $Posto_Externo_Qtd_Mil[$i] = $qtdPosto;
        $Posto_Externo_Graducao[$i] = $graduacaoPosto;
        $Posto_Externo_Servico[$i] = $servicoPosto;
     }
  
   //       //      //
//    $a = 0;
//      while($i > $a ){
//          echo "<br>----------------<br>";
//        echo $Posto_ID[$a] ."<br>".    $Posto_Nome[$a] ."<br>".      $Posto_Qtd_Mil[$a] ."<br>".     $Posto_Tipo_Sv[$a] ."<br>".      $Posto_Graducao[$a] ."<br>".
//         $Posto_Servico[$a] ."<br>";
//         echo "<br>----------------<br>";
//         $a++;
//     }