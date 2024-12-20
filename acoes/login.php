<?php
  
    require("conexao.php");
    include_once('../conexoes/conect.php');
    date_default_timezone_set('America/Sao_Paulo');
    if(isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null){
        $Senha_md5 = md5($_POST["senha"]);
        $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $query->execute(array($_POST["email"], $Senha_md5));
        
        if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            $id_desse_user = $user["fk_militar"];
            $validacao = $user['valida'];
            $id_usuario = $user["id_senha"];
            
            $query_registro = $conexao->prepare("SELECT * FROM militares WHERE id = '$id_desse_user'" );
            $query_registro->execute(); //EXECUTA TABELA

            if($reg = $query_registro->fetch(PDO::FETCH_ASSOC)) { 
                $data_nasc = $reg['data_nasc'];
            }
            
           

            session_start();
            $_SESSION["usuario"] = array($user["nome"], $user["adm"], $user["id_senha"], $user["fk_militar"], $user["acesso"],$user['valida']);
            $_SESSION["ESCALA"] = 'LOGADO NO ESCALA';
             $datahora = date('d/m/Y H:i:s a', time());
            $observacao  =  'Login '. $user["fk_militar"];
            


            $datahoraa = (string) $datahora;    //  string $datahora;
              $sqlAtividade = "INSERT INTO atividade (observacao, data_hora, fk_alteracao, fk_usuario) VALUES ( '$observacao', '$datahoraa', '27', '$id_desse_user')";
            $result = $conect->query($sqlAtividade);
          
            if($data_nasc == '2024-01-01' || $validacao != 1){

          
            if($data_nasc == '2024-01-01'){
                header("Location: data_nascimento.php"); 
            }
            if($validacao != 1){
                header("Location: cpf.php"); 
            }  }else{
                header("Location: ../resumo/painel.php"); 
            }
           
           
        }else{
            session_start();
            $_SESSION['msg'] = "<h2 style='color:red;'>Erro o Login/Senha não existe!</h2>";
     header("Location: ../index.php"); 
        }
    
    }else{
        session_start();
        $_SESSION['msg'] = "<h2 style='color:red;'>Erro é necessário prencher todos os campos</h2>";
       header("Location: ../index.php"); 
    }
