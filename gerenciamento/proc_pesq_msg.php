<?php
include_once ('../conexoes/conecti.php');


$nome_de_guerra = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$result_msg_cont = "SELECT nome_de_guerra FROM militares WHERE nome_de_guerra LIKE '%".$nome_de_guerra."%' ORDER BY nome_de_guerra ASC";

//Seleciona os registros
$resultado_msg_cont = $conexao->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    $mens[] = $row_msg_cont['nome_de_guerra'];
}

echo json_encode($mens);