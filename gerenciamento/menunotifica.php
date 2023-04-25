<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 

include_once('../conexoes/conect.php');

require("../conexoes/conexao.php");
// INNER JOIN militares m ON a.cod_militar = m.id $graduacao[$ano] = $ultimosv['graduacao'];
 $query_data_ultimo_sv = $conexao->prepare("SELECT  * FROM anotacoes a  WHERE a.sts = 1 ORDER by a.data_agenda ASC");//SELECIONA A TABELA DE MILITARES
 $query_data_ultimo_sv->execute(); //EXECUTA TABELA
 $ano = 0;
   while($ultimosv = $query_data_ultimo_sv->fetch(PDO::FETCH_ASSOC)  )
   {
     
     $obs[$ano] = $ultimosv['obs'];
     $titulo[$ano] = $ultimosv['titulo'];
     $data_agenda[$ano] = $ultimosv['data_agenda'];
     if(isset($ultimosv['cod_militar'])){ 
      $id_mil[$ano] = $ultimosv['cod_militar'];
     }
  if(isset($id_mil[$ano])){
    $PUXAMil = $conexao->prepare("SELECT  * FROM militares  WHERE id = '$id_mil[$ano]'");//SELECIONA A TABELA DE MILITARES
    $PUXAMil->execute(); //EXECUTA TABELA
   if($Mil = $PUXAMil->fetch(PDO::FETCH_ASSOC)  )
   {
    $graduacao[$ano] = $Mil['graduacao'];
   $nome_de_guerra[$ano] = $Mil['nome_de_guerra'];
    $militar[$ano] = $graduacao[$ano] . ' ' . $nome_de_guerra[$ano]; 
    
   }
   if(!isset($militar[$ano])){
    $militar[$ano] = 'Aviso';
  }
  }else{
    $militar[$ano] = 'Aviso';
  }
  
     $ano++;
   }

$hoje = date('Y-m-d');
   
   $cor = 0;
   //../gerenciamento/insertanotacao.php
?>
<style>
.animation-logo {
color: yellow;
animation: animate 2s linear infinite;
}

@keyframes animate {
0% {
  opacity: 100;
}

50% {
  opacity: 0.9;
}

100% {
  opacity: 0;
}
}
.animation-logo-red {
color: #ff0000;
animation: animate 2s linear infinite;
}

@keyframes animate {
0% {
  opacity: 100;
}

50% {
  opacity: 0.9;
}

100% {
  opacity: 0;
}
}
.branco {
  color: white;
}
</style>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($adm): $a =0;


  ?>  <li  style="overflow-y: scroll; max-height:40vh; margin-left: 5%;"><i class="fa fa-exclamation-circle " aria-hidden="true"></i><span class="hidden-xs hidden-sm" style="color: white">Anotacões</span><?php
   while($ano > $cor){ 
     if($data_agenda[$cor] == $hoje){ 
      echo '<span class="animation-logo branco" ><br><hr><div style="color:white;">⚠️ '. $titulo[$cor] . ' - '. $obs[$cor] . ' - ' . date('d/m/Y', strtotime($data_agenda[$cor])) . ' - '. $militar[$cor] .'</div>
       </span>';
     }elseif($data_agenda[$cor] < $hoje){
      echo '<span class="animation-logo-red branco" ><br><hr><div style="color:white;">⚠️ '. $titulo[$cor] . ' - '. $obs[$cor] . ' - ' . date('d/m/Y', strtotime($data_agenda[$cor])) . ' - '. $militar[$cor] .'</div>
      </span>';
     }
     else{ ?>
       <?php
         echo '<br><hr style="color: yellow;" ><div style="color:yellow;">⚠️ '. $titulo[$cor] . ' - '. $obs[$cor] . ' - ' . date('d/m/Y', strtotime($data_agenda[$cor])) . ' - '. $militar[$cor] .'</div>';  } 

   $cor++; if($cor == $ano){ echo '</a></li>'; } } 

?> <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>