<?php

$_DIR_ROOT = str_replace('\\', '/', dirname(__FILE__));
$_WEB_ROOT = dirname($_SERVER['PHP_SELF']);
$_WEB_ROOT = array_filter(explode('/', $_WEB_ROOT));
$_WEB_ROOT = '/'.array_shift($_WEB_ROOT).'/admin/';

include_once($_DIR_ROOT.'/inc/config.php');

?>