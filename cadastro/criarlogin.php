<?php
 include_once('../conexoes/conecti.php');
 include_once('../acoes/conexao.php');
 include_once('../conexoes/conexaoo.php');
 include_once('../conexoes/conexao.php');
 include_once('../conexoes/conect.php');
 
if(isset($_POST['id_usuario0'])){  
  $nome = $_POST['usuario0'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $senha1 = $_POST['senha1'];
  $fk_militar = $_POST['id_usuario0'];
  $adm = 0;
  
  $query_registro = $conexao->prepare("SELECT * FROM usuarios WHERE fk_militar = '$fk_militar' " );
$query_registro->execute(); //EXECUTA TABELA
$i = 0;
while($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
    session_start();
    $_SESSION['msg'] = "<h2 style='color:red;'>Erro o usuário já existe no banco de dados!</h2>";
    header("Location: cadastrologin.php");
}

//   echo "\n";
//   echo $nome.'<br>';
//   echo $email.'<br>';
//   echo $senha.'<br>';
//   echo $senha1.'<br>';
//   echo $fk_militar.'<br>';
//   echo $adm.'<br>';
 

        if($senha == $senha1){
            if(isset($fk_militar)){
                $query = $conexao->prepare("INSERT INTO usuarios(email,senha,nome,adm,fk_militar) VALUES 
               ('$email','$senha','$nome','$adm','$fk_militar')");
                         $query->execute();                                             
                         session_start();
                           
                            $_SESSION['msg'] = "<h2 style='color:green;'>Militar cadastrado com sucesso!</h2>";
                            header("Location: ../index.php");    
                         
                          
            }else{
                session_start();
            $_SESSION['msg'] = "<h2 style='color:red;'>Erro é necessário selecionar o nome do militar corretamente</h2>";
          echo "<script>window.location = 'cadastrologin.php'</script>";
            }
        }else{
            session_start();
            $_SESSION['msg'] = "<h2 style='color:red;'>Erro as senhas não coincidem!</h2>";
         echo "<script>window.location = 'cadastrologin.php'</script>";
        }

}
 
 