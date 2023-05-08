<?php 
session_start();
?>
<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/vendor/components/font-awesome/css/fontawesome-all.min.css">

<!--<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">-->
<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/md/css/bootstrap.min.css">
<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/md/css/mdb.min.css">
<!-- ----------------------------------------------------------------------------- -->

<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/datatables/datatables.min.css">
<!-- ----------------------------------------------------------------------------- -->

<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/vendor/components/jqueryui/themes/base/jquery-ui.min.css">
<!-- ----------------------------------------------------------------------------- -->

<link rel="stylesheet" href="http://servico.badmqgex.eb.mil.br/include/chosen/component-chosen.min.css">
<!-- ----------------------------------------------------------------------------- -->
    <link rel="icon" type="image/x-icon" href="../img/logo40px.ico" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="../css/login.css">
<!DOCTYPE html>
<style>
     .cadastra{
        background-image: linear-gradient(to right, rgb(220 20 20), rgb(17,54,71));
      width: 100%;
      position: relative;
      top: 13px;
      left: -92px;
      border: none;
      padding: 15px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      border-radius: 10px;
    }
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0; /* <-- Aparentemente, algumas margens ainda estão lá, apesar de estar ocultas */

    }
</style>

<html lang=”pt-br”>
<meta charset=”UTF-8”>

<title>Sistema da Escala de Servico</title>
<div class="container">

    <div class="card card-login mx-auto text-center bg-dark">
    <?php /* SISTEMA DE ESCALA DE SERVIÇO CRIADO POR SD ÍTALO SOL SCLOCOO *DANTAS*  */ 
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);}
?>
        <div class="card-header mx-auto bg-dark">
            <span> <img src="../img/logo.png" class="w-133" alt="Logo"> </span><br/>
                        <span class="logo_title mt-5"> Sistema de Serviço da Gráfica do Exército </span>
        </div>
        <div class="card-body">
          <div style="color: white; font-size: 20px;">  Atualize seu login adicionando o seu CPF </div>
            <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                
                    <form action="validarcpf.php" method="POST">
                    <input name="email" type="number"  class="form-control" placeholder="Insira o CPF"   autocomplete="off" required>
                </div>
                <input name="id_usuario" type="hidden" value="<?= $_SESSION['usuario']['2'] ?>">
                
                <input name="fk_militar" type="hidden" value="<?= $_SESSION['usuario']['3'] ?>">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                    </div>
                  
                <div class="form-group">
        
          <input type="submit" class="btn btn-outline-danger float-center login_btn">
        </div>
            </form>
            <div>
            
        </div>
        </div>
    </div>
</div>

</meta>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 <script src="../js/custom.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <script src="../js/modals.js"></script>