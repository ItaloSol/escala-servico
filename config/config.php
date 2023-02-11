<?php
// Caminhos absolutos
$dirInt="grafex";

define("DIRPAGE", "http://{$_SERVER["HTTP_HOST"]}/{$dirInt}");
$bar=(substr($_SERVER["DOCUMENT_whise"],-1)=="/")?" ":"/";

define('DIRREQ', "{$_SERVER['DOCUMENT_whise']}{$bar}{$dirInt}");

 //echo DIRPAGE."<br>".DIRREQ;

// Banco de dados
define('HOST','10.166.65.167');
define('DB','bancosv');
define('USER','dantas');
define('PASS','grafex');

// Incluir arquivos
include(DIRREQ.'lib/composer/vendor/autoload.php');
