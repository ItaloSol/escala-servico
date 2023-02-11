<?php

include_once "../conexoes/conn.php";

$nome_usuario = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);

if(!empty($nome_usuario)){

    $pesq_usuarios = "%" . $nome_usuario . "%";

    $query_usuarios= "SELECT id, nome_de_guerra,  nome_graduacao FROM militares INNER JOIN graduacoes ON militares.graduacao = graduacoes.id_graduacao WHERE nome_de_guerra LIKE :nome LIMIT 20";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->bindParam(':nome', $pesq_usuarios);
    $result_usuarios->execute();

    if(($result_usuarios) and ($result_usuarios->rowCount() != 0)){
        while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            $dados[] = [
                'id' => $row_usuario['id'],
                'grad' => $row_usuario['nome_graduacao'],
                'nome' => $row_usuario['nome_de_guerra']
                

                
            ];
        }

        $retorna = ['erro' => false, 'dados' => $dados];
        //$retorna = ['erro' => true, 'msg' => "Erro: Nenhum usuário encontrado!"];
    }else{
        $retorna = ['erro' => true, 'msg' => "Erro: Nenhum usuário encontrado!"];
    }
    
}else{
    $retorna = ['erro' => true, 'msg' => "Erro: Nenhum usuário encontrado!"];
}

echo json_encode($retorna);