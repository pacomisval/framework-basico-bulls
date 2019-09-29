
<?php

$raiz = dirname(dirname(__FILE__));
//echo 'El valor de $raiz es: '.$raiz.'<br>';

define("DS" , DIRECTORY_SEPARATOR);

$config = require_once $raiz .DS. "config.php";

$routes = require_once $raiz .DS. "routes" .DS. "web.php";
require_once $raiz .DS. "core" .DS. "functions.php";
$params = array();
$page = parseURI();
//echo "Página:".$page;
include_once($raiz .DS. "public" .DS. "vistas" .DS. $page);
 

