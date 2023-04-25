<?php
  
    require("conexao.php");

    if(isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null){
        $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $query->execute(array($_POST["email"], $_POST["senha"]));
      
        if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["nome"], $user["adm"], $user["id_senha"], $user["fk_militar"]);

            echo "<script>window.location = '../resumo/painel.php'</script>";
        }else{
            session_start();
            $_SESSION['msg'] = "<h2 style='color:red;'>Erro o Login/Senha não existe!</h2>";
            echo "<script>window.location = '../index.php'</script>";
        }
    }else{
        session_start();
        $_SESSION['msg'] = "<h2 style='color:red;'>Erro é necessário prencher todos os campos</h2>";
        echo "<script>window.location = '../index.php'</script>";
    }
?>