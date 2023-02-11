<?php
        session_start();
        if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
            require("../conexoes/conexao.php");
            $adm  = $_SESSION["usuario"][1];
               $nome = $_SESSION["usuario"][0]; $id_desse_user = $_SESSION["usuario"][3]; $arrayexplodido = explode("0",$id_desse_user); 
        }else{
            echo "<script>window.location = '../index.php'</script>";
        }

   ?>
   <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ require "../functions/pages.php";?>
<html lang="pt-br">

<meta charset="UTF-8">
<meta http-equiv="Content-Language" content="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Escala</title>

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($adm): ?>
        <?php
     include_once('../conexoes/conecti.php');
     include_once('../acoes/conexao.php');
     include_once('../conexoes/conexaoo.php');
     include_once('../conexoes/conexao.php');
?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="../css/modals.css" rel="stylesheet">
    <link rel="stylesheet" href="../js/militares.js">
    <link href="../css/escala.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.2/dialog-polyfill.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.2.1/material.min.css'><link rel='stylesheet prefetch' href='https://code.getmdl.io/1.2.1/material.blue-light_blue.min.css'>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escala</title>

  
        <div class="container-fluid display-table">
            <div   class="row display-table-row">
                <div style="position:fixed;"  class="col-md-2 col-sm-0 hidden-xs display-table-cell v-align box" id="navigation">
                  <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  $datahoje = date("d"); $meshoje = date('m'); ?>
                    <div class="navi">
                        <ul>
                        <li ><a href="../resumo/painel.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                            <li  ><a href="../impedimento/impedimento.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Impedimentos</span></a></li>
                            <li ><a href="../cadastro/cadastrar.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cadastrar</span></a></li>
                            <li ><a href="../militar/militares.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Militares</span></a></li>
                            <li ><a href="../escala/autoescala.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Escala</span></a></li>
                             <li ><a href="../gerenciamento/gerenciamento.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gerenciamento</span>
<li ><a href="../acoes/logout.php"><i class="fa fa-power-off " aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sair</span></a></li> <li><a href="../resumo/sobre.php"><i class="fa fa-info " aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sobre</span></a></li>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('../gerenciamento/menunotifica.php');?>
                            <li class="active"><a href="resumida_escala.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Escala Resumida</span></a></li>
                        </ul>
                    </div>
                </div>
 </head>
            
             
                    <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
    <!-- SELEÇÃO !-->
 
<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->
<body>
    <div style="padding-left:17%;padding-top:0px; margin-top:0px;">
   <form  method="POST" action="resumida_escala.php">
    <label style="font-size: 20px;" >Quantos dias deseja vizualizar de Previsão?</label>
                                        <select name="Dia_Resumo">
                                    <optgroup label="Dias">
                                    <option name="Dia_Resumo" value="7">7	
                                    <option name="Dia_Resumo" value="14">14
                                    <option name="Dia_Resumo" value="21">21
                                    <option name="Dia_Resumo" value="28">28
                                    <option name="Dia_Resumo" value="30">30
                                    <option name="Dia_Resumo" value="31">31
                                    <option name="Dia_Resumo" value="35">35
                                    
                                    </select> 
                                    <input class="btn btn-dblue btn-lg btn-primary" type="submit" name="Resumo">
        </form>
    </div>
</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 <script src="../js/custom.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <script src="../js/modals.js"></script>
  	
  
   
     </html>
     <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = '../resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>