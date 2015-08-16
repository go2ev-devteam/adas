<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

$path_parts = pathinfo($_SERVER['PHP_SELF']);
$cur_file_name = $path_parts['filename'];
$cur_path = $path_parts['dirname'];

$css_file = 'css/'.$cur_file_name.'.css';
$js_file = 'js/'.$cur_file_name.'.js';


?>