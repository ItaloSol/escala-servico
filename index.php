<?php
    session_start();
    if(isset($_SESSION['SISGRAFEX'])){
        echo "<script>window.location = 'acoes/logout.php'</script>";
      }
    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        echo "<script>window.location = 'resumo/painel.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="imagem/png" href="assents/img/grafex.png" />
    <!-- Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Título da Página -->
    <title>GRAFEx - Sisteme de Escala</title>

    <!-- Import do Css -->

    <link type="text/css" rel="stylesheet" href="assents/css/login.css">
    <script type="text/javascript" src="assents/js/preloader.js"></script>


</head>
<body>
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
        <div class="bolas">
            <div></div>
            <div></div>
            <div></div>                    
        </div>
        </div>
    </div>
    <!-- fim do preloader --> 
    <div id="conteiner">
        <div id="div-lat-esq">
            <a href="intranet.graficadoexercito.eb.mil.br"><img class="img" src="assents/img/grafex.png" alt="Soldado"></a><br>
            <h1 class="anim-title"><span class="text-title">GRAFEx</span> - Sistema de Escala de Serviço</h1>
        </div>
        <div id="div-lat-dir">
        <form method="POST" action="acoes/login.php" id="formAuthentication">
            <div id="login">   
                <h1 class="title-login">Login</h1>
                <?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);}
                    ?>
               <div class="login-form">
                <label for="usuario">Usuário</label>
                <input type="number" name="email" placeholder="Digite sua identidade militar">
               </div>
               <div class="login-form">
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha"><br>
                <!-- <div  class="g-recaptcha" data-sitekey="6Lf3ZLoiAAAAAA3pC8EZTVHHlO6w9c3J83B2Dj3A" require></div> -->
               </div>
               
               <input type="submit" value="Entrar" class="btn-login">
               <a class="btn-cconta" href="cadastro/cadastrologin.php">Criar Conta</a><br>
               <a href="cadastro/senhaesquecida.php">Esqueceu a senha?</a>
            </div>
        </div>
        </form>     
    </div>

</body>

<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
      // CODIGO DO CAPTCHA // NÃO FUNCIONA LOCALHOST
//     window.onload = function() {
//     var recaptcha = document.forms["formAuthentication"]["g-recaptcha-response"];
//     recaptcha.required = true;
//     recaptcha.oninvalid = function(e) {
//     // fazer algo, no caso to dando um alert
//     alert("Por favor complete o captcha");
//       }
//    } 
    </script>

</html>