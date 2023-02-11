
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
      include_once('../conexoes/conect.php');
      include_once('../conexoes/conecti.php');
      include_once('../acoes/conexao.php');
      include_once('../conexoes/conexaoo.php');
      include_once('../conexoes/conexao.php');
?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if($adm): ?>
           
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../css/tabela_gerenciamento.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href="../css/gerenciamento.css" rel="stylesheet">
<link rel="stylesheet" href="../js/gerenciamento.js">
<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->


<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
        <div style="position:fixed;"  class="col-md-2 col-sm-0 hidden-xs display-table-cell v-align box" id="navigation">
                <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */  $datahoje = date("d"); $meshoje = date('m'); ?><div class="navi">
                    <ul>
                    <li ><a href="../resumo/painel.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Painel</span></a></li>
                            <li  ><a href="../impedimento/impedimento.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Impedimentos</span></a></li>
                            <li ><a href="../cadastro/cadastrar.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cadastrar</span></a></li>
                            <li ><a href="../militar/militares.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Militares</span></a></li>
                            <li ><a href="../escala/autoescala.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Escala</span></a></li>
                            <li class="active"><a href="gerenciamento.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gerenciamento</span></a></li>
                            <li ><a href="../acoes/logout.php"><i class="fa fa-power-off " aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sair</span></a></li> <li><a href="../resumo/sobre.php"><i class="fa fa-info " aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sobre</span></a></li>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ include_once('../gerenciamento/menunotifica.php');?>
                   </ul>
                </div>
            </div>
            <div style="padding-left:17%;padding-top: 0px;margin-top: 0px;">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
               
               
              
             
              
<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->

<div class="container">
<section>
    
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-thumbs-up"></span> Gerenciamento Escala</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
						
                    </div>
                   
               
            </div>
            <?php

require'../conexoes/conect.php';
$msg = false;
    $previsao = $conexao->prepare('SELECT * FROM previsao WHERE id_previsao = 1 '); 
    $previsao->execute(); 
    $i = 0;
     while($prev = $previsao->fetch(PDO::FETCH_ASSOC)) { 
     $Valu_dia = $prev['qtd_prevista'];
    }
if(isset($_POST['Dia_Previsão'])){
   $qtd_dias = $_POST['Dia_Previsão'];
    

    $sql_code = "UPDATE previsao SET qtd_prevista= $qtd_dias WHERE id_previsao = 1";
   
    if(mysqli_query($conect, $sql_code))
    $msg = "Previsão Enviada com sucesso!";
    else
    $msg = "Falha ao enviar a Previsão";
    date_default_timezone_set('America/Sao_Paulo'); $datahora   = date('d/m/Y H:i:s a', time());
    $observacao  =  'Mudado Para '. $qtd_dias;
    $datahoraa = (string) $datahora;    //  string $datahora;
      $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '9', '$id_desse_user')";
    $result = $conect->query($sqlAtividade);
}

   
?>
<html>
    
<head lang="pt-br"> <title>Postar Previsão</title></head>    


<h1>Postar Previsão</h1>
<?php
 if($msg != false) echo "<p> $msg </p>"; ?>

<form  method="POST" >
    Quantidade de Dias a Publicar: 
                                        <select name="Dia_Previsão">
                                    <optgroup label="Dias">
                                    <option name="Dia_Previsão" value="<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Valu_dia ?>"><?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ echo $Valu_dia ?>
                                    <option name="Dia_Previsão" value="0">0
                                    <option name="Dia_Previsão" value="1">1	
                                    <option name="Dia_Previsão" value="2">2	
                                    <option name="Dia_Previsão" value="3">3	
                                    <option name="Dia_Previsão" value="4">4	
                                    <option name="Dia_Previsão" value="5">5	
                                    <option name="Dia_Previsão" value="6">6	
                                    <option name="Dia_Previsão" value="7">7	
                                    <option name="Dia_Previsão" value="14">14
                                    <option name="Dia_Previsão" value="21">21
                                    <option name="Dia_Previsão" value="28">28
                                    <option name="Dia_Previsão" value="30">30
                                    <option name="Dia_Previsão" value="31">31
                                    <option name="Dia_Previsão" value="35">35
                                    
                                    </select> 
    <a href="gerenciamento.php"><input type="submit" value="Salvar" ></a>
</form>

</html>
        </div>
    </div>
</section>
</div>
                   
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            
        </div>
    </div>

</body>

<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

<script>window.location = '../resumo/painel.php'</script>";

<?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>