<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

define('DB_HOST', 'localhost');
define('DB_USER', 'adas');
define('DB_PW', '111111');
define('DB_NAME', 'adas');
define('LIST_NUM_FOR_PAGE', 10);

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