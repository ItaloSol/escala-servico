
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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href="../css/impedimento.css" rel="stylesheet">
<link rel="stylesheet" href="js/impedimento.js">
<link href="../css/tabela_impedimento.css" rel="stylesheet">
<style>
.direita{
        position: right;
        text-align: right;
        padding: 23px 312px 12px;
    }
    </style>
    <head>
<meta charset="utf-8">
</head>
<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
        <div style="position:fixed;"  class="col-md-2 col-sm-0 hidden-xs display-table-cell v-align box" id="navigation">
               
                <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  $datahoje = date("d"); $meshoje = date('m'); ?><div class="navi">
                    <ul>
                    <li ><a href="../resumo/painel.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                            <li class="active" ><a href="impedimento.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Impedimentos</span></a></li>
                            <li ><a href="../cadastro/cadastrar.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cadastrar</span></a></li>
                            <li ><a href="../militar/militares.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Militares</span></a></li>
                            <li ><a href="../escala/autoescala.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Escala</span></a></li>
                             <li ><a href="../gerenciamento/gerenciamento.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gerenciamento</span>
<li ><a href="../acoes/logout.php"><i class="fa fa-power-off " aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sair</span></a></li>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('../gerenciamento/menunotifica.php');?>
                                  </ul>
                </div>
            </div>
            <div style="padding-left:17%;padding-top: 0px;margin-top: 0px;">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
   
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="hidden-xs"><a href="addimpedimento.php" class="add-project" >Adicionar Impedimento</a></li>
                                    <li>
                                    <a href="acoes/logout.php" class="icon-info"><button class="btn btn-dblue btn-lg" role="button" class="submit">Sair</button></a>
                                    </li>
                                    <li class="dropdown">
                                       
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span>JS Krishna</span>
                                                    <p class="text-muted small">
                                                        me@jskrishna.com
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="#" class="view btn-sm active">Ver Perfil</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="container">
	<div class="row">
    <div class="direita">
    <b>Em Impedimento</b>
   <a href="impedimentovencido.php">
<svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
  <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
</svg></a>
</div></div></div>
                <div class="user-dashboard">
                    
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                      
<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->
<?php
include_once "../conexoes/conexaoo.php";


// echo "<hr>";
///CALCULAR QUANTOS DIAS DE HOJE SE PASSARAM

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  }
  
?>





<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<meta  charset=”UTF-8>
<div class="container">
    <div class="row" >
    
   
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Lista de Impedimentos</h3>
                  </div>
                  
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
<?php
                           include_once('../conexoes/conect.php');
                           $sql = "SELECT * FROM impedimentos i INNER JOIN militares m ON i.fk_militares = m.id INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE vencimento != 'Vencido' ORDER BY data_final ASC ";
                           $result = $conect->query($sql);
                           
                            ?>
    <div class="mdl-ce11">
    <main class="">
        
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col action account_manage">
            <body>
            <div id="content"> 
                
           
                <div id="tabelaUsuarios">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr>
                        <th >Impedimento</td>   
                        <th >Id</td>  
                        <th >Motivo</td>
                        <th >Graduação</td> 
                        <th >Militar</td>
                        <th >Data do Inicio</td>
                        <th >Data do Final</td>
                      
                        <th >Editar</td>
                        </tr>                
                    </thead>
                    <tbody>
                   
                        <?php
                        
                        while($user_data = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$user_data['impedimento_id']."</td>";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['motivo']."</td>";
                            echo "<td>".$user_data['nome_graduacao']."</td>";
                            echo "<td>".$user_data['nome_de_guerra']."</td>";
                            echo "<td>".$user_data['data_inicio']."</td>";
                            echo "<td>".$user_data['data_final']."</td>";
                       
                            echo "<td>
                            <a class='btn btn-sm btn-primary' href='editimpedimento.php?id=$user_data[impedimento_id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
</svg>
                            </a>
                            
                            <a class='btn btn-sm btn-danger' data-toggle='modal' href='deleteimpedperma.php?id=$user_data[impedimento_id]' >
                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                              </svg>
                               </a>
                              </td>";
                          echo "</tr>";
                        }

                            
                       ?>
                    </tbody>            
                </table>
                </div>               
            </div>

            </div>

