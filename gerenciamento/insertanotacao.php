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
    <link href="../css/militares.css" rel="stylesheet">
  
    <link rel="stylesheet" href="js/militares.js">
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
        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  include_once('../dados/postos.php');  ?>                       
                    <div class="row">
                                
                                <div class="search hidden-xs hidden-sm">
                                </div>
                            </div>
                            
                                    <li>
                                    <a href="gerenciamento.php" class="icon-info"><button class="btn btn-dblue btn-lg" role="button" class="submit">Voltar</button></a>
                                    </li>

                            <!-- <h2>Escolha Os militres para adicionar o Impedimento<h2> -->
                                <form method="POST" action="saveanotacao.php">
                                <b > Adicione um Título a sua Anotação </b>
                                <input type="text" name="titulo" id="titulo" placeholder="Título da Anotação">          
								</select>
                                <br>
		 
        
                                    <div class="row ">
                                    <div class="container">
                                        <div class="col-6">
                                    
                                    </div>
                                    <div style="flex-wrap: wrap;" class="col-6">
                                    <label for="lembrete">Anotação</label>
                                <textarea name="lembrete" id="lembrete" placeholder="Adicione o Conteúdo da Anotação"></textarea>       
                                </div>   
                                </div>
                                </div>
           
            
            <br>
        
         <label for="data">Data da Anotação</label>
                  <input type="date" name="data_final" id="data_final" placeholder="Data de Final" >
         <br>
         <!-- <label for="usuario0">Relacione a um Militar (Opcional)</label>
         <input type="text" style="text-transform:uppercase" name="usuario0"  id="usuario0" placeholder="Pesquisar Militar" onkeyup="carregar_usuarios(this.value)" />
                                       <span id="resultado_pesquisa0"></span>
                                       <input type="hidden" name="id_usuario0"  id="id_usuario0"/> -->
         <br><br>  <input class="btn btn-dblue btn-lg btn-primary" type="submit" value="Cadastrar" name="submit">
                    </header>
                    </form>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
                           include_once('../conexoes/conect.php');
                           $sql = "SELECT * FROM anotacoes ORDER by  data_agenda DESC";
                           $result = $conect->query($sql);
                           $a = 0;
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
                            <th>Ações</th>
                        <th >Id</td>    
                        <th >Título</td>
                        <th >Anotação</td>
                        <th >Data da Anotação</td>
                        <th >Relacionado a Militar</td>
                        <th >Status</td>
                       
                        </tr>                
                    </thead>
                    <tbody>
                    <form method="POST" action="desativaanotacao.php">
                        <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='escalado".$a."' value='".$user_data['id_anotacoes']."'></td>";
                            echo "<td>".$user_data['id_anotacoes']."</td>";
                            echo "<td>".$user_data['titulo']."</td>";
                            echo "<td>".$user_data['obs']."</td>";
                            echo "<td>".date('d/m/Y', strtotime($user_data['data_agenda']))."</td>";
                            if($user_data['cod_militar'] != null){
                               $id = $user_data['cod_militar'];
                                $query_impedimento = $conexao->prepare("SELECT * FROM militares m INNER JOIN graduacoes g ON m.graduacao = g.id_graduacao WHERE m.id = $id ");//SELECIONA A TABELA DE MILITARES
                                $query_impedimento->execute(); //EXECUTA TABELA
                              while($impedimento = $query_impedimento->fetch(PDO::FETCH_ASSOC)) {
                                  $graduacao = $impedimento['nome_graduacao'];
                                  $nome_de_guerra = $impedimento['nome_de_guerra'];
                                 
                                }
                                echo "<td>".$graduacao." ".$nome_de_guerra."</td>";
                               }else{
                                echo "<td>NÃO</td>";
                               }
                                
                           if($user_data['sts'] == 1){
                            echo "<td>ATIVO</td>";
                          
                           }else{
                            echo "<td>DESATIVADO</td>";
                           }
                            
                           
                           
                         $a++;
                         
                        }
        echo '<input type="hidden" value="'.$a.'" name="conter">';
                          echo  '<input class="btn btn-dblue btn-lg btn-warning" type="submit" value="Desativar/Ativar" name="submit">';
                          echo  '<input  class=" btn btn-dblue btn-lg btn-danger" type="submit" value="Excluir" name="delete">';
                       ?>
                       </form>
                    </tbody>            
                </table>
                </div>               
            </div>
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
            <script src="../js/custom.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="../js/personalizado.js"></script>	
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = '../resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>