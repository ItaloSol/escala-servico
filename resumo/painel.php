<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
session_start();
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("../conexoes/conexao.php");
    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
    $id_desse_user = $_SESSION["usuario"][3];
    
} else {
    echo "<script>window.location = '../index.php'</script>";
}

?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ require "../functions/pages.php"; // include_once('../gerenciamento/escalafantasma.php');
?>
<html lang="pt-br">
<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" />
<meta charset="UTF-8">
<meta http-equiv="Content-Language" content="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Escala</title>


<?php
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../impedimento/atualizando.php');
include_once('exibedados.php');
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link href="../css/modals.css" rel="stylesheet">
<link rel="stylesheet" href="../js/militares.js">
<link href="../css/escalazero.css" rel="stylesheet">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.2/dialog-polyfill.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.2.1/material.min.css'>
<link rel='stylesheet prefetch' href='https://code.getmdl.io/1.2.1/material.blue-light_blue.min.css'>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escala</title>


    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div style="position:fixed; background-color: #17191a;" class="col-md-2 col-sm-0 hidden-xs display-table-cell v-align box" id="navigation">
                <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ $datahoje = date("d");
                $meshoje = date('m'); ?>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="../resumo/painel.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm) : ?> <li><a href="../impedimento/impedimento.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Impedimentos</span></a></li>
                            <li><a href="../cadastro/cadastrar.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cadastrar</span></a></li>
                            <li><a href="../militar/militares.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Militares</span></a></li><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
                        <li><a href="../escala/autoescala.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Escala</span></a></li>
                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm) : ?> <li><a href="../gerenciamento/gerenciamento.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gerenciamento</span></a></li><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
                        <li><a href="../acoes/logout.php"><i class="fa fa-power-off " aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sair</span></a></li>
                        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('../gerenciamento/menunotifica.php'); ?><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm) : ?>
                    </ul> <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
                </div>
            </div>

            <!--<button type="button" class="slide-toggle">Slide Toggle</button> !--->
            <div class="row">

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
                    <div class="search hidden-xs hidden-sm">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="header-rightside">

                        <ul class="list-inline header-top pull-right">
                            <a href="../acoes/logout.php" class="icon-info"><button class="btn btn-dblue btn-lg" role="button" class="submit">Sair</button></a>
                            <li class="dropdown">

                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="navbar-content">

                                            <p class="text-muted small">

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

            </div>
            <style>
                .chosen-container {
                    width: 200px !important;
                }

                .selectom .chosen-container {
                    width: 100% !important;
                }

                .dataTables_wrapper {
                    margin-top: 0px !important;
                }

                .ui-datepicker-inline.ui-datepicker.ui-widget.ui-widget-content.ui-helper-clearfix.ui-corner-all {
                    width: 100%;
                }

                .tdnomemilitar div,
                .tdnomemilitar a {
                    font-size: smaller !important;
                }

                .tdsgte {
                    padding: 2px !important;
                    padding-top: 0px !important;
                    padding-bottom: 0px !important;
                    vertical-align: inherit !important;
                    line-height: 9px !important
                }

                .only-print {
                    display: none;
                }

                .datepicker,
                .datepicker a {
                    font-size: x-small !important;
                }

                .chosen-container {
                    text-shadow: 0 0 black !important;
                }

                @media print {
                    @page {
                        margin: 0.5cm !important;
                        size: portrait !important;
                    }

                    * {
                        background-color: transparent !important;
                    }

                    .only-print {
                        display: block !important;
                    }

                    .no-print {
                        display: none !important;
                    }

                    .my-2.p-0,
                    .card-header,
                    .card-body {
                        padding: 0px !important;
                    }

                    .my-2.p-0 {
                        margin-top: -70px !important;
                    }

                    .dataTables_wrapper {
                        margin-top: 0px !important;
                    }

                    .card-body {
                        padding: 0px !important;
                    }

                    .d-none {
                        display: none !important;
                    }

                    .col-md-8 {
                        max-width: 100% !important;
                        width: 100% !important;
                    }

                    img {
                        margin-top: -70px !important;
                    }

                    .tdnomemilitar * {
                        text-align: center !important;
                    }

                    a {
                        text-decoration: none !important;
                    }
                    .brasao {
                        background-image: url(../img/fundo_brasao.jpg);
                    }
                }
            </style>
            <div style="padding-left:17%;padding-top:0px; margin-top:0px;">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <!-- SELEÇÃO !-->

                <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" />
                <!------ Include the above in your HEAD tag ---------->

<body style="background-size: cover; background-color: #262a2d; backdrop-filter: blur(5px);" >

    <div>
        <i>

            <div style=" text-align: center; float:left;" class="col-md-1 col-xl-3">
            <div  style=" background-size: cover;background-color: #373d42;  " class="card bg-secondary text-white mb-3">
                    <div class="card-header" style="background-color: black; color:white;">
                        <strong>Escala Interna</strong>
                    </div>
                    <div style="background: rgb(0,0,0);
background: linear-gradient(180deg, rgba(0,0,0,1) 50%, rgba(255,0,0,0.7203256302521008) 100%); color:white;" class="card-body">
                        <h5 class="card-title text-white"> <span data-purecounter-start="0" data-purecounter-end=" <?= $folga_data_ultimo_sv ?>" class="purecounter" class="purecounter">0 </span> dias</h5>
                        <?= $Mostrar_Data_data_ultimo_sv ?>
                        <p class="card-text"><a style="color:white;" href="">Folga Interna Preta</a> </p>
                    
                        <h5 class="card-title text-white"> <span data-purecounter-start="0" data-purecounter-end=" <?= $folga_data_ultimo_sv_red ?>" class="purecounter" class="purecounter">0 </span> dias</h5>
                        <?= $Mostrar_Data_data_ultimo_sv_red ?>
                        <p class="card-text"><a style="color:white;" href="">Folga Interna Vermelha</a> </p>
                    </div>
                </div>
            </div>



            <div style="text-align: center; float:left;" class="col-md-1 col-xl-3">
                <div  style=" background-size: cover;background-color: #373d42;  " class="card bg-secondary text-white mb-3">
                    <div class="card-header" style="background-color: black; color:white;">
                        <strong>Externa Gerida Pela OM</strong>
                    </div>
                    <div style="background: rgb(0,0,0);
