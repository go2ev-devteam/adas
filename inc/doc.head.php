<!DOCTYPE html>
<html lang='ko'>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='Author' content='한양정보통신'>
<meta name='Description' content='Adas One'>
<meta name='Keywords' content='블랙박스, AdasOne, 한양정보통신'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' href='<?php echo $GP -> WEBROOT;?>css/basic.css'>
<link rel='stylesheet' href='<?php echo $GP -> WEBROOT;?>css/a1-wfonts.css'>
<link rel='stylesheet' href='<?php echo $GP -> WEBROOT;?>css/common.css'>

<script src='<?php echo $GP -> WEBROOT;?>js/jquery-1.9.1.min.js'></script>
<script src='<?php echo $GP -> WEBROOT;?>js/respond.min.js'></script>
<script src='<?php echo $GP -> WEBROOT;?>js/common.js' type="text/javascript"></script>
<script id="TypeEngine" type='text/javascript' src='<?php echo $GP -> WEBROOT ?>js/hy-1.1.js?client_c=4937128194'></script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php
$filename = $GP -> getDirName();

$css_file = $filename.'.css';
$js_file = $filename.'.js';

if(is_file($GP -> CSS.$css_file) && file_exists($GP -> CSS.$css_file) && filesize($GP -> CSS.$css_file)> 0)
{
	echo '<link rel="stylesheet" href="'.$GP -> WEB_CSS.$css_file.'">';
}

if(is_file($GP -> JS.$js_file) && file_exists($GP -> JS.$js_file) && filesize($GP -> JS.$js_file)> 0)
{
	echo '<script type="text/javascript" src="'.$GP -> WEB_JS.$js_file.'"></script>';
}
?>
<title><?php echo $page_title; ?></title>
</head>