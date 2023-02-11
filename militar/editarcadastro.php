<?php
        session_start();
        if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
          require("../conexoes/conexao.php");
          $adm  = $_SESSION["usuario"][1];
          $nome = $_SESSION["usuario"][0];
          $id_desse_user = $_SESSION["usuario"][3];
          }else{
          echo "<script>window.location = '../index.php'</script>";
          }
          include_once('../conexoes/conect.php');
          include_once('../conexoes/conecti.php');
          include_once('../acoes/conexao.php');
          include_once('../conexoes/conexaoo.php');
          include_once('../conexoes/conexao.php');
        if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
            require("../conexoes/conexao.php");

            $adm  = $_SESSION["usuario"][1];
               $nome = $_SESSION["usuario"][0]; $id_desse_user = $_SESSION["usuario"][3]; $arrayexplodido = explode("0",$id_desse_user); 
        }else{
            echo "<script>window.location = '../index.php'</script>";
        }
    ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($adm): ?>
        <?php
 
if(!empty($_GET['id'])){  
  include_once('../conexoes/conect.php');
  
  $id = $_GET['id'];
  
  $sqlSelect = "SELECT * FROM militares m INNER JOIN cursos c ON m.fk_cursos = c.id_curso INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id=$id";

  $result = $conect->query($sqlSelect);

  /*print_r($result);*/
  if($result->num_rows > 0){
    
    while($user_data = mysqli_fetch_assoc($result)){
      $id_militar = $id;
      $nome_de_guerra = $user_data['nome_de_guerra'];
      $data_ultimo_sv_red = $user_data['data_ultimo_sv_red'];
      $graduacao = $user_data['graduacao'];
      $antiguidade = $user_data['antiguidade'];
      $missao = $user_data['missao'];
      $missao_red = $user_data['missao_red'];
      $data_ultimo_sv = $user_data['data_ultimo_sv'];
      $servico = $user_data['servico'];
      $escalado_externo = $user_data['escalado_externo'];
      $cpf = $user_data['cpf'];
      $externo = $user_data['externo'];
      $curso = $user_data['fk_cursos'];
      $data_de_sv = $user_data['data_de_sv'];
      $missaored = $user_data['missao_red'];
      $escalado_externo_red = $user_data['escalado_externo_red'];
      $atividade = $user_data['atividade'];
      $cpf = $user_data['cpf'];
      $nome_curso = $user_data['nome_curso'];
      $nome_graduacao = $user_data['nome_graduacao'];





      $dias =  explode('-', $data_de_sv) ;
    }
   
  }else{
  }
  $Datas_Postos = [ 
    'data_ultimo_sv_red' => $data_ultimo_sv_red,
    'misssao' => $missao,
    'missao_red' => $missao_red,
    'data_ultimo_sv' => $data_ultimo_sv,
    'escalado_Externo' => $escalado_externo,
    'externo' => $externo,
    'escalado_externo_red' => $escalado_externo_red
  ];
  $Nome_Folgas = [ 
    '1' => 'data_ultimo_sv',
    '2' => 'data_ultimo_sv_red',
    '3' => 'missao',
    '4' => 'missao_red',
    '5' => 'escalado_externo',
    '6' => 'escalado_externo_red',
    '7' => 'externo'
  ];

  $numero = count($Datas_Postos);
  $a = 1;$i = 1;
  while($a <= $numero){ 
    
    if($Nome_Folgas[$a] == 'externo'){
      $query_sd_Curso = $conexao->prepare("SELECT * FROM externa e INNER JOIN posto p ON e.fk_posto = p.id_posto WHERE p.tipo_folga = '$Nome_Folgas[$a]' AND e.fk_militar = '$id_militar' ORDER BY e.id_externa DESC limit 1"); 
      $query_sd_Curso->execute(); 
      
       while($linha = $query_sd_Curso->fetch(PDO::FETCH_ASSOC)) {
          $nome_posto = $linha['nome_posto'];
          $data_sv = $linha['data'];
          $tipo_posto = $linha['tipo_folga'];
         
          $Anome_posto[$a] = $nome_posto;
          $Adata_sv[$a] = $data_sv;
          $Atipo_posto[$a] = $tipo_posto;
       }
    }else{
      $query_sd_Curso = $conexao->prepare("SELECT * FROM escala e INNER JOIN posto p ON e.fk_posto = p.id_posto WHERE p.tipo_folga = '$Nome_Folgas[$a]' AND e.fk_militar = '$id_militar' ORDER BY e.id_escala DESC limit 1"); 
      $query_sd_Curso->execute(); 
      
       while($linha = $query_sd_Curso->fetch(PDO::FETCH_ASSOC)) {
          $nome_posto = $linha['nome_posto'];
          $data_sv = $linha['data'];
          $tipo_posto = $linha['tipo_folga'];
         
          $Anome_posto[$a] = $nome_posto;
          $Adata_sv[$a] = $data_sv;
          $Atipo_posto[$a] = $tipo_posto;
       }
    }
 
   
   $a++;
  }
}

