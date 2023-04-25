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
        <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php'); 
        
        $query_sd_posto = $conexao->prepare("SELECT * FROM posto WHERE tipo_folga = 'externo' OR tipo_folga = 'externo_red' ORDER BY posto_graduacao ASC "); 
    $query_sd_posto->execute(); 
    $i = 0;
     while($linha = $query_sd_posto->fetch(PDO::FETCH_ASSOC)) {
        $Posto_Externo_ = $linha['id_posto'];
        $Posto_Externo = $linha['nome_posto'];
        $Posto_Externo_ID[$i] = $Posto_Externo_;
        $Posto_Externo_Nome[$i] = $Posto_Externo;
        $i++;
     }
     $total_de_posto = $i;
        ?>                       
                    <div class="row">
                                
                                <div class="search hidden-xs hidden-sm">
                                    <input type="text" style="text-transform:uppercase" class="pesquisa" placeholder="Pesquisar" id="search">
                                </div>
                            </div>
                            
                                    <li>
                                    <a href="gerenciamento.php" class="icon-info"><button class="btn btn-dblue btn-lg" role="button" class="submit">Voltar</button></a>
                                    </li>

                            <h2>Escolha Os dados do serviço externo para adicionar aos militares<h2>
                                <form method="POST" action="insetservicoexterno.php">
                                <b > Selecionar o Posto </b>
            <select name="idpostoexterno">
            <option name="idpostoexterno" value="null" ></option>
            
            <?php
            $cont = 0;
                while($cont < $total_de_posto){
                   echo '<option name="idpostoexterno" value="'.$Posto_Externo_ID[$cont].'" >'.$Posto_Externo_Nome[$cont].'</option>';
                   $cont++;
                }
                ?>
         </select>
								</select>
                                
			
           
            
            <br>
		 <label for="data">Data para o serviço</label>
         <input type="date" id="data" name="data"  required>
         <br>
            <input type="RADIO" id="VERMELHA"value="VERMELHA" name="tiposv"  required><label for="VERMELHA">VERMELHA</label>
         <input type="RADIO" id="PRETA" value="PRETA" name="tiposv"  required> <label for="PRETA">PRETA</label>
         <br><br>  <input class="btn btn-dblue btn-lg btn-primary" type="submit" name="submit">
                    </header>
                    
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
                           include_once('../conexoes/conect.php');
                           $sql = "SELECT * FROM militares m INNER JOIN graduacoes g ON g.id_graduacao = m.graduacao ORDER by  antiguidade DESC";
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
                            <th>Selecionar</th>
                        <th >id</td>    
                        <th >Graduacao</td>
                        <th >Nome</td>
                        <th >Antiguidade</td>
                        
                        <th >Serviço</td>
                        <th >Atividade</td>
                        <th >Data Preta</td>
                        <th >Data Vermelha</td>
                      
                        </tr>                
                    </thead>
                    <tbody>
                     
                        <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='escalado".$a."' value='".$user_data['id']."'></td>";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['nome_graduacao']."</td>";
                            echo "<td>".$user_data['nome_de_guerra']."</td>";
                            echo "<td>".$user_data['antiguidade']."</td>";
                           
                            echo "<td>".$user_data['servico']."</td>";
                          
                            echo "<td>".$user_data['atividade']."</td>";

                            $data_ultimo_sv = $user_data['data_ultimo_sv']; // INCLUI A DATA DO ULTIMO SERVIÇO A $data_ultimo_sv
      $dataprevista = date('Y-m-d'); // DATA PREVISTA
        $data_inicio = new DateTime($data_ultimo_sv); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
        $data_fim = new DateTime($dataprevista); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
        // Resgata diferença entre as datas
        $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
        $folgadosd = $dateInterval->d + ($dateInterval->m * 30); // CONVERTE PARA DATA Y-M-D
       // echo  $folgadosd ."<br>"; //MOSTRA FOLGA
     // echo"<td align='center'>". $folgadosd . "</td>";
     echo"<td align='center'>". date('d/m/Y', strtotime($user_data['data_ultimo_sv'])) .' - '.$folgadosd ."D </td>";
      $data_ultimo_sv_red = $user_data['data_ultimo_sv_red']; // INCLUI A DATA DO ULTIMO SERVIÇO A $data_ultimo_sv_red
      $dataprevista = date('Y-m-d'); // DATA PREVISTA
        $data_inicio = new DateTime($data_ultimo_sv_red); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
        $data_fim = new DateTime($dataprevista); // TRANSFORMA EM DATA O VALOR QUE ERA VARCHAR
        // Resgata diferença entre as datas
        $dateInterval = $data_inicio->diff($data_fim); //PEGA A DIFERENÇA
        $folgadosdred = $dateInterval->d + ($dateInterval->m * 30); // CONVERTE PARA DATA Y-M-D
       // echo  $folgadosd ."<br>"; //MOSTRA FOLGA
     // echo"<td align='center'>". $folgadosdred . "</td>"; 
     echo"<td align='center'>". date('d/m/Y', strtotime($user_data['data_ultimo_sv_red'])) . ' - '.$folgadosdred."D</td>";
                         $a++;
                         
                        }
        echo '<input type="hidden" value="'.$a.'" name="conter">';
                            
                       ?>
                       </form>
                    </tbody>            
                </table>
                </div>               
            </div>
            <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = '../resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>