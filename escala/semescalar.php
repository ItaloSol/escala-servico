<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
include_once('../dados/postos.php');
include_once('../dados/impedimento.php');
include_once('../dados/previsao.php');
include_once('../dados/escala.php');
include_once('../dados/contagem.php');

?>  <div class="row">

</div>

<!-- 
<div class="container">
    <div class="row">
        <div class="col-6">LADO A</div>
        <div class="col-6">A LADO</div>
    </div>
</div> -->

<?php
$Folga_Obrigatoria = date('Y-m-d', strtotime('-'. $Qtd_Prevista[9] .'day',strtotime($Desc_Escala_Data[0]))); 
$soma = $Qtd_Prevista[9] + $Qtd_Prevista[10];
$Folga_Obrigatoriaa = date('Y-m-d', strtotime('- '. $soma .' day',strtotime($Desc_Escala_Data[0]))); 

$quantidades = explode('0',$Qtd_Prevista[7]);
$limit_Sgt = $quantidades[0];
$limit_cabo = $quantidades[1];
$LimitMot = $quantidades[2];
$limit_sd = $quantidades[3];
$limit_miss = $quantidades[4];
$limit = 6;
$a = 0;
// ---soldado Ev----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '1' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv ASC, m.antiguidade DESC LIMIT $limit_sd");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_sd = $Cont['nome_de_guerra'];
$grad_sd = $Cont['nome_graduacao'];
$DataSv_sd = $Cont['data_ultimo_sv'];
$DataSvRed_sd = $Cont['data_ultimo_sv_red'];    
$ArraySd[$i] = $nome_sd;
$ArrayGradSd[$i] = $grad_sd;
$ArraySvSd[$i] = $DataSv_sd;
$ArraySvRedSd[$i] = $DataSvRed_sd;
$i++;
}

