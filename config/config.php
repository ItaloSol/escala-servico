<?php
// Caminhos absolutos
$dirInt="grafex";

define("DIRPAGE", "http://{$_SERVER["HTTP_HOST"]}/{$dirInt}");
$bar=(substr($_SERVER["DOCUMENT_whise"],-1)=="/")?" ":"/";

define('DIRREQ', "{$_SERVER['DOCUMENT_whise']}{$bar}{$dirInt}");

 //echo DIRPAGE."<br>".DIRREQ;

// Banco de dados
define('HOST','');
define('DB','');
define('USER','');
define('PASS','');

// Incluir arquivos
include(DIRREQ.'lib/composer/vendor/autoload.php');
