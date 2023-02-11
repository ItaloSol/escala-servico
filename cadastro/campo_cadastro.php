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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../css/tabela_cadastro.css" rel="stylesheet">
<link href="../js/tabela_cadastro.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="icon" type="image/x-icon" href="../img/logo40px.ico" /><!------ Include the above in your HEAD tag ---------->
<div class="main">
  <h2>Adicionar Novo Militar a Escala de Serviço </h2>
      <div class="row">
        <div class="form-group">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-default">Salvar</button>
            <button type="close" class="btn btn-default">Deletar</button>
            <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
          </div>

        </div>

      </div>
      <div class="row">
        <div class="col-xs-12 col-lg-10">
          <div class="panel panel-primary">
            <div class="row">
              <div class="col-xs-12">
                <h4>Infomaçoes do Militar</h4>
              </div>
            </div>
            <div class="panel-body">
              <form class="form-horizontal">
                <div class="row">
                  
                  <div class="col-sm-9 col-lg-10">
                    <div class="form-group">
                      <label for="inputtext1" class="col-sm-4  col-md-4 col-lg-3 control-label">Graduação</label>
                      <div class="col-sm-8 col-lg-9">
                        <input type="text" style="text-transform:uppercase" class="form-control" id="inputtext1" placeholder="Soldado/Cabo/Sargento">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputtext2" class="col-sm-4  col-md-4 col-lg-3 control-label">Nome de Guerra</label>
                      <div class="col-sm-8 col-lg-9">
                        <input type="text" style="text-transform:uppercase" class="form-control" id="inputtext2" placeholder="Nome de Guerra">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputtext2" class="col-sm-4  col-md-4 col-lg-3 control-label">Email</label>
                      <div class="col-sm-8 col-md-8  col-lg-9">
                        <input type="email" class="form-control" id="inputtext2" placeholder="@">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputtext2" class="col-sm-4   col-md-4 col-lg-3 control-label">Telefone</label>
                      <div class="col-sm-8 col-lg-9">
                        <input type="text" style="text-transform:uppercase" class="form-control" id="inputtext2" placeholder="Telefone">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputtext2" class="col-sm-4 col-lg-3 control-label">Endereço</label>
                      <div class="col-sm-8  col-lg-9">
                        <input type="text" style="text-transform:uppercase" class="form-control" id="inputtext2" placeholder="Endereço">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row text-center">
                <button type="button" class="btn btn-default">Concluir Cadastro</button>
              </div>
            </div>
          </div>
        </div>
    <label>
    </label>
      </div>
    </div>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ if( $adm != 1): ?>

    <script>window.location = '../resumo/painel.php'</script>";

    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ endif; ?>