// ---HTO----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '4' AND servico != 'LICENCIADO' ORDER BY m.escalado_externo ASC, m.antiguidade DESC LIMIT $limit_Sgt");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Sgt_m = $Cont['nome_de_guerra'];
$grad_Sgt_m = $Cont['nome_graduacao'];
$DataSv_Sgt_m = $Cont['data_ultimo_sv'];
$DataSvRed_Sgt_m = $Cont['data_ultimo_sv_red'];    
$ArraySgtRRM[$i] = $nome_Sgt_m;
$ArrayGradSgtRRM[$i] = $grad_Sgt_m;
$ArraySvSgtRRM[$i] = $DataSv_Sgt_m;
$ArraySvRedSgtRRM[$i] = $DataSvRed_Sgt_m;
$i++;
}
// ---Cabo----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '3' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv ASC, m.antiguidade DESC LIMIT $limit_cabo");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_CB = $Cont['nome_de_guerra'];
$grad_CB = $Cont['nome_graduacao'];
$DataSv_Cb = $Cont['data_ultimo_sv'];
$DataSvRed_Cb = $Cont['data_ultimo_sv_red'];    
$ArrayCB[$i] = $nome_CB;
$ArrayGradCB[$i] = $grad_CB;
$ArraySvCB[$i] = $DataSv_Cb;
$ArraySvRedCB[$i] = $DataSvRed_Cb;
$i++;
}
// ---SGT----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '4' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv ASC, m.antiguidade DESC LIMIT $limit_Sgt");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Sgt = $Cont['nome_de_guerra'];
$grad_Sgt = $Cont['nome_graduacao'];
$DataSv_Sgt = $Cont['data_ultimo_sv'];
$DataSvRed_Sgt = $Cont['data_ultimo_sv_red'];    
$ArraySgt[$i] = $nome_Sgt;
$ArrayGradSgt[$i] = $grad_Sgt;
$ArraySvSgt[$i] = $DataSv_Sgt;
$ArraySvRedSgt[$i] = $DataSvRed_Sgt;
$i++;
}
// ---SGTRR----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '4' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv_red ASC, m.antiguidade DESC LIMIT $limit_Sgt");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Sgt = $Cont['nome_de_guerra'];
$grad_Sgt = $Cont['nome_graduacao'];
$DataSv_Sgt = $Cont['data_ultimo_sv'];
$DataSvRed_Sgt = $Cont['data_ultimo_sv_red'];    
$ArraySgtRR[$i] = $nome_Sgt;
$ArrayGradSgtRR[$i] = $grad_Sgt;
$ArraySvSgtRR[$i] = $DataSv_Sgt;
$ArraySvRedSgtRR[$i] = $DataSvRed_Sgt;
$i++;
}
// ---MOTORISTA----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.fk_cursos = '2'  AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv ASC, m.antiguidade DESC LIMIT $LimitMot");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Mot = $Cont['nome_de_guerra'];
$grad_Mot = $Cont['nome_graduacao'];
$DataSv_Mot = $Cont['data_ultimo_sv'];
$DataSvRed_Mot = $Cont['data_ultimo_sv_red'];    
$ArrayMot[$i] = $nome_Mot;
$ArrayGradMot[$i] = $grad_Mot;
$ArraySvMot[$i] = $DataSv_Mot;
$ArraySvRedMot[$i] = $DataSvRed_Mot;
$i++;
}
// ---MOTORISTA----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '2' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv ASC, m.antiguidade DESC LIMIT $limit_sd");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Ep = $Cont['nome_de_guerra'];
$grad_Ep = $Cont['nome_graduacao'];
$DataSv_Ep = $Cont['data_ultimo_sv'];
$DataSvRed_Ep = $Cont['data_ultimo_sv_red'];    
$ArrayEp[$i] = $nome_Ep;
$ArrayGradEp[$i] = $grad_Ep;
$ArraySvEp[$i] = $DataSv_Ep;
$ArraySvRedEp[$i] = $DataSvRed_Ep;
$i++;
}
// ---MISSÃO----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.data_ultimo_sv_red < '$Folga_Obrigatoria' AND m.data_ultimo_sv < '$Folga_Obrigatoria'
AND m.externo < '$Folga_Obrigatoria' AND m.servico != 'VERMELHA' AND m.atividade = '1' AND m.fk_cursos = '1' AND m.graduacao = '1' AND servico != 'LICENCIADO' ORDER BY m.missao ASC , m.antiguidade DESC LIMIT $limit_miss");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Miss = $Cont['nome_de_guerra'];
$grad_Miss = $Cont['nome_graduacao'];
$DataSv_Miss = $Cont['data_ultimo_sv'];
$DataSvRed_Miss = $Cont['data_ultimo_sv_red'];    
$ArrayMiss[$i] = $nome_Miss;
$ArrayGradMiss[$i] = $grad_Miss;
$ArraySvMiss[$i] = $DataSv_Miss;
$ArraySvRedMiss[$i] = $DataSvRed_Miss;
$i++;
}

?>
  
 
  <div class="modalsem" style="z-index: 1;">
  <div onclick="fecharsem()" class="fechar">X</div>
  <div class="container">
  <div class="row">
        <div class="col-6">
        <h1>Sobreavisos e Impedidos Escala Preta!</h1>
        <table   class="table table-bordered table-condensed dtable" >
 <tr><th>HTO</th></tr>
 <tr> 
    <th>Graduação </th>
    <th>Nome de Guerra </th>
    <th>Data Ultimo Sv Preta </th>
    <th>Data Ultimo Sv Vermelha </th>
</tr>
 <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
 
 $a = 0;
 while($a < $limit_Sgt){
    
   
        if($a == 0){
            echo '<tr bgcolor="Green">';
        }
    echo '<td>'.$ArrayGradSgtRRM[$a] .'</td>';
    echo '<td>'.$ArraySgtRRM[$a] .'</td>';
    echo '<td>'.date('d/m/Y', strtotime($ArraySvSgtRRM[$a])) .'</td>';
    echo '<td>'.date('d/m/Y', strtotime($ArraySvRedSgtRRM[$a])) .'</td> </tr>';
        $a++;
    
 }
 ?>
 </table>
