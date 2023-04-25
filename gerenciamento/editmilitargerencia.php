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
?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm) : ?>
  <link href="../css/tabela_militares" rel="stylesheet" id="bootstrap-css">
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
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  <link href="../css/editmilitargerencia.css" rel="stylesheet">

  <link rel="stylesheet" href="js/editmilitargerencia.js">
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
  <header>
    <div class="row">


    </div>

    <li>
      <a href="gerenciamento.php" class="icon-info"><button class="btn btn-dblue btn-lg" role="button" class="submit">Voltar</button></a>
    </li>

    <h2>Escolha um Militar para Editar<h2>

  </header>

  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  include_once('../conexoes/conect.php');





  ?>
  <div class="mdl-ce11">
    <main class="">

      <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col action account_manage">

          <body>
            <div id="content">


              <div id="tabelaUsuarios">
                <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
                  <thead>
                    <tr>
                      <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */
                      if (isset($_GET['Ord'])) {
                        if ($_GET['Ord'] == 'IDASC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDESC">Id <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=ADESC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GDESC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NDESC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SDESC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TDESC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPDESC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVDESC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                          $ORDEN = ' antiguidade ASC';
                        }
                        if ($_GET['Ord'] == 'AASC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDESC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=ADESC">Antiguidade             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg> </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GDESC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NDESC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SDESC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TDESC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPDESC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVDESC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                          $ORDEN = ' antiguidade ASC';
                        }
                        if ($_GET['Ord'] == 'GASC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDESC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=ADESC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GDESC">Graduacao             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg> </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NDESC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SDESC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TDESC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPDESC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVDESC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                          $ORDEN = ' graduacao ASC';
                        }
                        if ($_GET['Ord'] == 'NASC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDESC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=ADESC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GDESC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NDESC">Nome             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SDESC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TDESC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPDESC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVDESC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                          $ORDEN = ' nome_de_guerra ASC';
                        }
                        if ($_GET['Ord'] == 'SASC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDESC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=ADESC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GDESC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NDESC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SDESC">Serviço             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TDESC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPDESC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVDESC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                          $ORDEN = ' servico ASC';
                        }
                        if ($_GET['Ord'] == 'TASC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDESC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=ADESC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GDESC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NDESC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SDESC">Serviço</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TDESC">Atividade <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPDESC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVDESC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                          $ORDEN = ' atividade ASC';
                        }
                        if ($_GET['Ord'] == 'DPASC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDESC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=ADESC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GDESC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NDESC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SDESC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TDESC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPDESC">Data Preta             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVDESC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                          $ORDEN = ' data_ultimo_sv ASC';
                        }
                        if ($_GET['Ord'] == 'DVASC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDESC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=ADESC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GDESC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NDESC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SDESC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TDESC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPDESC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVDESC">Data Vermelha             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                          $ORDEN = ' data_ultimo_sv_red ASC';
                        }

                        //
                        if ($_GET['Ord'] == 'IDESC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                  </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';

                          $ORDEN = ' antiguidade DESC';
                        }
                        if ($_GET['Ord'] == 'ADESC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                  </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';

                          $ORDEN = ' antiguidade DESC';
                        }
                        if ($_GET['Ord'] == 'GDESC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                  </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';

                          $ORDEN = ' graduacao DESC';
                        }
                        if ($_GET['Ord'] == 'NDESC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                  </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';

                          $ORDEN = ' nome_de_guerra DESC';
                        }
                        if ($_GET['Ord'] == 'SDESC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                  </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';

                          $ORDEN = ' servico DESC';
                        }
                        if ($_GET['Ord'] == 'TDESC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';

                          $ORDEN = ' atividade DESC';
                        }
                        if ($_GET['Ord'] == 'DPDESC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                  </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';

                          $ORDEN = ' data_ultimo_sv DESC';
                        }
                        if ($_GET['Ord'] == 'DVDESC') {
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço </a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                  </svg></a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                          echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';

                          $ORDEN = ' data_ultimo_sv_red DESC';
                        }
                      } else {

                        echo '<th align="center"> <a href="editmilitargerencia.php?Ord=IDASC">Id </a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php?Ord=AASC">Antiguidade </a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php?Ord=GASC">Graduacao </a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php?Ord=NASC">Nome </a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php?Ord=SASC">Serviço </a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php?Ord=TASC">Atividade</a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DPASC">Data Preta</a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php?Ord=DVASC">Data Vermelha</a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php">Editar Militar</a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Interno Preta/Vermelha</a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Missão Preta/Vermelha</a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Escalação Externo Preta/Vermelha</a></th>';
                        echo '<th align="center"> <a href="editmilitargerencia.php">Resetar Sem Escalação</a></th>';
                        $ORDEN = 'nome_de_guerra ASC';
                      }

                      ?>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $sql = "SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE servico != 'ESCALANTE' AND servico != 'LICENCIADO' ORDER BY $ORDEN , antiguidade DESC";
                    $result = $conect->query($sql);
                    while ($user_data = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $user_data['id'] . "</td>";
                      echo "<td>" . $user_data['antiguidade'] . "</td>";

                      echo "<td>" . $user_data['nome_graduacao'] . "</td>";
                      echo "<td>" . $user_data['nome_de_guerra'] . "</td>";

                      echo "<td>" . $user_data['servico'] . "</td>";

                      echo "<td>" . $user_data['atividade'] . "</td>";

                      $data_ultimo_sv = $user_data['data_ultimo_sv']; // INCLUI A DATA DO ULTIMO SERVIÇO A $data_ultimo_sv
                      $dataprevista = date('Y-m-d'); // DATA PREVISTA
                      $data_inicio = new DateTime($data_ultimo_sv); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
                      $data_fim = new DateTime($dataprevista); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
                      // Resgata diferença entre as datas
                      $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
                      $folgadosd = $dateInterval->d + ($dateInterval->m * 30); // CONVERTE PARA DATA Y-M-D
                      // echo  $folgadosd ."<br>"; //MOSTRA FOLGA
                      // echo"<td align='center'>". $folgadosd . "</td>";
                      echo "<td align='center'>" . date('d/m/Y', strtotime($user_data['data_ultimo_sv'])) . ' - ' . $folgadosd . "D </td>";
                      $data_ultimo_sv_red = $user_data['data_ultimo_sv_red']; // INCLUI A DATA DO ULTIMO SERVIÇO A $data_ultimo_sv_red
                      $dataprevista = date('Y-m-d'); // DATA PREVISTA
                      $data_inicio = new DateTime($data_ultimo_sv_red); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
                      $data_fim = new DateTime($dataprevista); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
                      // Resgata diferença entre as datas
                      $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
                      $folgadosdred = $dateInterval->d + ($dateInterval->m * 30); // CONVERTE PARA DATA Y-M-D
                      // echo  $folgadosd ."<br>"; //MOSTRA FOLGA
                      // echo"<td align='center'>". $folgadosdred . "</td>"; 
                      echo "<td align='center'>" . date('d/m/Y', strtotime($user_data['data_ultimo_sv_red'])) . ' - ' . $folgadosdred . "D</td>";
                      echo "<td>
                            <a class='btn btn-sm btn-primary' href='../militar/editarcadastro.php?id=$user_data[id]&pg=gen'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                            </svg> </a> </td>";
                      echo "<td>
                            <a class='btn btn-sm btn-dark' href='resetaservico.php?id=$user_data[id]&tipo=data_ultimo_sv&mod=PRETA'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark-plus-fill' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z'/>
                            </svg></a> 
                            <a class='btn btn-sm btn-danger' href='resetaservico.php?id=$user_data[id]&tipo=data_ultimo_sv_red&mod=VERMELHA'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark-plus-fill' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z'/>
                            </svg></a> </td><td>
                            <a class='btn btn-sm btn-dark' href='resetaservico.php?id=$user_data[id]&tipo=missao&mod=PRETA'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark-plus-fill' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z'/>
                            </svg></a><a class='btn btn-sm btn-danger' href='resetaservico.php?id=$user_data[id]&tipo=missao_red&mod=VERMELHA'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark-plus-fill' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z'/>
                            </svg></a></td><td>
                            <a class='btn btn-sm btn-dark' href='resetaservico.php?id=$user_data[id]&tipo=escalado_externo&mod=PRETA'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark-plus-fill' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z'/>
                            </svg></a><a class='btn btn-sm btn-danger' href='resetaservico.php?id=$user_data[id]&tipo=escalado_externo_red&mod=VERMELHA'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark-plus-fill' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z'/>
                            </svg></a></td>";
                      echo "<td>
                            <a class='btn btn-sm btn-dark' href='resetaservico.php?id=$user_data[id]&tipo=externo&mod=PRETA'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark-plus-fill' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z'/>
                            </svg></a> ";
                      echo "
                          </tr>";
                    }


                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
          <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if ($adm != 1) : ?>

            <script>
              window.location = '../resumo/painel.php'
            </script>";

          <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>