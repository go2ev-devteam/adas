<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PW', 'autoset');
define('DB_NAME', 'adas');

class GlobalPath{};
$GP = new GlobalPath();
$GP -> ROOT    = $_DIR_ROOT.'/';
$GP -> WEBROOT = $_WEB_ROOT;
$GP -> INC     = $GP -> ROOT .'inc/';
$GP -> FUNC    = $GP -> ROOT.'func/';
$GP -> CSS     = $GP -> ROOT.'css/';
$GP -> JS      = $GP -> ROOT.'js/';
$GP -> HOST    = $_SERVER['HTTP_HOST'];
$GP -> PAGESELF = $_SERVER['PHP_SELF'];

?>