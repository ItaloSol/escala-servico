<?php
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
///CALCULAR QUANTOS DIAS DE HOJE SE PASSARAM
$query_impedimento = $conexao->prepare("SELECT * FROM impedimentos WHERE vencimento != 'VENCIDO'  ORDER BY data_final DESC ");//SELECIONA A TABELA DE MILITARES
$query_impedimento->execute(); //EXECUTA TABELA

                         
                         
while($impedimento = $query_impedimento->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
  $data_inicio = $impedimento['data_inicio'];
   $data_final = $impedimento['data_final']; // INCLUI A DATA DO ULTIMO SERVIÇO A $data_final
  $vencimento = $impedimento['vencimento'];
     $id = $impedimento['impedimento_id'];
     $idmil = $impedimento['fk_militares'];
     $tipo_impedimento = $impedimento['semana'];
  
  $hoje = date('Y-m-d');
 
 //// echo 'Data de Hoje => '. $hoje .' - Data Final =><b> '. $data_final .'</b><br>' ;
  if($tipo_impedimento == 'AMBAS'){ 
  if($hoje < $data_final){
  // echo ' Impedir militar '.$idmil .'<br>';
  // echo ' Data final <b> MAIOR </b> IMPEDIDO => '.$id .' <= <br>';  
   $updateaguardando = $conexao->prepare("UPDATE impedimentos SET vencimento = 'IMPEDIDO' WHERE impedimento_id = '$id'");
   $updateaguardando->execute(); 
   $updateinativo = $conexao->prepare("UPDATE militares SET atividade = '0' WHERE id = $idmil");
   $updateinativo->execute(); 
      
   // echo "<b>Data final ".$data_final." é maior que hoje".date($hoje)."</b>". $id ."<br>";
  }
  
  if($hoje > $data_final){
   // echo ' Data Final <b> => MENOR <= </b>'. $data_final . ' '.$idmil .' VENCIDO <br>';
    $updateaguardando = $conexao->prepare("UPDATE impedimentos SET vencimento = 'VENCIDO' WHERE impedimento_id = '$id'");
    $updateaguardando->execute(); 
    $updateinativo = $conexao->prepare("UPDATE militares SET atividade = '1', servico = 'AMBAS' WHERE id = $idmil");
    $updateinativo->execute();
  }

  }
  if($tipo_impedimento == 'PRETA'){ 
    if($hoje < $data_final){
      // echo ' Impedir militar '.$idmil .'<br>';
      // echo ' Data final <b> MAIOR </b> IMPEDIDO => '.$id .' <= <br>';  
       $updateaguardando = $conexao->prepare("UPDATE impedimentos SET vencimento = 'IMPEDIDO' WHERE impedimento_id = '$id'");
       $updateaguardando->execute(); 
       $updateinativo = $conexao->prepare("UPDATE militares SET servico = 'VERMELHA' WHERE id = $idmil");
       $updateinativo->execute(); 
          
       // echo "<b>Data final ".$data_final." é maior que hoje".date($hoje)."</b>". $id ."<br>";
      }
      
      if($hoje > $data_final){
       // echo ' Data Final <b> => MENOR <= </b>'. $data_final . ' '.$idmil .' VENCIDO <br>';
        $updateaguardando = $conexao->prepare("UPDATE impedimentos SET vencimento = 'VENCIDO' WHERE impedimento_id = '$id'");
        $updateaguardando->execute(); 
        $updateinativo = $conexao->prepare("UPDATE militares SET servico = 'AMBAS', servico = 'AMBAS' WHERE id = $idmil");
        $updateinativo->execute();
      }
  }
  if($tipo_impedimento == 'VERMELHA'){ 
    if($hoje < $data_final){
      // echo ' Impedir militar '.$idmil .'<br>';
      // echo ' Data final <b> MAIOR </b> IMPEDIDO => '.$id .' <= <br>';  
       $updateaguardando = $conexao->prepare("UPDATE impedimentos SET vencimento = 'IMPEDIDO' WHERE impedimento_id = '$id'");
       $updateaguardando->execute(); 
       $updateinativo = $conexao->prepare("UPDATE militares SET servico = 'PRETA' WHERE id = $idmil");
       $updateinativo->execute(); 
          
       // echo "<b>Data final ".$data_final." é maior que hoje".date($hoje)."</b>". $id ."<br>";
      }
      
      if($hoje > $data_final){
       // echo ' Data Final <b> => MENOR <= </b>'. $data_final . ' '.$idmil .' VENCIDO <br>';
        $updateaguardando = $conexao->prepare("UPDATE impedimentos SET vencimento = 'VENCIDO' WHERE impedimento_id = '$id'");
        $updateaguardando->execute(); 
        $updateinativo = $conexao->prepare("UPDATE militares SET servico = 'AMBAS', servico = 'AMBAS' WHERE id = $idmil");
        $updateinativo->execute();
      }
  }

 
  if($data_inicio > $hoje){
  $updateativoinicio = $conexao->prepare("UPDATE militares SET atividade = '1' WHERE id = '$idmil'");
     $updateativoinicio->execute(); 

     $updateaaguardando = $conexao->prepare("UPDATE impedimentos SET vencimento = 'AGUARDANDO' WHERE impedimento_id = '$id'");
     $updateaaguardando->execute();
  
// //// echo "Não começou Data inico ".$inicio." é maior que hoje".date($hoje)."<br>";
  }


} 