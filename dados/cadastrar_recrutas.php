<?php
 $server = "10.166.65.167";
 $usuario = "dantas";
 $senha = "grafex";
 $banco = "bancosv3";

 $conexao = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
 $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "<h1>Ler XML com PHP</h1>";

// Carregar arquivo com XML e transformando arquivo XML em Objeto
// $xml = simplexml_load_file('arquivo.xml');

// Atribui o conteúdo XML para variável
$string = '<?xml version="1.0" encoding="utf-8"?>
<root>
    
        <ANTG>459</ANTG><PGRAD>Sd Rcr</PGRAD><NOME_GUERRA>CORREA</NOME_GUERRA><CURSO>Nenhum</CURSO><CPF>0000000</CPF><IDENTIDADE>000000</IDENTIDADE><NOME>THALISON VITOR NASCIMENTO DE ARAUJO CORREA</NOME><DT_PRACA>01/03/2023</DT_PRACA><RA>36</RA>
    
    
  
</root>';

// Transformando o conteúdo XML da variável $string em Objeto
$xml = simplexml_load_string($string);

foreach($xml as $key => $VALUE){
    echo $key . $VALUE . '<br>';
    if($key == 'ANTG'){
        $ANTG = $VALUE;
    }
    if($key == 'CPF'){
        $CPF = $VALUE;
    }
    if($key == 'IDENTIDADE'){
        $IDENTIDADE = $VALUE;
    }
    if($key == 'NOME_GUERRA'){
        $NOME_GUERRA = $VALUE;
    }

    // COLOQUE O IF PARA O ULTIMO CAMPO DA TABELA, CASO NÃO ALTERE O BANCO DE DADOS VAI DA PROBLEMA E CADASTRAR OS MILITARES MAIS DE UMA VEZ
    if($key == 'RA'){
        // $ADDSD = $conexao->prepare("INSERT INTO `militares`( cpf, fk_cursos, antiguidade, graduacao, nome_de_guerra, servico, data_de_sv, atividade,  data_ultimo_sv, data_ultimo_sv_red, externo, externo_red, missao_red, missao, escalado_externo, escalado_externo_red) 
        // VALUES ('$CPF','1','$ANTG','1','$NOME_GUERRA','AMBAS',' ','1','2004-01-01','2004-01-01','2004-01-01','2004-01-01','2004-01-01','2004-01-01','2004-01-01','2004-01-01')");
        // $ADDSD->execute(); //EXECUTA TABELA
    }
   
}
