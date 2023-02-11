<?php
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');
include_once('../dados/postos.php');
include_once('../dados/escala.php');
$previsao = $conexao->prepare("SELECT * FROM previsao WHERE id_previsao < 6 ORDER BY id_previsao ASC");//SELECIONA A TABELA DE MILITARES
$previsao->execute(); //EXECUTA TABELA
$a = 0;
while($previsto = $previsao->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
    $Qtd_Previst = $previsto['qtd_prevista'];
    $motiv = $previsto['motivo'];

    $Motivo[$a] = $motiv;
    $Qtd_Prevista[$a] = $Qtd_Previst;
    $a++;
}

$previsao = $conexao->prepare("SELECT * FROM previsao WHERE id_previsao > 4 ORDER BY id_previsao ASC");//SELECIONA A TABELA DE MILITARES
$previsao->execute(); //EXECUTA TABELA
$a = 0;
while($previsto = $previsao->fetch(PDO::FETCH_ASSOC)) { // MOSTRA OS RESULTADOS
    $Qtd_Previst = $previsto['qtd_prevista'];
    $motiv = $previsto['motivo'];

    $Motivo_graduacao[$a] = $motiv;
    $Qtd_Prevista_Graduacoes[$a] = $Qtd_Previst;
    $a++;
}

// echo '<pre>';
// print_r($Motivo);
// print_r($Qtd_Prevista);
 //print_r($Qtd_Prevista_Graduacoes);