<table class="table table-bordered table-condensed dtable">
<tr><th>Sargento de dia</th></tr>
<tr> 
   <th>Graduação </th>
   <th>Nome de Guerra </th>
   <th>Data Ultimo Sv Preta </th>
   <th>Data Ultimo Sv Vermelha </th>
</tr>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 

$a = 0;
while($a < $limit_Sgt){
   
   if($dia_semanaEn != 'sex'){ 
       if($a == 0){
           echo '<tr bgcolor="Green">';
       }
   echo '<td>'.$ArrayGradSgt[$a] .'</td>';
   echo '<td>'.$ArraySgt[$a] .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvSgt[$a])) .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvRedSgt[$a])) .'</td> </tr>';
       $a++;
   }else{
       if($a == 0){
           echo '<tr bgcolor="Green">';
       }
      echo '<td>'.$ArrayGradSgtRR[$a] .'</td>';
      echo '<td>'.$ArraySgtRR[$a] .'</td>';
      echo '<td>'.date('d/m/Y', strtotime($ArraySvSgtRR[$a])) .'</td>';
      echo '<td>'.date('d/m/Y', strtotime($ArraySvRedSgtRR[$a])) .'</td> </tr>';
       $a++;
   }
}
?>
</table>
<table class="table table-bordered table-condensed dtable" >
<tr><th>Cabo de dia</th></tr>

<tr> 
   <th>Graduação </th>
   <th>Nome de Guerra </th>
   <th>Data Ultimo Sv Preta </th>
   <th>Data Ultimo Sv Vermelha </th>
</tr>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
$a = 0;
while($a < $limit_cabo){
   if($a == 0){
       echo '<tr bgcolor="Green">';
   }
  echo '<td>'.$ArrayGradCB[$a] .'</td>';
  echo '<td>'.$ArrayCB[$a] .'</td>';
  echo '<td>'.date('d/m/Y', strtotime($ArraySvCB[$a])) .'</td>';
  echo '<td>'.date('d/m/Y', strtotime($ArraySvRedCB[$a])) .'</td> </tr>';
   $a++;
}
?>
</table>
<table   class="table table-bordered table-condensed dtable" >
<tr><th>Motorista</th></tr>
<tr> 
   <th>Graduação </th>
   <th>Nome de Guerra </th>
   <th>Data Ultimo Sv Preta </th>
   <th>Data Ultimo Sv Vermelha </th>
</tr>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
$a = 0;
while($a < $LimitMot){
   if($a == 0){
       echo '<tr bgcolor="Green">';
   }
  echo '<td>'.$ArrayGradMot[$a] .'</td>';
  echo '<td>'.$ArrayMot[$a] .'</td>';
  echo '<td>'.date('d/m/Y', strtotime($ArraySvMot[$a])) .'</td>';
  echo '<td>'.date('d/m/Y', strtotime($ArraySvRedMot[$a])) .'</td> </tr>';
   $a++;
}
?>
</table>  
<table   class="table table-bordered table-condensed dtable" >
<tr><th>Soldados Ev / Ep</th></tr>
<tr> 
   <th>Graduação </th>
   <th>Nome de Guerra </th>
   <th>Data Ultimo Sv Preta </th>
   <th>Data Ultimo Sv Vermelha </th>