background: linear-gradient(180deg, rgba(0,0,0,1) 50%, rgba(255,0,0,0.7203256302521008) 100%); color:white;" class="card-body">
                        <h5 class="card-title text-white"> <span data-purecounter-start="0" data-purecounter-end=" <?= $folga_escalado_externo ?>" class="purecounter" class="purecounter">0 </span> dias</h5>
                        <?= $Mostrar_Data_escalado_externo ?>
                        <p class="card-text"><a style="color:white;" href="">Folga Externa Preta</a> </p>
                   
                        <h5 class="card-title text-white"> <span data-purecounter-start="0" data-purecounter-end=" <?= $folga_escalado_externo_red ?>" class="purecounter" class="purecounter">0 </span> dias</h5>
                        <?= $Mostrar_Data_escalado_externo_red ?>
                        <p class="card-text"><a style="color:white;" href="">Folga Externa Vermelha</a> </p>
                    </div>
                </div>
            </div>


            <div style="text-align: center; float:left;" class="col-md-1 col-xl-3">
                <div  style=" background-size: cover;background-color: #373d42;  " class="card bg-secondary text-white mb-3">
                    <div class="card-header" style="background-color: black; color:white;">
                        <strong>Escala Missão</strong>
                    </div>
                    <div style="background: rgb(0,0,0);
background: linear-gradient(180deg, rgba(0,0,0,1) 50%, rgba(255,0,0,0.7203256302521008) 100%); color:white;" class="card-body">
                        <h5 class="card-title text-white"> <span data-purecounter-start="0" data-purecounter-end=" <?= $folga_missao ?>" class="purecounter" class="purecounter">0 </span> dias</h5>
                        <?= $Mostrar_Data_missao ?>
                        <p class="card-text"><a style="color:white;" href="">Folga Missão Preta</a> </p>
                    
                        <h5 class="card-title text-white"> <span data-purecounter-start="0" data-purecounter-end=" <?= $folga_missao_red ?>" class="purecounter" class="purecounter">0 </span> dias</h5>
                        <?= $Mostrar_Data_missao_red ?>
                        <p class="card-text"><a style="color:white;" href="">Folga Missão Vermelha</a> </p>
                    </div>
                </div>
            </div>

            <div style="text-align: center; float:left;" class="col-md-1 col-xl-3">
                <div  style=" background-size: cover;background-color: #373d42;  " class="card bg-secondary text-white mb-3">
                    <div class="card-header" style="background-color: black; color:white; background: rgb(0,0,0);
background: linear-gradient(180deg, rgba(0,0,0,1) 50%, rgba(255,0,0,0.7203256302521008) 100%); color:white;">
                    
                        <strong>Não Gerida Pela OM</strong>
                   
                        <br><br><br><br><br>
                        
                        <h5 class="card-title text-white"> <span data-purecounter-start="0" data-purecounter-end=" <?= $folga_externa_d ?>" class="purecounter" class="purecounter">0 </span> dias</h5>
                        <!-- <p class="card-text"><a style="color:white;" href="">Folga Externa Preta</a> </p> -->

                   

                    
                        <?= $Mostrar_Data_externa_d ?>
                        <p class="card-text"><a style="color:white;" href="">Folga Externa</a> </p>
                        <br><br>
                    </div>
                </div>
            </div>


        </i>
    </div>
    <hr style="clear: both; height:10px;">
 
    <hr style="clear: both; height:10px;">
    <div>
        <h3 style="text-align: center; color: white; clear:both;">Escala de Serviço</h3>
    </div>

    <hr>
    <div  class="brasao col-md-12">

        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('exibedados.php'); ?>

        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('codego_resumo.php'); ?>
    </div>
</body>
<script>
    new PureCounter();
</script>
<script>
    // import PureCounter from "@srexi/purecounterjs";
    const pure = new PureCounter();

    new PureCounter();

    // Or you can customize it for override the default config.
    // Here is the default configuration for all element with class 'filesizecount'
    new PureCounter({
        // Setting that can't' be overriden on pre-element
        selector: ".purecounter", // HTML query selector for spesific element

        // Settings that can be overridden on per-element basis, by `data-purecounter-*` attributes:
        start: 0, // Starting number [uint]
        end: 100, // End number [uint]
        duration: 2, // The time in seconds for the animation to complete [seconds]
        delay: 10, // The delay between each iteration (the default of 10 will produce 100 fps) [miliseconds]
        once: true, // Counting at once or recount when the element in view [boolean]
        pulse: false, // Repeat count for certain time [boolean:false|seconds]
        decimals: 0, // How many decimal places to show. [uint]
        legacy: true, // If this is true it will use the scroll event listener on browsers
        filesizing: false, // This will enable/disable File Size format [boolean]
        currency: false, // This will enable/disable Currency format. Use it for set the symbol too [boolean|char|string]
        formater: "us-US", // Number toLocaleString locale/formater, by default is "en-US" [string|boolean:false]
        separator: false, // This will enable/disable comma separator for thousands. Use it for set the symbol too [boolean|char|string]
    });
</script>
<!-- Final do Import dos Contadores em JavaScript -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="../js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../js/modals.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>



</html>