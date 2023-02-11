<?php
include_once('../conexoes/conecti.php');
include_once('../acoes/conexao.php');
include_once('../conexoes/conexaoo.php');
include_once('../conexoes/conexao.php');
include_once('../conexoes/conect.php');


 $query_escala = $conexao->prepare("SELECT * FROM escala ORDER BY data DESC");//SELECIONA A TABELA DE MILITARES
 $query_escala->execute(); //EXECUTA TABELA
 $a = 0;
 while($escala = $query_escala->fetch(PDO::FETCH_ASSOC)) {     
    $fk_confere_data = $escala['fk_militar'];
    $id_delete_confere = $escala['id_escala'];
    if($fk_confere_data == '0'){
        $query_escala = $conexao->prepare(" DELETE FROM escala WHERE  id_escala = $id_delete_confere");//SELECIONA A TABELA DE MILITARES
        $query_escala->execute(); //EXECUTA TABELA
       
    }
 
 }