</tr>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
$a = 0;
while($a < $limit_sd){
   if($a == 0){
       echo '<tr bgcolor="Green">';
   }
  echo '<td>'.$ArrayGradSd[$a] .'</td>';
  echo '<td>'.$ArraySd[$a] .'</td>';
  echo '<td>'.date('d/m/Y', strtotime($ArraySvSd[$a])) .'</td>';
  echo '<td>'.date('d/m/Y', strtotime($ArraySvRedSd[$a])) .'</td> </tr>';
   $a++;
}
?>
</table>
<table   class="table table-bordered table-condensed dtable" >
<tr><th>Missão</th></tr>
<tr> 
   <th>Graduação </th>
   <th>Nome de Guerra </th>
   <th>Data Ultimo Sv Preta </th>
   <th>Data Ultimo Sv Vermelha </th>
</tr>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
$a = 0;
while($a < $limit_miss){
   if($a == 0){
       echo '<tr bgcolor="Green">';
   }
  echo '<td>'.$ArrayGradMiss[$a] .'</td>';
  echo '<td>'.$ArrayMiss[$a] .'</td>';
  echo '<td>'.date('d/m/Y', strtotime($ArraySvMiss[$a])) .'</td>';
  echo '<td>'.date('d/m/Y', strtotime($ArraySvRedMiss[$a])) .'</td> </tr>';
   $a++;
}
?>
</table>  
        </div>
        <div class="col-6">
                
       

<!-- /////////////////////////////////////////////
///////////////////////////////////////// -->
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 


$a = 0;
// ---soldado Ev----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '1' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv_red ASC, m.antiguidade DESC LIMIT $limit_sd");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_sd = $Cont['nome_de_guerra'];
$grad_sd = $Cont['nome_graduacao'];
$DataSv_sd = $Cont['data_ultimo_sv'];
$DataSvRed_sd = $Cont['data_ultimo_sv_red'];    
$ArraySd[$i] = $nome_sd;
$ArrayGradSd[$i] = $grad_sd;
$ArraySvSd[$i] = $DataSv_sd;
$ArraySvRedSd[$i] = $DataSvRed_sd;
$i++;
}

// ---Cabo----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '3' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv_red ASC, m.antiguidade DESC  LIMIT $limit_cabo");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_CB = $Cont['nome_de_guerra'];
$grad_CB = $Cont['nome_graduacao'];
$DataSv_Cb = $Cont['data_ultimo_sv'];
$DataSvRed_Cb = $Cont['data_ultimo_sv_red'];    
$ArrayCB[$i] = $nome_CB;
$ArrayGradCB[$i] = $grad_CB;
$ArraySvCB[$i] = $DataSv_Cb;
$ArraySvRedCB[$i] = $DataSvRed_Cb;
$i++;
}
// ---SGT----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '4' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv_red ASC, m.antiguidade DESC LIMIT $limit_Sgt");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Sgt = $Cont['nome_de_guerra'];
$grad_Sgt = $Cont['nome_graduacao'];
$DataSv_Sgt = $Cont['data_ultimo_sv'];
$DataSvRed_Sgt = $Cont['data_ultimo_sv_red'];    
$ArraySgt[$i] = $nome_Sgt;
$ArrayGradSgt[$i] = $grad_Sgt;
$ArraySvSgt[$i] = $DataSv_Sgt;
$ArraySvRedSgt[$i] = $DataSvRed_Sgt;
$i++;
}
// ---MOTORISTA----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.fk_cursos = '2'  AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv_red ASC, m.antiguidade DESC LIMIT $LimitMot");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Mot = $Cont['nome_de_guerra'];
$grad_Mot = $Cont['nome_graduacao'];
$DataSv_Mot = $Cont['data_ultimo_sv'];
$DataSvRed_Mot = $Cont['data_ultimo_sv_red'];    
$ArrayMot[$i] = $nome_Mot;
$ArrayGradMot[$i] = $grad_Mot;
$ArraySvMot[$i] = $DataSv_Mot;
$ArraySvRedMot[$i] = $DataSvRed_Mot;
$i++;
}
// ---Ep----
$SobreAviso = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.graduacao = '2' AND servico != 'LICENCIADO' ORDER BY m.data_ultimo_sv_red ASC, m.antiguidade DESC LIMIT $limit_sd");
$SobreAviso->execute(); //EXECUTA TABELA
$i = 0;
while($Cont = $SobreAviso->fetch(PDO::FETCH_ASSOC)) { 
$nome_Ep = $Cont['nome_de_guerra'];
$grad_Ep = $Cont['nome_graduacao'];
$DataSv_Ep = $Cont['data_ultimo_sv'];
$DataSvRed_Ep = $Cont['data_ultimo_sv_red'];    
$ArrayEp[$i] = $nome_Ep;
$ArrayGradEp[$i] = $grad_Ep;
$ArraySvEp[$i] = $DataSv_Ep;
$ArraySvRedEp[$i] = $DataSvRed_Ep;
$i++;
}

