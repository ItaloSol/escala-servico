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
    <link href="../css/escalazero.css" rel="stylesheet">
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
                    
                </div>
 </head>
            
             
                    <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
    <!-- SELEÇÃO !-->
 
<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->
<body>
    <div style="padding-left:17%;padding-top:0px; margin-top:0px;">
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('calendario.php')//require load();?>
        <div calss="container">
        <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">

<tr>
    <th style="  text-align: center;  vertical-align: middle; ">Escala de Serviço</th>
    <th style="  text-align: center;"> <img src="../img/logo.png"><br>Gráfica do Exército </th>
    <th style="  text-align: center;">Confere com o original <br> <img src="../img/assinatura.png"><br> Escalante </th>
</tr>
</table>
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('codego_resumo.php');?>
        </div>
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