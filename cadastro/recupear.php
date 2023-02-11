<?php
 
 include_once('../conexoes/conexaoo.php');
 
if(isset($_POST['id_usuario0'])){  
  $nome = $_POST['usuario0'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];
  $senha1 = $_POST['senha1'];
  $fk_militar = $_POST['id_usuario0'];
  $adm = 0;
//  echo "SELECT * FROM usuarios WHERE email = '$email' AND nome = '$nome' AND fk_militar = '$fk_militar' AND cpf = '$cpf' ";
  $query_registro = $conexao->prepare("SELECT * FROM usuarios WHERE email = '$email' AND nome = '$nome' AND fk_militar = '$fk_militar' AND cpf = '$cpf' " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
if($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
    if($senha == $senha1){
    //  echo 'igual';
        if(isset($fk_militar)){
          
            $query = $conexao->prepare("UPDATE usuarios SET senha = '$senha' WHERE email = '$email' AND nome = '$nome' AND fk_militar = '$fk_militar' AND cpf = '$cpf' ");
                      $query->execute();  
                      session_start();
        $_SESSION['msg'] = "<h2 style='color:yellow;'>Senha trocada com Sucesso!</h2>";
        echo "<script>window.location = 'senhaesquecida.php'</script>";
        }else{
            session_start();
        $_SESSION['msg'] = "<h2 style='color:red;'>Erro é necessário selecionar o nome do militar corretamente</h2>";
      echo "<script>window.location = 'senhaesquecida.php'</script>";
       }
    }else{
        session_start();
        $_SESSION['msg'] = "<h2 style='color:red;'>Erro as senhas não coincidem!</h2>";
    echo "<script>window.location = 'senhaesquecida.php'</script>";
    }
}else{
    session_start();
    $_SESSION['msg'] = "<h2 style='color:red;'>Erro o usuário não tem registro banco de dados!<br>Entre em contato com a seção de <br> <b>INFORMÁTICA</b></h2>";
    header("Location: senhaesquecida.php");
}

  // echo "\n";
  // echo $nome.'<br>';
  // echo $email.'<br>';
  // echo $senha.'<br>';
  // echo $senha1.'<br>';
  // echo $fk_militar.'<br>';
  // echo $adm.'<br>';
 

       

}
 
 