if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
} 
?>
<!doctype html>
<html lang="pt-br">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Editar Militar</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>Editar Miltiar</h2>
        <p class="lead">Confira os dados do militar.</p>
      </div>
      <form action="../cadastro/saveedit.php" method="POST" class="needs-validation" novalidate>
        <input type="hidden" value="<?= $id ?>" name="id">
        <input type="hidden" value="<?= $_GET['pg'] ?>" name="pg">
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Datas de Serviços</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Interno Preta</h6>
                <small class="text-muted">Posto: <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Anome_posto[1])){echo $Anome_posto[1];}else{ echo 'Ainda não tirou serviço';}  ?> </small>
                <input type="date" class="form-control" name="data_ultimo_sv" placeholder="" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Adata_sv[1])){echo $Adata_sv[1];}else{ $Adata_sv[1] = '2000-01-01'; echo '2000-01-01';}  ?>" required>
              </div>
              <span class="text-muted"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  
              $data_ultimo_sv = $Adata_sv[1];
              $dataprevista = date('Y-m-d'); // DATA PREVISTA
              $data_inicio = new DateTime($data_ultimo_sv); 
              $data_fim = new DateTime($dataprevista); 
              $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
              $folgadosd = $dateInterval->d + ($dateInterval->m * 30); echo $folgadosd; ?> Dias</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Interno Vermelha</h6>
                <small class="text-muted">Posto: <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Anome_posto[2])){echo $Anome_posto[2];}else{ echo 'Ainda não tirou serviço';}  ?></small>
                <input type="date" class="form-control" name="data_ultimo_sv_red" placeholder="" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Adata_sv[2])){echo $Adata_sv[2];}else{$Adata_sv[2] = '2000-01-01'; echo '2000-01-01';}  ?>" required>
              </div>
              <span class="text-muted"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  
              $data_ultimo_sv = $Adata_sv[2];
              $dataprevista = date('Y-m-d'); // DATA PREVISTA
              $data_inicio = new DateTime($data_ultimo_sv); 
              $data_fim = new DateTime($dataprevista); 
              $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
              $folgadosd = $dateInterval->d + ($dateInterval->m * 30); echo $folgadosd; ?> Dias</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Missão Preta</h6>
                <small class="text-muted">Posto: <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Anome_posto[3])){echo $Anome_posto[3];}else{ echo 'Ainda não tirou serviço';}  ?></small>
                <input type="date" class="form-control" name="missao" placeholder="" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Adata_sv[3])){echo $Adata_sv[3];}else{ $Adata_sv[3] = '2000-01-01'; echo '2000-01-01';}  ?>" required>
              </div>
              <span class="text-muted"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  
              $data_ultimo_sv = $Adata_sv[3];
              $dataprevista = date('Y-m-d'); // DATA PREVISTA
              $data_inicio = new DateTime($data_ultimo_sv); 
              $data_fim = new DateTime($dataprevista); 
              $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
              $folgadosd = $dateInterval->d + ($dateInterval->m * 30); echo $folgadosd; ?> Dias</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Missão Vermelha</h6>
                <small class="text-muted">Posto: <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Anome_posto[4])){echo $Anome_posto[4];}else{ echo 'Ainda não tirou serviço';}  ?></small>
                <input type="date" class="form-control" name="missao_red" placeholder="" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Adata_sv[4])){echo $Adata_sv[4];}else{ $Adata_sv[4] = '2000-01-01'; echo '2000-01-01';}  ?>" required>
              </div>
              <span class="text-muted"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  
              $data_ultimo_sv = $Adata_sv[4];
              $dataprevista = date('Y-m-d'); // DATA PREVISTA
              $data_inicio = new DateTime($data_ultimo_sv); 
              $data_fim = new DateTime($dataprevista); 
              $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
              $folgadosd = $dateInterval->d + ($dateInterval->m * 30); echo $folgadosd; ?> Dias</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Externo Preta</h6>
                <small class="text-muted">Posto: <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Anome_posto[5])){echo $Anome_posto[5];}else{ echo 'Ainda não tirou serviço';}  ?></small>
                <input type="date" class="form-control" name="escada_externo" placeholder="" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Adata_sv[5])){echo $Adata_sv[5];}else{  $Adata_sv[5] = '2000-01-01'; echo '2000-01-01';}  ?>" required>
              </div>
              <span class="text-muted"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  
              $data_ultimo_sv = $Adata_sv[5];
              $dataprevista = date('Y-m-d'); // DATA PREVISTA
              $data_inicio = new DateTime($data_ultimo_sv); 
              $data_fim = new DateTime($dataprevista); 
              $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
              $folgadosd = $dateInterval->d + ($dateInterval->m * 30); echo $folgadosd; ?> Dias</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Externo Vermelha</h6>
                <small class="text-muted">Posto: <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Anome_posto[6])){echo $Anome_posto[6];}else{ echo 'Ainda não tirou serviço';}  ?></small>
                <input type="date" class="form-control" name="escada_externo_red" placeholder="" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Adata_sv[6])){echo $Adata_sv[6];}else{ $Adata_sv[6] = '2000-01-01'; echo '2000-01-01';}  ?>" required>
              </div>
              <span class="text-muted"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  
              $data_ultimo_sv = $Adata_sv[6];
              $dataprevista = date('Y-m-d'); // DATA PREVISTA
              $data_inicio = new DateTime($data_ultimo_sv); 
              $data_fim = new DateTime($dataprevista); 
              $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
              $folgadosd = $dateInterval->d + ($dateInterval->m * 30); echo $folgadosd; ?> Dias</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Externa</h6>
                <small class="text-muted">Posto: <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Anome_posto[7])){echo $Anome_posto[7];}else{ echo 'Ainda não tirou serviço';}  ?></small>
                <input type="date" class="form-control" name="externo" placeholder="" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($Adata_sv[7])){echo $Adata_sv[7];}else{$Adata_sv[7] = '2000-01-01'; echo '2000-01-01';}  ?>" required>
              </div>
              <span class="text-muted"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  
              $data_ultimo_sv = $Adata_sv[7];
              $dataprevista = date('Y-m-d'); // DATA PREVISTA
              $data_inicio = new DateTime($data_ultimo_sv); 
              $data_fim = new DateTime($dataprevista); 
              $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
              $folgadosd = $dateInterval->d + ($dateInterval->m * 30); echo $folgadosd; ?> Dias</span>
            </li>
          </ul>

          
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Dados do Miltiar</h4>
          <?php
         $query_sd_Grad = $conexao->prepare("SELECT * FROM graduacoes order by id_graduacao asc"); 
         $query_sd_Grad->execute(); 
         $i = 0;
          while($linha = $query_sd_Grad->fetch(PDO::FETCH_ASSOC)) {
             $Grad_Externo_ = $linha['id_graduacao'];
             $Grad_Externo = $linha['nome_graduacao'];
             $Grad_Externo_ID[$i] = $Grad_Externo_;
             $Grad_Externo_Nome[$i] = $Grad_Externo;
             $i++;
          }
          $total_de_Grad = $i;
         ?>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="graduacao">Graduação</label>
                <select class="custom-select d-block w-100" name="graduacao" id="graduacao" required>
                  <option value="<?= $graduacao ?>" ><?= $nome_graduacao ?></option>
                  <?php
         $cont = 0;
         while($cont < $total_de_Grad){
            echo '<option name="graduacao" value="'.$Grad_Externo_ID[$cont].'" >'.$Grad_Externo_Nome[$cont].'</option>';
        //    echo '<input type="radio" id="'.$Grad_Externo_Nome[$cont].'" name="graduacao" value="'.$Grad_Externo_ID[$cont].'" required>';
		//   echo '<label for="'.$Grad_Externo_Nome[$cont].'">'.$Grad_Externo_Nome[$cont].'</label> <br>';
         $cont++;
         }
                     ?>
                </select>
                <div class="invalid-feedback">
                  É obrigatório inserir uma Graduação válida.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="nome_de_guerra">Nome de Guerra</label>
                <input type="text" class="form-control" id="nome_de_guerra" name="nome_de_guerra" placeholder="Inisra o nome do militar" value="<?= $nome_de_guerra ?>" required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
            </div>
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
          $query_sd_Curso = $conexao->prepare("SELECT * FROM cursos "); 
          $query_sd_Curso->execute(); 
          $i = 0;
           while($linha = $query_sd_Curso->fetch(PDO::FETCH_ASSOC)) {
              $Curso_Externo_ = $linha['id_curso'];
              $Curso_Externo = $linha['nome_curso'];
              $Curso_Externo_ID[$i] = $Curso_Externo_;
              $Curso_Externo_Nome[$i] = $Curso_Externo;
              $i++;
           }
           $total_de_cursos = $i;
           $nome = $curso - 1;
         ?>
            <div class="mb-3">
              <label for="Curso">Curso</label>
              <div class="input-group">
              <select class="custom-select d-block w-100" name="curso" id="pais" >
                  <option name="curso"  value="<?= $curso ?>" ><?= $nome_curso ?></option>
                  <?php
                            $cont = 0;
                                while($cont < $total_de_cursos){
                                echo '<option name="curso" value="'.$Curso_Externo_ID[$cont].'" >'.$Curso_Externo_Nome[$cont].'</option>';
                                $cont++;
                                }
                                            ?>
                </select>
                <div class="invalid-feedback" style="width: 100%;">
                  O Curso é obrigatório.
                </div>
              </div>
            </div>

            <!-- <div class="mb-3">
              <label for="endereco">CPF</label>
              <input type="text" class="form-control" id="endereco" name="cpf" value=" $cpf ?>" placeholder="">
              <div class="invalid-feedback">
              Por favor, insira um CPF válido.
              </div>
            </div> -->

            <div class="mb-3">
              <label for="endereco2">Antiguidade <span class="text-muted">(Opcional)</span></label>
              <input type="text" class="form-control" name="antiguidade" id="endereco2" value="<?= $antiguidade ?>" placeholder="Antiguidade do militar">
            </div>

            <hr class="mb-4"><div class="row">
                                <div class="col-md-6 mb-3">
            <h4 class="mb-3">Serviço</h4>
            <div class="custom-control custom-radio " > 
              
              <input type="radio" class="custom-control-input" value="PRETA" id="Preta" name="SERVICO" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($servico == 'PRETA') ? 'checked' : ''?> >  
              <label class="custom-control-label" for="Preta">Preta</label>         
                              </div>
                              <div class="custom-control custom-radio ">
             
              <input type="radio" class="custom-control-input" value="VERMELHA" id="Vermelha" name="SERVICO"  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($servico == 'VERMELHA') ? 'checked' : ''?> >
              <label class="custom-control-label" for="Vermelha">Vermelha</label>
                              </div>
                              <div  class="custom-control custom-radio "> 
             
              <input type="radio" class="custom-control-input" value="AMBAS" id="Ambas" name="SERVICO"  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($servico == 'AMBAS') ? 'checked' : ''?> >
              <label class="custom-control-label " for="Ambas">Ambas</label>
              </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-md-6 mb-3">
                              <h4 class="mb-3">Atividade</h4>
            <div class="custom-control custom-radio " > 
              
              <input type="radio" class="custom-control-input" value="0" id="Inativo" name="atividade" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($atividade == '0') ? 'checked' : ''?>>  
              <label class="custom-control-label" for="Inativo">Inativo</label>         
                              </div>
                              <div class="custom-control custom-radio ">
             
              <input type="radio" class="custom-control-input" value="1" id="Ativo" name="atividade" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo ($atividade == '1') ? 'checked' : ''?>>
              <label class="custom-control-label" for="Ativo">Ativo</label>
              
                              </div>
                              
                             
                                  </div>
                              </div>
                              
          
            <hr class="mb-4">
            <h4 class="mb-3">Dias de Impedimento</h4>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="seg-" name="dia0" class="custom-control-input" id="seg" <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("seg",$dias)) ? 'checked' : ''?>>
              <label class="custom-control-label" for="seg">Seg</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="ter-" name="dia1" class="custom-control-input" id="ter"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("ter",$dias)) ? 'checked' : ''?>>
              <label class="custom-control-label" for="ter">Ter</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="qua-" name="dia2" class="custom-control-input" id="qua"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("qua",$dias)) ? 'checked' : ''?>>
              <label class="custom-control-label" for="qua">Qua</label>
               </div> 
              <div class="custom-control custom-checkbox">
              <input type="checkbox" value="qui-" name="dia3" class="custom-control-input" id="qui"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("qui",$dias)) ? 'checked' : ''?>>
              <label class="custom-control-label" for="qui">Qui</label>
               </div> 
              <div class="custom-control custom-checkbox">
              <input type="checkbox" value="sex-" name="dia4" class="custom-control-input" id="sex"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("sex",$dias)) ? 'checked' : ''?>>
              <label class="custom-control-label" for="sex">Sex</label>
               </div> 
              <div class="custom-control custom-checkbox">
              <input type="checkbox" value="sáb-" name="dia5" class="custom-control-input" id="sáb"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("sáb",$dias)) ? 'checked' : ''?>>
              <label class="custom-control-label" for="sáb">Sáb</label>
               </div> 
              <div class="custom-control custom-checkbox">
              <input type="checkbox" value="dom-" name="dia6" class="custom-control-input" id="dom"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("dom",$dias)) ? 'checked' : ''?>>
              <label class="custom-control-label" for="dom">Dom</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="fer-" name="dia7" class="custom-control-input" id="fer"<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo (in_array("fer",$dias)) ? 'checked' : ''?>>
              <label class="custom-control-label" for="fer">Feriados</label>
            </div>
            
            <hr class="mb-4">

            
            <button class="btn btn-danger btn-lg btn-block" name="update" type="submit">Confirmar Edição</button>
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(!isset($_GET['pg'])){  echo   '<a href="../gerenciamento/editmilitargerencia.php" class="btn btn-primary btn-lg btn-block" >Sair da Edição</a>'; }elseif($_GET['pg'] == 'mil'){
                                echo   '<a href="../militar/militares.php" class="btn btn-primary btn-lg btn-block" >Sair da Edição</a>';
                                }elseif($_GET['pg'] == 'gen'){
                                  echo '<a href="../gerenciamento/editmilitargerencia.php" class="btn btn-primary  btn-lg btn-block" >Sair da Edição </a>';
                                  }?>
          </form>
        </div>
      </div>
                                
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy;  Exército</p>
        <ul class="list-inline">
        </ul>
      </footer>
    </div>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Exemplo de JavaScript para desativar o envio do formulário, se tiver algum campo inválido.
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Selecione todos os campos que nós queremos aplicar estilos Bootstrap de validação customizados.
          var forms = document.getElementsByClassName('needs-validation');

          // Faz um loop neles e previne envio
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = '../resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>