?>


  
  <h1>Sobreaviso e Impedidos Escala Vermelha!</h1>
  <table   class="table table-bordered table-condensed dtable" >
  <tr><th>Sargento de dia</th></tr>
 <tr> 
    <th>Graduação </th>
    <th>Nome de Guerra </th>
    <th>Data Ultimo Sv Preta </th>
    <th>Data Ultimo Sv Vermelha </th>
</tr>
 <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
 $a = 0;
 while($a < $limit_Sgt){
    if($a == 0){
        echo '<tr bgcolor="Green">';
    }
   echo '<td>'.$ArrayGradSgt[$a] .'</td>';
   echo '<td>'.$ArraySgt[$a] .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvSgt[$a])) .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvRedSgt[$a])) .'</td> </tr>';
    $a++;
 }
 ?>
 </table>
 <table   class="table table-bordered table-condensed dtable" >
 <tr><th>Cabo de dia</th></tr>
 <tr> 
    <th>Graduação </th>
    <th>Nome de Guerra </th>
    <th>Data Ultimo Sv Preta </th>
    <th>Data Ultimo Sv Vermelha </th>
</tr>
 <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
 $a = 0;
 while($a < $limit_cabo){
    if($a == 0){
        echo '<tr bgcolor="Green">';
    }
   echo '<td>'.$ArrayGradCB[$a] .'</td>';
   echo '<td>'.$ArrayCB[$a] .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvCB[$a])) .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvRedCB[$a])) .'</td> </tr>';
    $a++;
 }
 ?>
 </table>
 <table   class="table table-bordered table-condensed dtable" >
 <tr><th>Motorista</th></tr>
 <tr> 
    <th>Graduação </th>
    <th>Nome de Guerra </th>
    <th>Data Ultimo Sv Preta </th>
    <th>Data Ultimo Sv Vermelha </th>
</tr>
 <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
 $a = 0;
 while($a < $LimitMot){
    if($a == 0){
        echo '<tr bgcolor="Green">';
    }
   echo '<td>'.$ArrayGradMot[$a] .'</td>';
   echo '<td>'.$ArrayMot[$a] .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvMot[$a])) .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvRedMot[$a])) .'</td> </tr>';
    $a++;
 }
 ?>
 </table>  
 <table   class="table table-bordered table-condensed dtable" >
 <tr><th>Soldados Ev / Ep</th></tr>
 <tr> 
    <th>Graduação </th>
    <th>Nome de Guerra </th>
    <th>Data Ultimo Sv Preta </th>
    <th>Data Ultimo Sv Vermelha </th>
</tr>
 <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
 $a = 0;
 while($a < $limit_sd){
    if($a == 0){
        echo '<tr bgcolor="Green">';
    }
   echo '<td>'.$ArrayGradSd[$a] .'</td>';
   echo '<td>'.$ArraySd[$a] .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvSd[$a])) .'</td>';
   echo '<td>'.date('d/m/Y', strtotime($ArraySvRedSd[$a])) .'</td> </tr>';
    $a++;
 }
 ?>
 </table>

  </div>
  </div>
  </div>
 
</div>