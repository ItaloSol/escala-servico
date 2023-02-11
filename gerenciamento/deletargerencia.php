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
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($adm): ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    
    <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="../css/militares.css" rel="stylesheet">
  
    <link rel="stylesheet" href="../js/militares.js">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.2/dialog-polyfill.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.2.1/material.min.css'><link rel='stylesheet prefetch' href='https://code.getmdl.io/1.2.1/material.blue-light_blue.min.css'>
    <style class="cp-pen-styles">;
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

    .breadcrumbs > li {
    display: inline-block;
    }

    .breadcrumbs > li + li:before {
    padding: 0 5px;
    color: #ccc;
    content: "/ ";
    } 

    .breadcrumbs .active {
    font-weight: normal;
    color: #999;
    }
    .buton{
      background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
      width: 100%;
      border: none;
      padding: 10px;
      color: white;
      font-size: 10px;
      cursor: pointer;
      border-radius: 15px;
    }
    .direita{
        position: right;
        text-align: right;
        padding: 15px 15px 0px;

    }
    .buton:hover{
      background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));
    }
    </style>
   
    <header>                           
                    <div class="row">
                                
                                <div class="search hidden-xs hidden-sm">
                                    <input type="text" style="text-transform:uppercase" class="pesquisa" placeholder="Pesquisar" id="search">
                                </div>
                            </div>
                            
                                    <li>
                                    <a href="gerenciamento.php" class="icon-info"><button class="btn btn-dblue btn-lg" role="button" class="submit">Voltar</button></a>
                                    </li>

                            <h2>Escolha um Militar para Licenciar ou Deletar<h2>
                                <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  if(isset($_GET['l'])){ 
                                    ?> <a href="deletargerencia.php" class="icon-info"><button class="btn btn-blue btn-lg" role="button" class="submit">Ver Todos Militares</button></a> <?php
                                }else{ 
                                    ?> <a href="deletargerencia.php?l=1" class="icon-info"><button class="btn btn-blue btn-lg" role="button" class="submit">Ver somente Licenciados</button></a> <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
                                } ?>
                    </header>
                    
<?php
                          if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                          include_once('../conexoes/conect.php');
                          if(isset($_GET['l'])){
                            $sql = "SELECT * FROM militares m INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao WHERE m.servico = 'LICENCIADO' ORDER by m.nome_de_guerra ASC";
                            $result = $conect->query($sql);
                          }else{
                            $sql = "SELECT * FROM militares m INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao WHERE m.servico != 'LICENCIADO' ORDER by m.nome_de_guerra ASC";
                            $result = $conect->query($sql);
                          }
                          
                           
                            ?>
    <div class="mdl-ce11">
    <main class="">
        
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col action account_manage">
            <body>
            <div id="content"> 
                <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if(isset($_GET['l'])){
                    echo ' <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">

                    <tr>
                        <th style="  text-align: center;  vertical-align: middle; ">Escala de Serviço</th>
                        <th style="  text-align: center;"> <img src="../img/logo.png"><br> Exército </th>
                        <th style="  text-align: center;">Confere com o original <br> <img src="../img/assinatura.png"><br> Escalante </th>
                    </tr>
                </table>';
                } ?>
           
                <div id="tabelaUsuarios">
                <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col">
                    <thead>
                        <tr>
                        <th >id</td>    
                        <th >Graduacao</td>
                        <th >Nome</td>
                        <th >Antiguidade</td>
                        
                        <th >Serviço</td>
                        <th >Data</td>
                      
                        <th >Editar</td>
                        </tr>                
                    </thead>
                    <tbody>
                     
                        <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['nome_graduacao']."</td>";
                            echo "<td>".$user_data['nome_de_guerra']."</td>";
                            echo "<td>".$user_data['antiguidade']."</td>";
                           
                            echo "<td>".date('d/m/Y', strtotime($user_data['data_ultimo_sv']))."</td>";
                          
                            echo "<td>".$user_data['atividade']."</td>";
                            echo "<td>
                            <a  class='btn btn-sm btn-primary' href='../militar/proc_licenciar_usuario.php?id=" . $user_data['id'] . "'  >
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-folder-minus' viewBox='0 0 16 16'>
                            <path d='m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z'/>
                            <path d='M11 11.5a.5.5 0 0 1 .5-.5h4a.5.5 0 1 1 0 1h-4a.5.5 0 0 1-.5-.5z'/>
                          </svg>
                               </a>
                            <a  href='../militar/proc_apagar_usuario.php?id=" . $user_data['id'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?' class='btn btn-sm btn-danger' href='#'>
                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                              </svg>
                               </a> </td>";
                          echo "</tr>";
                        }

                            
                       ?>
                    </tbody>            
                </table>
                </div>               
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="../js/personalizado.js"></script>		
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = '../resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>