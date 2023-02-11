
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
include_once('../dados/impedimento.php');
include_once('../dados/previstos.php');



$limit = 15;
$a = 0;

function sobreaviso(){
    global $conexao;
    global $Dia_Semana;
    global $Impedido_Dia;
    if($Dia_Semana == 'sex'){
        $Dia_Semana = 'Sex';
    }
    
if ($Dia_Semana == 's�b' or $Dia_Semana == 'sab' or $Dia_Semana == 'Sab') {
    $Dia_Semana = 'sáb';
}
    $query_postos_sobre = $conexao->prepare("SELECT * FROM posto WHERE status_posto = '1' AND prioridade != '-1' AND tipo_folga != 'externo' AND data_posto LIKE '%$Dia_Semana%'  ORDER BY prioridade ASC");
    $query_postos_sobre->execute(); //EXECUTA TABELA
    $qtd_postos = 0;

    while($posto_sobre = $query_postos_sobre->fetch(PDO::FETCH_ASSOC)) {
        $nome_posto = $posto_sobre['nome_posto'];
        $posto_graduacao_ = $posto_sobre['posto_graduacao'];
        $tipo_folga = $posto_sobre['tipo_folga'];
        if($posto_graduacao_ == '19'){
            $posto_graduacao = '(1,2)';
        }else{
            $posto_graduacao = '('. $posto_graduacao_ . ')';
        }
            $Nome_Posto[$qtd_postos] = $nome_posto;
        
            ////
            $SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao IN $posto_graduacao AND servico != 'LICENCIADO' AND m.atividade = '1' AND m.id NOT IN $Impedido_Dia ORDER BY m.$tipo_folga ASC, m.antiguidade DESC");
            $SobreAviso->execute(); //EXECUTA TABELA
            $mil_encontrado = 0;
            while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
            $nome_Ep = $Cont['nome_de_guerra'];
            $grad_Ep = $Cont['nome_graduacao'];
            $DataSv_Ep = $Cont[$tipo_folga];
            $Array_Nome[$mil_encontrado] = $nome_Ep;
            $Array_Grad[$mil_encontrado] = $grad_Ep;
            $ArrayS_Sv[$mil_encontrado] = $DataSv_Ep;
            $mil_encontrado++;
            }
           $SobreAvisos_Nome_De_Guerra[$qtd_postos] = $Array_Nome;
           $SobreAvisos_Graduacao[$qtd_postos] = $Array_Grad;
           $SobreAvisos_Data_Sv[$qtd_postos]  = $ArrayS_Sv;
           $SobreAvisos_Qtd_Posto[$qtd_postos] = $mil_encontrado;
            ///
            $qtd_postos++;
           
    }
    $b= 0;
    while($b < $qtd_postos){
    echo '<table   class="table table-bordered table-condensed dtable" >
    <tr><th>'.$Nome_Posto[$b].'</th></tr>
    <tr> 
        <th>Graduação </th>
        <th>Nome de Guerra </th>
        <th>Data Ultimo Serviço <br> No Posto <br> '.$Nome_Posto[$b].' </th>
        
    </tr>';
   
    $a = 0;
    while($a < $SobreAvisos_Qtd_Posto[$b]){
       if($Dia_Semana != 'sex'){ 
           if($a == 0){
               echo '<tr bgcolor="Green">';
           }else{
            echo '<tr>';
           }
       echo '<td style="color:black;">'.$SobreAvisos_Graduacao[$b][$a] .'</td>';
       echo '<td style="color:black;">'.$SobreAvisos_Nome_De_Guerra[$b][$a] .'</td>';
       echo '<td style="color:black;">'.date('d/m/Y', strtotime($SobreAvisos_Data_Sv[$b][$a])) .'</td></tr>';
       }
       $a++;
       if($a == 15){
        break;
       }
    }
    echo '</table>';
    $b++;
    }
  //  print_r($Nome_Posto); echo '<br>'; print_r($SobreAvisos_Qtd_Posto); 
}







?>
  
  
  <div  class="modalinfo" style="z-index: 1;">
  <div onclick="fecharinfo()" style="width: 115px; height: 98px; font-size: 50px; display: flex; align-items: center; justify-content: center;" class="fechar">X</div>
 <h1>Sobreavisos Escala Preta!</h1>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
   
echo sobreaviso();
?> 
</div>
</div>
<div  class="modalinfored" style="z-index: 1;">
  <div onclick="fecharinfored()" style="width: 115px; height: 98px; font-size: 50px; display: flex; align-items: center; justify-content: center;" class="fechar">X</div>
  <h1>Sobreaviso Escala Vermelha!</h1>

  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
  echo sobreaviso();
  ?>
  </div>
  </div>