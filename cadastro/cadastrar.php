
<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
      require("../conexoes/conexao.php");

        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = '../index.php'</script>";
    }
?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($adm): ?>
  <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../css/tabela_cadastro.css" rel="stylesheet">
<link href="../js/tabela_cadastro.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Cadastrar Militar</title>
 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href="../css/cadastrar.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="../js/cadastrar.js">
<body class="home">
    <div class="container-fluid display-table">
    <div style="margin-right: -15px;
    margin-left: -15px;">
            <div style="position:fixed;"  class="col-md-2 col-sm-0 hidden-xs display-table-cell v-align box" id="navigation">
                
                <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  $datahoje = date("d"); $meshoje = date('m'); ?><div class="navi">
                    <ul>
                    <li ><a href="../resumo/painel.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                            <li  ><a href="../impedimento/impedimento.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Impedimentos</span></a></li>
                            <li class="active"><a href="../cadastro/cadastrar.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cadastrar</span></a></li>
                            <li ><a href="../militar/militares.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Militares</span></a></li>
                            <li ><a href="../escala/autoescala.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Escala</span></a></li>
                            <li ><a href="../gerenciamento/gerenciamento.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gerenciamento</span></a></li>
                            <li ><a href="../acoes/logout.php"><i class="fa fa-power-off " aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sair</span></a></li>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('../gerenciamento/menunotifica.php');?>
                        </ul>
                </div>
            </div>
            </a>     <!--resolvendo bug de link  -->
            <div style="padding-left:17%;padding-top: 0px;margin-top: 0px;">
   
       
<!doctype html>
<html lang="pt-br">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
 <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}  ?>
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
        <h2>Cadastrar Miltiar</h2>
        <p class="lead">Confira os dados preenchidos.</p>
      </div>
      <form action="savecadastro.php" method="POST" class="needs-validation" novalidate>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Datas de Serviços</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Interno Preta</h6>
                <input type="date" class="form-control" name="data_ultimo_sv" value="2000-01-01" required>
              </div>
              <span class="text-muted">
               Data</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Interno Vermelha</h6>
                <input type="date" class="form-control" name="data_ultimo_sv_red" value="2000-01-01" required>
              </div>
              <span class="text-muted">
               Data</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Missão Preta</h6>
                <input type="date" class="form-control"   name="missao" value="2000-01-01" required>
              </div>
              <span class="text-muted">
               Data</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Missão Vermelha</h6>
                <input type="date" class="form-control"  name="missao_red" value="2000-01-01" required>
              </div>
              <span class="text-muted">
               Data</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Externo Preta</h6>
                <input type="date" class="form-control"  name="escada_externo" value="2000-01-01" required>
              </div>
              <span class="text-muted">
               Data</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Externo Vermelha</h6>
                <input type="date" class="form-control"  name="escada_externo_red" value="2000-01-01" required>
              </div>
              <span class="text-muted">
               Data</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Serviço Externa</h6>
                <input type="date" class="form-control"  name="externo" value="2000-01-01" required>
              </div>
              <span class="text-muted">
               Data</span>
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
                <input type="text" class="form-control" id="nome_de_guerra" name="nome_de_guerra" placeholder="Nome de Guerra" value="" required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
            </div>
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
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
         //  $nome = $curso - 1;
         ?>
            <div class="mb-3">
              <label for="Curso">Curso</label>
              <div class="input-group">
              <select class="custom-select d-block w-100" name="curso" id="pais" required>
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

            <div class="mb-3">
              <label for="endereco">CPF</label>
              <input type="text" class="form-control" name="cpf"  placeholder="Digite o CPF do militar" required>
              <div class="invalid-feedback">
              Por favor, insira um CPF válido.
              </div>
            </div>

            
            <hr class="mb-4">
                                <div class="col-md-6 mb-3">
            <h4 class="mb-3">Serviço</h4>
            <div class="custom-control custom-radio " > 
              
              <input type="radio" class="custom-control-input" value="PRETA" id="Preta" name="SERVICO" >  
              <label class="custom-control-label" for="Preta">Preta</label>         
                              </div>
                              <div class="custom-control custom-radio ">
             
              <input type="radio" class="custom-control-input" value="VERMELHA" id="Vermelha" name="SERVICO" >
              <label class="custom-control-label" for="Vermelha">Vermelha</label>
                              </div>
                              <div  class="custom-control custom-radio "> 
             
              <input type="radio" class="custom-control-input" value="AMBAS" id="Ambas" name="SERVICO" >
              <label class="custom-control-label " for="Ambas">Ambas</label>
              </div>
                              </div>
                              <div class="row">
                              <div class="col-md-6 mb-3">
                              <h4 class="mb-3">Atividade</h4>
            <div class="custom-control custom-radio " > 
              
              <input type="radio" class="custom-control-input" value="0" id="Inativo" name="atividade" >  
              <label class="custom-control-label" for="Inativo">Inativo</label>         
                              </div>
                              <div class="custom-control custom-radio ">
             
              <input type="radio" class="custom-control-input" value="1" id="Ativo" name="atividade" >
              <label class="custom-control-label" for="Ativo">Ativo</label>
                              </div>
                              

                                  </div>
                              </div>
                              
              <br>
            <hr class="mb-4">
            <h4 class="mb-3">Dias de Impedimento</h4>
            <div class="custom-control custom-checkbox ">
              <input type="checkbox" class="custom-control-input" name="dia0" value="seg-" id="Seg" >
              <label class="custom-control-label" for="Seg">Seg</label>
            </div>
            <div  class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="dia1" value="ter-" id="Ter">
              <label class="custom-control-label" for="Ter">Ter</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="dia2" value="qua-" id="Qua">
              <label class="custom-control-label" for="Qua">Qua</label>
               </div> 
              <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="dia3" value="qui-" id="Qui">
              <label class="custom-control-label" for="Qui">Qui</label>
               </div> 
              <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="dia4" value="sex-" id="Sex">
              <label class="custom-control-label" for="Sex">Sex</label>
               </div> 
              <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="dia5" value="sáb-" id="Sáb">
              <label class="custom-control-label" for="Sáb">Sáb</label>
               </div> 
              <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="dia6" value="dom-" id="Dom">
              <label class="custom-control-label" for="Dom">Dom</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" value="fer" name="dia6" class="custom-control-input" id="fer">
              <label class="custom-control-label" for="fer">Feriados</label>
            </div>
            <hr class="mb-4">

            
            <button class="btn btn-danger btn-lg btn-block" name="submit" type="submit">Confirmar Edição</button>
           
          </form>
        </div>
      </div>
                                
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Gráfica do Exército</p>
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
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = '../resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>