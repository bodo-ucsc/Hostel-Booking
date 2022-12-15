<?php

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'bodo-admin'); 
define('DB_NAME', 'BODO');
define('DB_PASSWORD', 'jvatsbodo'); 
define("BASEURL", "http://".$_SERVER['SERVER_NAME']."/Bodo");

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/Bodo";
define("PATH", "$path");

?>

