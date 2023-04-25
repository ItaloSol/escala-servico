
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');

    $query_sd_posto = $conexao->prepare('SELECT * FROM posto ORDER BY id_posto ASC'); 
    $query_sd_posto->execute(); 
    $i = 0;
     while($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
        $PostoId = $linha['id_posto'];
        $NomePosto = $linha['nome_posto']; 
        $qtdPosto = $linha['qtd_mil'];
        $tipoPosto = $linha['tipo_sv'];
        $graduacaoPosto = $linha['posto_graduacao'];
        $servicoPosto = $linha['posto_servico'];

        $Posto_ID[$i] = $PostoId;
        $Posto_Nome[$i] = $NomePosto;
        $Posto_Qtd_Mil[$i] = $qtdPosto;
        $Posto_Tipo_Sv[$i] = $tipoPosto;
        $Posto_Graducao[$i] = $graduacaoPosto;
        $Posto_Servico[$i] = $servicoPosto;
        $i++;
   }
   //NUMERO DE POSTOS QUE EXISTE
   $Militares_Por_Dia = $Posto_Qtd_Mil[0];
    $Postos_Existentes = $i ;
    $a = 1;
    while($a < $i){
       $Militares_Por_Dia = $Militares_Por_Dia + $Posto_Qtd_Mil[$a];
       $a++;
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