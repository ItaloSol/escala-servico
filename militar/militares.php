<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("../conexoes/conexao.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
    $id_desse_user = $_SESSION["usuario"][3];
    $arrayexplodido = explode("0", $id_desse_user);
} else {
    echo "<script>window.location = '../index.php'</script>";
}

include_once('../dados/contagem.php');
?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm) : ?>

    <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" />
    <link href="../css/tabela_militares" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" />
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="../css/militares.css" rel="stylesheet">

    <link rel="stylesheet" href="../js/militares.js">

    <body class="home">
        <div class="container-fluid display-table">
            <div class="row display-table-row">
                <div style="position:fixed;" class="col-md-2 col-sm-0 hidden-xs display-table-cell v-align box" id="navigation">

                    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ $datahoje = date("d");
                    $meshoje = date('m'); ?><div class="navi">
                        <ul>
                            li ><a href="../resumo/painel.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                            <li><a href="../impedimento/impedimento.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Impedimentos</span></a></li>
                            <li><a href="../cadastro/cadastrar.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cadastrar</span></a></li>
                            <li class="active"><a href="militares.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Militares</span></a></li>
                            <li><a href="../escala/autoescala.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Escala</span></a></li>
                            <li><a href="../gerenciamento/gerenciamento.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gerenciamento</span>
                            <li><a href="../acoes/logout.php"><i class="fa fa-power-off " aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sair</span></a></li>
                            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('../gerenciamento/menunotifica.php'); ?>
                            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('../gerenciamento/menunotifica.php'); ?>
                        </ul>
                    </div>
                </div>
                <div class="">
                    <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->

                    <header>

                        <head>
                            <meta charset="utf-8">
                            <div class="row">
                                <div class="col-md-7">

                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>

                                    <div class="search hidden-xs hidden-sm">
                                        <!-- <input type="text" style="text-transform:uppercase" placeholder="Pesquisar" id="search"> -->
                                    </div>
                                </div>

                            </div>
                    </header>
                    <?php
                    function dias($data)
                    {
                        $dataprevista = date('Y-m-d'); // DATA PREVISTA
                        $data_inicio = new DateTime($data); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
                        $data_fim = new DateTime($dataprevista); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
                        // Resgata diferença entre as datas
                        $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
                        $folgadosd = $dateInterval->d + ($dateInterval->m * 30); // CONVERTE PARA DATA Y-M-D
                        return "<td align='center'>" . date('d/m/Y', strtotime($data)) . ' - ' . $folgadosd . "D </td>";
                    }
                    ?>


                    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
                    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.2/dialog-polyfill.min.css'>
                    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.2.1/material.min.css'>
                    <link rel='stylesheet prefetch' href='https://code.getmdl.io/1.2.1/material.blue-light_blue.min.css'>
                    <style class="cp-pen-styles">
                        ;

                        header .mdl-layout__drawer {
                            border-right: 0;
                        }

                        header .mdl-layout__drawer .mdl-layout-title {
                            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
                        }

                        header .search input {
                            border-bottom: 0;
                        }

                        header .search label {
                            color: rgba(255, 255, 255, 0.6);
                        }


                        .sidenav {
                            background-color: #fff;
                            border-right: 0;
                        }

                        .sidenav .mdl-layout-title {
                            box-shadow: rgba(0, 0, 0, 0.13725) 0px 2px 2px 0px, rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.11765) 0px 1px 5px 0px;
                        }

                        .sidenav .mdl-navigation__link.active {
                            color: #2196F3;
                        }

                        .sidenav .mdl-navigation__link span {
                            padding-left: 16px;
                        }



                        .account_action .action {
                            cursor: pointer;
                        }

                        .account_action .inner {
                            padding: 5px 10px;
                            font-size: 20px;
                            background-color: #fff;
                        }

                        .account_action .inner .material-icons {
                            padding: 5px 10px 0px 0px;
                            font-size: 40px;
                            color: #2196F3;
                            border-right: 1px solid rgba(117, 117, 117, 0.53);
                        }

                        .account_action .inner span {
                            display: inline-block;
                            vertical-align: top;
                            padding: 14px 10px;
                            font-size: 14px;
                            color: #757575;
                        }

                        .account_manage,
                        .group_manage {
                            color: #757575;
                            overflow-x: auto;
                            background-color: #fff;
                        }

                        .account_manage table td,
                        .group_manage table td {
                            color: #000;
                        }

                        .account_manage table td.name,
                        .group_manage table td.name {
                            color: #2196F3;
                        }

                        .account_manage .title {
                            padding-bottom: 10px;
                        }

                        .account_manage #manage-user-filter {
                            float: right;
                            text-transform: capitalize;
                            background-color: #fff;
                            color: #757575;
                            box-shadow: 0 1px 0px 0 rgba(0, 0, 0, 0.14), 0 0 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
                        }

                        #action_person_dialog,
                        #action_group_dialog {
                            width: 600px;
                        }

                        #action_person_dialog .mdl-dialog__title,
                        #action_group_dialog .mdl-dialog__title {
                            color: #757575;
                        }

                        #action_person_dialog .mdl-textfield,
                        #action_group_dialog .mdl-textfield {
                            width: 100%;
                        }

                        .breadcrumbs {
                            float: right;
                            padding: 0;
                            margin: 0;
                            list-style: none;
                        }

                        .breadcrumbs>li {
                            display: inline-block;
                        }

                        .breadcrumbs>li+li:before {
                            padding: 0 5px;
                            color: #ccc;
                            content: "/ ";
                        }

                        .breadcrumbs .active {
                            font-weight: normal;
                            color: #999;
                        }

                        .buton {
                            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
                            width: 100%;
                            border: none;
                            padding: 10px;
                            color: white;
                            font-size: 10px;
                            cursor: pointer;
                            border-radius: 15px;
                        }

                        .direita {
                            position: right;
                            text-align: right;
                            padding: 15px 15px 0px;

                        }

                        .buton:hover {
                            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
                        }
                    </style>
                    </head>

                    <body>
                        <!-- Modals  -->
                        <!-- SELEÇÃO !-->
                        <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" />
                        <!------ Include the above in your HEAD tag ---------->

                        <head>
                            <meta charset="utf-8">

                            <div class="container">
                                <div class="row">
                                    <div class="direita">
                                        <!-- <b> Visualizar Militares Por: </b>
   <select  style="position: center; "class='select form-control form-control-chosen' onchange='location.href = this.value'>
   <option value="militares.php" >Nome</option>                                
   <option value="militaresgrad.php" >Graduacao</option>
                                    
                                    <option value="militaresanti.php" >Antiguidade</option>
                                    <option value="militaresfolga.php" >Folga P</option><option value="militaresfolgav.php" >Folga V</option>
                                    <option value="militaresstatus.php" >Inativo</option>
                            </select> -->
                                        <?php
                                        //    echo "<div  style='  position: center; text-align: center; font-size: 12px;'><b>ESTÁ PAGINA SÓ EXIBE OS NOMES <BR>DE MILITARES ATIVOS</b><br></div>";
                                        ?>
                                    </div>
                                    <br>
                                    <div style="font-size: 12px;   border: 5px solid rgba(234, 0, 255, 0.459);  text-align: left;">
                                        <?php
                                        echo "<div style='text-align: center;'><b>Ativos:</b><br></div>";
                                        echo "Quantidade de Sargentos : " . $Quantidade_Sgt_Ativos . '<br>';
                                        echo "Quantidade de Cabos : " . $Quantidade_Cabo_Ativos . '<br>';
                                        echo "Quantidade de Motorista : " . $Quantidade_Motora_Ativos . '<br>';
                                        echo "Quantidade de SOLDADO EP : " . $Quantidade_Ep_Ativos . '<br>';
                                        echo "Quantidade de SOLDADO EV : " . $Quantidade_Ev_Ativos . '<br>';
                                        ?>
                                    </div>
                                    <br>
                                    <div style="font-size: 12px;  border: 5px solid rgba(255, 0, 0, 0.459);  text-align: left;">
                                        <?php
                                        echo "<div style='text-align: center;'><b>Inativos:</b><br></div>";
                                        echo "Quantidade de Sargentos : " . $Quantidade_Sgt_Inativos . '<br>';
                                        echo "Quantidade de Cabos : " . $Quantidade_Cabo_Inativos . '<br>';
                                        echo "Quantidade de Motorista : " . $Quantidade_Motora_Inativos . '<br>';
                                        echo "Quantidade de SOLDADO EP : " . $Quantidade_Ep_Inativos . '<br>';
                                        echo "Quantidade de SOLDADO EV : " . $Quantidade_Ev_Inativos . '<br>';
                                        ?>
                                        <br>
                                    </div>

                                </div>
                                <!--- FIM SELEÇÃO !--->

                                <?php

                                include_once('../conexoes/conect.php');
                                $sql = "SELECT * FROM militares m INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao   WHERE atividade = 1 ORDER by graduacao DESC";
                                $result = $conect->query($sql);

                                $graduacoes = $conexao->prepare("SELECT * FROM graduacoes ORDER BY id_graduacao ASC "); //SELECIONA A TABELA DE MILITARES
                                $graduacoes->execute();
                                $qtd_grad = 0;
                                $id_graduacao = array();
                                $nome_graduacao = array();
                                while ($gradussacao = $graduacoes->fetch(PDO::FETCH_ASSOC)) {
                                    $id_graduacao[$qtd_grad] = $gradussacao['id_graduacao'];
                                    $nome_graduacao[$qtd_grad] = $gradussacao['nome_graduacao'];
                                    $qtd_grad++;
                                }

                                $cursos = $conexao->prepare("SELECT * FROM cursos ORDER BY id_curso ASC "); //SELECIONA A TABELA DE MILITARES
                                $cursos->execute();
                                $qtd_curso = 0;
                                while ($cursoussacao = $cursos->fetch(PDO::FETCH_ASSOC)) {
                                    $id_curso[$qtd_curso] = $cursoussacao['id_curso'];
                                    $nome_curso[$qtd_curso] = $cursoussacao['nome_curso'];
                                    $qtd_curso++;
                                }



                                ?>
                                <div class="mdl-ce11">
                                    <main class="">

                                        <div style="width: 180%;">
                                            <div style="overflow-x: hidden;" class="mdl-cell mdl-cell--12-col action account_manage">

                        <body>
                            <div id="content">
                                <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if (isset($_SESSION['msg'])) {
                                    echo  $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                                ?>

                                <!-- <div  > -->


                                <?php
                            $dataprevista = date('Y-m-d');
                            function diasDatas($data_inicial,$data_final) {
                                $diferenca = strtotime($data_final) - strtotime($data_inicial);
                                $dias = floor($diferenca / (60 * 60 * 24)); 
                                return $dias;
                            }
                                echo " <head>";
                                echo "<meta charset='utf8mb4_unicode_ci'>";


                                //EXECUTA TABELA

                                $l = 6;
                                $c = 1;
                                /// cima 

                                // PAR ABAIXO

                                ?>
                                <form method="POST" action="militares.php">

                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="cpf">CPF</label> <input id="cpf" name="cpf" type="radio" value='2'> |
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="fk_cursos">CURSO</label> <select id="fk_cursos" name="nome_curso" ><option value="zero">SELECIONE</option> <option value="0">Todos</option><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ $a = 0;
                                                                        while ($a < $qtd_curso) {
                                                                            echo '<option value="' . $id_curso[$a] . '">' . $nome_curso[$a] . '</option>';
                                                                            $a++;
                                                                        } ?> </select>
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="antiguidade">ANTIGUIDADE</label> <input id="antiguidade" name="antiguidade" type="radio" value='DESC'>DESC <input id="antiguidade" name="antiguidade" type="radio" value='ASC'>ASC |

                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="nome_graduacao">GRADUAÇÃO</label> <select name="nome_graduacao" id="nome_graduacao">
                                        <option value="0">Todos</option><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ $a = 0;
                                                                        while ($a < $qtd_grad) {
                                                                            echo '<option value="' . $id_graduacao[$a] . '">' . $nome_graduacao[$a] . '</option>';
                                                                            $a++;
                                                                        } ?>
                                    </select> |
                                    <input name="nome_de_guerra" id="nome_de_guerra" type="hidden" value='6'> 
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="fk_anotacao">ANOTAÇÃO</label> <input name="fk_anotacao" id="fk_anotacao" type="radio" value='7'> |
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="servico">TIPO DE SERVIÇO</label> <input name="servico" id="servico" type="radio" value='8'> |
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="data_de_sv">IMPEDIMENTO DIARIO</label> <input name="data_de_sv" id="data_de_sv" type="radio" value='9'> |
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="atividade">ATIVIDADE</label> <input name="atividade" id="atividade" type="radio" value='DESC'> DESC <input name="atividade" id="atividade" type="radio" value='ASC'>ASC |
                               
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="fk_impedimento">IMPEDIMENTO</label> <input name="fk_impedimento" id="fk_impedimento" type="radio" value='11'> |
                                    <br>
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="data_ultimo_sv">SERVIÇO INTERNO PRETA</label> <input name="data_ultimo_sv" id="data_ultimo_sv" type="radio" value='DESC'>DESC <input name="data_ultimo_sv" id="data_ultimo_sv" type="radio" value='ASC'>ASC |
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="data_ultimo_sv_red">SERVIÇO INTERNO VERMELHA</label> <input name="data_ultimo_sv_red" id="data_ultimo_sv_red" type="radio" value='DESC'>DESC <input name="data_ultimo_sv_red" id="data_ultimo_sv_red" type="radio" value='ASC'>ASC |
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="externo">EXTERNO PRETA NÃO GERIDO PELA OM</label> <input name="externo" id="externo" type="radio" value='DESC'>DESC <input name="externo" id="externo" type="radio" value='ASC'>ASC  |

                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="externo_red">EXTERNO VERMELHA NÃO GERIDO PELA OM</label> <input name="externo_red" id="externo_red" type="radio" value='DESC'>DESC <input name="externo_red" id="externo_red" type="radio" value='ASC'>ASC |<br>
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="missao">MISSÃO PRETA</label> <input name="missao" id="missao" type="radio" value='DESC'>DESC <input name="missao" id="missao" type="radio" value='ASC'> ASC | 
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="missao_red">MISSÃO VERMELHA</label> <input name="missao_red" id="missao_red" type="radio" value='DESC'>DESC <input name="missao_red" id="missao_red" type="radio" value='ASC'>ASC |
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="escalado_externo">EXTERNO PRETA GERIDO PELA OM</label> <input name="escalado_externo" id="escalado_externo" type="radio" value='DESC'>DESC <input name="escalado_externo" id="escalado_externo" type="radio" value='ASC'>ASC |
                                    <label style="background-color: blue; color: white; padding: 4px; border-radius: 10px;" for="escalado_externo_red">EXTERNO VERMELHA GERIDO PELA OM</label> <input name="escalado_externo_red" id="escalado_externo_red" type="radio" value='DESC'>DESC <input name="escalado_externo_red" id="escalado_externo_red" type="radio" value='ASC'>ASC |
                                    <input type="submit" class="btn" name="filtro" value="FILTRAR">
                                </form>

                                <?php
                                    $Oerden = ' antiguidade DESC ';
                                echo '<table  class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell-12-col">';
                                if (isset($_POST['filtro'])) {
                                    $Oerden = 'ORDER BY';
                                    $campos  = 'id';
                                    $x = 0;
                                    $where_ = " m.servico != 'ESCALANTE' AND m.servico != 'LICENCIADO' ";
                                    foreach ($_POST as $VALUE => $KEY) {
                                        if ($VALUE == 'filtro') {
                                        } else {
                                           
                                            $selecionados[$x] = $VALUE;
                                            $campos = $campos . ' , ' . $VALUE;

                                            if($KEY == 'ASC' || $KEY == 'DESC'){
                                                if($Oerden != 'ORDER BY'){
                                                    $Oerden = $Oerden . ', m.'.$VALUE.' '.$KEY.'';
                                                }else{
                                                    $Oerden = $Oerden . ' m.'.$VALUE.' '.$KEY.'';
                                                }
                                            }
                                            if($KEY != 'zero'){ 
                                            if ($VALUE == 'nome_graduacao') {
                                                if ($KEY == '0') {
                                                } else {
                                                    $where_ = $where_ . " AND m.graduacao = '" . $KEY . "'";
                                                }
                                            }
                                            if ($VALUE == 'nome_curso') {
                                                if ($KEY == '0') {
                                                } else {
                                                    $where_ = $where_ . " AND m.fk_cursos = '" . $KEY . "'";
                                                }
                                            }
                                        }
                                            $x++;
                                        }
                                    }
                                    if($Oerden == 'ORDER BY'){
                                        $Oerden = '';
                                    }
                                   
                                 //  echo "SELECT $campos FROM militares m INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao INNER JOIN cursos c ON m.fk_cursos = c.id_curso  WHERE $where_ $Oerden  ";
                                    $query_data_ultimo_sv = $conexao->prepare("SELECT $campos FROM militares m INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao INNER JOIN cursos c ON m.fk_cursos = c.id_curso  WHERE m.servico != 'LICENCIADO' AND $where_  $Oerden  "); //SELECIONA A TABELA DE MILITARES
                                } else {
                                    if (isset($_GET['Ord'])) {
                                        if ($_GET['Ord'] == 'AASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg> </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CDESC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.antiguidade ASC';
                                        }
                                        if ($_GET['Ord'] == 'GASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg> </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CDESC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.graduacao ASC';
                                        }
                                        if ($_GET['Ord'] == 'CDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao              </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg> </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.fk_cursos ASC';
                                        }
                                        if ($_GET['Ord'] == 'NASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CDESC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.nome_de_guerra ASC';
                                        }
                                        if ($_GET['Ord'] == 'SASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.servico ASC';
                                        }
                                        if ($_GET['Ord'] == 'TASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.atividade ASC';
                                        }
                                        if ($_GET['Ord'] == 'IMESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade ';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.fk_impedimento ASC';
                                        }
                                        if ($_GET['Ord'] == 'DPASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CDESC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.data_ultimo_sv ASC';
                                        }
                                        if ($_GET['Ord'] == 'DVASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CDESC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.data_ultimo_sv_red ASC';
                                        }
                                        if ($_GET['Ord'] == 'DMASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CDESC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.missao ASC';
                                        }
                                        if ($_GET['Ord'] == 'DXASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=ADESC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GDESC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NDESC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SDESC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CDESC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TDESC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=IMESC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPDESC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVDESC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMDESC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXDESC">Data Externa             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                                </svg></a></th>';
                                            $ORDEN = ' m.externo ASC';
                                        }
                                        //
                                        if ($_GET['Ord'] == 'ADESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.antiguidade DESC';
                                        }
                                        if ($_GET['Ord'] == 'GDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.graduacao DESC';
                                        }
                                        if ($_GET['Ord'] == 'NDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.nome_de_guerra DESC';
                                        }
                                        if ($_GET['Ord'] == 'SDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.servico DESC';
                                        }
                                        if ($_GET['Ord'] == 'TDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.atividade DESC';
                                        }
                                        if ($_GET['Ord'] == 'AASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade ';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.fk_impedimento DESC';
                                        }
                                        if ($_GET['Ord'] == 'DPDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.data_ultimo_sv DESC';
                                        }
                                        if ($_GET['Ord'] == 'DVDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.data_ultimo_sv_red DESC';
                                        }
                                        if ($_GET['Ord'] == 'DMDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.missao DESC';
                                        }
                                        if ($_GET['Ord'] == 'DXDESC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            $ORDEN = ' m.externo DESC';
                                        }
                                        if ($_GET['Ord'] == 'CASC') {
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=CDESC">Curso <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                            </svg></a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                            echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                            echo '<th align="center"> <a>Editar</a></th>';
                                            $ORDEN = ' m.fk_cursos DESC';
                                        }
                                    } else {


                                        echo '<th align="center"> <a href="militares.php?Ord=AASC">Antiguidade </a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=GASC">Graduacao </a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=NASC">Nome </a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=SASC">Serviço </a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=CASC">Curso </a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=TASC">Atividade</a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=AASC">Impedimento</a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=DPASC">Data Preta</a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=DVASC">Data Vermelha</a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=DMASC">Data Missão</a></th>';
                                        echo '<th align="center"> <a href="militares.php?Ord=DXASC">Data Externa</a></th>';
                                        echo '<th align="center"> <a>Editar</a></th>';
                                        $ORDEN = ' m.nome_de_guerra ASC';
                                    }
                                    $query_data_ultimo_sv = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao INNER JOIN cursos c ON m.fk_cursos = c.id_curso  WHERE m.servico != 'ESCALANTE' AND m.servico != 'LICENCIADO'  ORDER BY $ORDEN , m.antiguidade DESC "); //SELECIONA A TABELA DE MILITARES
                                }
                               
                                $query_data_ultimo_sv->execute();
                                $conta = 0;
                                $il = 1;
                                if (isset($_POST['filtro'])) {

                                    while ($ultimosv = $query_data_ultimo_sv->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<tr>';
                                        if (in_array('cpf', $selecionados)) {
                                            echo "<td align='center'>" . $ultimosv['cpf'] . "</td>";
                                        }
                                        if (in_array('antiguidade', $selecionados)) {
                                            echo "<td align='center'>" . $ultimosv['antiguidade'] . "</td>";
                                        }
                                        if (in_array('nome_graduacao', $selecionados)) {
                                            echo "<td align='center'>" . $ultimosv['nome_graduacao'] . "</td>";
                                        }
                                        if (in_array('nome_de_guerra', $selecionados)) {
                                            echo "<td align='center'>" . $ultimosv['nome_de_guerra'] . "</td>";
                                        }
                                        if (in_array('servico', $selecionados)) {
                                            echo "<td align='center'>" . $ultimosv['servico'] . "</td>";
                                        }
                                        if (in_array('nome_curso', $selecionados)) {
                                            echo "<td align='center'>" . $ultimosv['nome_curso'] . "</td>";
                                        }
                                        if (in_array('atividade', $selecionados)) {
                                            if ($ultimosv['atividade'] == '1') {
                                                echo "<td align='center'>ATIVO</td>";
                                            }
                                            if ($ultimosv['atividade'] == '0') {
                                                echo "<td align='center'>INATIVO</td>";
                                            }
                                        }
                                        if (in_array('fk_impedimento', $selecionados) || in_array('data_de_sv', $selecionados)) {
                                            if (isset($ultimosv['fk_impedimento'])) {

                                                $imped = $ultimosv['fk_impedimento'];
                                                $aaa = $conexao->prepare("SELECT * FROM militares m INNER JOIN impedimentos g ON g.impedimento_id = m.fk_impedimento  WHERE g.impedimento_id = '$imped' "); //SELECIONA A TABELA DE MILITARES
                                                $aaa->execute();
                                                if ($ultimosv2 = $aaa->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<td>" . $ultimosv2['motivo'] . "</td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            } elseif (isset($ultimosv['data_de_sv'])) {
                                                echo "<td>" . $ultimosv['data_de_sv'] . "</td>";
                                            } else {
                                                echo "<td></td>";
                                            }
                                        }

                                        if (in_array('data_ultimo_sv', $selecionados)) {
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['data_ultimo_sv'])) . ' - ' . diasDatas($ultimosv['data_ultimo_sv'], $dataprevista) . "D </td>" ;
                                        }
                                        if (in_array('data_ultimo_sv_red', $selecionados)) {
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['data_ultimo_sv_red'])) . ' - ' . diasDatas($ultimosv['data_ultimo_sv_red'], $dataprevista) . "D </td>" ;
                                        }
                                        if (in_array('externo', $selecionados)) {
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['externo'])) . ' - ' . diasDatas($ultimosv['externo'], $dataprevista) . "D </td>" ;
                                        }
                                        if (in_array('externo_red', $selecionados)) {
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['externo_red'])) . ' - ' . diasDatas($ultimosv['externo_red'], $dataprevista) . "D </td>" ;
                                        }
                                        if (in_array('missao', $selecionados)) {
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['missao'])) . ' - ' . diasDatas($ultimosv['missao'], $dataprevista) . "D </td>" ;
                                        }
                                        if (in_array('missao_red', $selecionados)) {
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['missao_red'])) . ' - ' . diasDatas($ultimosv['missao_red'], $dataprevista) . "D </td>" ;
                                        }
                                        if (in_array('escalado_externo', $selecionados)) {
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['escalado_externo'])) . ' - ' . diasDatas($ultimosv['escalado_externo'], $dataprevista) . "D </td>" ;
                                        }
                                        if (in_array('escalado_externo_red', $selecionados)) {
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['escalado_externo_red'])) . ' - ' . diasDatas($ultimosv['escalado_externo_red'], $dataprevista) . "D </td>" ;
                                        }
                                        echo "<td><a class='btn btn-sm btn-primary' href='editarcadastro.php?id=$ultimosv[id]&pg=mil'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
            </svg>
                                        </a>
                                        </td>";
                                        echo '</tr>';
                                        $conta++;
                                    }
                                   if($conta == 0){
                                    echo "<td align='center'>NÃO EXISTE NENHUM RESULTADO</td>";
                                   } 
                                } else {

                                    while ($il <= $l = $ultimosv = $query_data_ultimo_sv->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        $ic = 1;
                                        while ($ic <= $c) {
                                            echo "<td align='center'>" . $ultimosv['antiguidade'] . "</td>";
                                            echo "<td align='center'>" . $ultimosv['nome_graduacao'] . "</td>";
                                            echo "<td align='center'>" . $ultimosv['nome_de_guerra'] . "</td>";
                                            echo "<td align='center'>" . $ultimosv['servico'] . "</td>";
                                            echo "<td align='center'>" . $ultimosv['nome_curso'] . "</td>";
                                            if ($ultimosv['atividade'] == '1') {
                                                echo "<td align='center'>ATIVO</td>";
                                            }
                                            if ($ultimosv['atividade'] == '0') {
                                                echo "<td align='center'>INATIVO</td>";
                                            }
                                            if (isset($ultimosv['fk_impedimento'])) {

                                                $imped = $ultimosv['fk_impedimento'];
                                                $aaa = $conexao->prepare("SELECT * FROM militares m INNER JOIN impedimentos g ON g.impedimento_id = m.fk_impedimento  WHERE g.impedimento_id = '$imped' "); //SELECIONA A TABELA DE MILITARES
                                                $aaa->execute();
                                                if ($ultimosv2 = $aaa->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<td>" . $ultimosv2['motivo'] . "</td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            } elseif (isset($ultimosv['data_de_sv'])) {
                                                echo "<td>" . $ultimosv['data_de_sv'] . "</td>";
                                            } else {
                                                echo "<td></td>";
                                            }
                                           
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['data_ultimo_sv'])) . ' - ' . diasDatas($ultimosv['data_ultimo_sv'], $dataprevista) . "D </td>";
                                           
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['data_ultimo_sv_red'])) . ' - ' .diasDatas($ultimosv['data_ultimo_sv_red'], $dataprevista) . "D</td>";
                                          
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['missao'])) . ' - ' .diasDatas($ultimosv['missao'], $dataprevista) . "D</td>";
                                           
                                            echo "<td align='center'>" . date('d/m/Y', strtotime($ultimosv['externo'])) . ' - ' .diasDatas($ultimosv['externo'], $dataprevista) . "D</td>";
                                            echo "<td align='center'>
                                        <a class='btn btn-sm btn-primary' href='editarcadastro.php?id=$ultimosv[id]&pg=mil'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
            </svg>
                                        </a>
                                        </td>";

                                            $ic++;
                                        }

                                        echo "</tr>";
                                        $il = $il + 1;
                                    }
                                }
                                echo "</head>";
                                echo "</table>";

                                ?>

                            </div>
                </div>

                <!--- TESTE !--->
                <link rel="stylesheet" type="text/css" href="style/dashboard.css" />

                <!--- TESTE !--->




    </body>
    </div>
    </div>

    </div>
    </div>
    </main>
    </div>



    </div>
    </div>

    </div>
    </head>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="../js/personalizado.js"></script>


    </body>

<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm != 1) : ?>

    <script>
        window.location = '../resumo/painel.php'
    </script>";

<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>