</div></div></div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
<style>
    .add-projecti {
    background: #5584ff none repeat scroll 0 0;
    border-radius: 100px
;
    color: #ffffff;
    font-size: 15px;
    line-height: 1.5;
    font-weight: 600;
    padding: 9px 9px 2px 9px;
    border-radius: 5px;
    position: solid;
}
.btn-sm, .btn-group-sm>.btn {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
</style>
<?php
 
if(!empty($_GET['id'])){  
  include_once('../conexoes/conect.php');
  
  $id = $_GET['id'];
  
  $sqlSelect = "SELECT * FROM impedimentos WHERE id=$id";

  $result = $conect->query($sqlSelect);

 /* print_r($result);*/
  if($result->num_rows > 0){
    
    while($user_data = mysqli_fetch_assoc($result)){
      $id = $user_data['id'];
     
      $motivo = $user_data['motivo'];
      $data_inicio = $user_data['data_inicio'];
      $data_final = $user_data['data_final'];
      
    
    
    }
      
       
  }else{
    header('Location: impedimento.php');
  }
}

   /* 
    while($user_data = mysqli_fetch_assoc($resulti)){
      $milita = $militar;
      $atividade = $user_data['atividade'];
      $servio = $user_data['servico'];
      $folga = $user_data['folga'];
    }
  
*/
?>
 
    <form action="#.php" method="POST">
      <div id="add_project?id=$user_data[id]" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header login-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Deletar Impedimento</h4>
              </div>
             
               <div class="modal-body">
                  <input type="text" style="text-transform:uppercase" name="nome_de_guerra" id="nome_de_guerra" placeholder="Militar" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $militar ?>" required>
                  <input type="date" name="data_inicio" id="data_inicio" placeholder="Data de Início"  required>
                  <input type="date" name="data_final" id="data_final" placeholder="Data de Final" required>
                  <textarea name="motivo" id="motivo" placeholder="Motivo do impedimento"></textarea>
               </div>
              <div class="modal-footer">
                 <input type="delete" class=" add-project" name="delete"  id="delete">
              </div>
              
            </div>
        </div>
     </div>
     </form>  

    <!-- Modal -->
    
    <form action="saveimped.php" method="POST">
      <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header login-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Adicionar Impedimento</h4>
              </div>
             
               <div class="modal-body">
               Graduação:
               <label for="SOLDADO EV">
         <input type="radio" id="SOLDADO EV" name="graduacao" value="SOLDADO EV"  required>
         SOLDADO EV</label>
        <label for="SOLDADO EP">
        <input type="radio" id="SOLDADO EP" name="graduacao" value="SOLDADO EP" required>
        SOLDADO EP</label>
         <label for="CABO">
         <input type="radio" id="CABO" name="graduacao" value="CABO" required>
         CABO</label>
         <label for="SARGENTO">
         <input type="radio" id="SARGENTO" name="graduacao" value="SARGENTO" required>
         SARGENTO</label>
    
                <input type="text" style="text-transform:uppercase" name="usuario0"  id="usuario0" placeholder="Pesquisar Militar" onkeyup="carregar_usuarios(this.value)" />
                <span id="resultado_pesquisa0"></span>
                <input type="hidden" name="id_usuario0"  id="id_usuario0"/>
        </form><br><br>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script>
            $(function () {
                $("#nome_de_guerra").autocomplete({
                    source: '../proc_pesq_msg.php'
                });
            });
        </script>
                  <input type="date" name="data_inicio" id="data_inicio" placeholder="Data de Início"  >
                  <input type="date" name="data_final" id="data_final" placeholder="Data de Final" >
                  <label for="Atestado">
         <input type="radio" id="Atestado" name="motivo" value="Atestado"  >
        Atestado</label>
        <label for="Dispensa">
        <input type="radio" id="Dispensa" name="motivo" value="Dispensa">
        Dispensa</label>
         <label for="Missão">
         <input type="radio" id="Missão" name="motivo" value="Missão" >
         Missão</label>
         <label for="Ferias">
         <input type="radio" id="Ferias" name="motivo" value="Ferias" >
     Ferias</label>
    
     <br>
     
                  <textarea name="oumotivo" id="motivo" placeholder="Outros Motivos do impedimento"></textarea>
               </div>
              <div class="modal-footer">
                 <input type="submit" class="add-project" name="submit"  id="submit">
              </div>
              
            </div>
        </div>
     </div>
     </form>  
</body>
<script src="../js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

<script>window.location = '../resumo/painel.php'</script>";

<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>