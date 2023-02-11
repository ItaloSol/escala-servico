
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');

    $query_sd_posto = $conexao->prepare("SELECT * FROM posto WHERE status_posto = '1' ORDER BY id_posto ASC "); 
    $query_sd_posto->execute(); 
    $i = 0;
     while($linha_POSTO = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
        $PostoId = $linha_POSTO['id_posto'];
        $NomePosto = $linha_POSTO['nome_posto']; 
        $qtdPosto = $linha_POSTO['qtd_mil'];
        $tipoFolga = $linha_POSTO['tipo_folga'];
        $graduacaoPosto = $linha_POSTO['posto_graduacao'];
        $servicoPosto = $linha_POSTO['posto_servico'];
        $curso = $linha_POSTO['curso'];
        $Posto_ID[$i] = $PostoId;
        $Posto_Nome[$i] = $NomePosto;
        $Posto_Qtd_Mil[$i] = $qtdPosto;
        $Posto_Tipo_Sv[$i] = $tipoFolga;
        $Posto_Curso[$i] = $curso;
        $Posto_Graducao[$i] = $graduacaoPosto;
        $Posto_Servico[$i] = $servicoPosto;
       
         $i++;
   }
   if(isset($PostoId)){
     $total_de_posto = count($Posto_ID);

      // echo $Qtd_Mil_Ep_Escala_Resumo.
   $total_de_posto = $i;
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
   }else{
      $total_de_posto = 0;
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