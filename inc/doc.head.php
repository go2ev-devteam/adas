<!DOCTYPE html>
<html lang='ko'>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='Author' content='한양정보통신'>
<meta name='Description' content='Adas One'>
<meta name='Keywords' content='블랙박스, AdasOne, 한양정보통신'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' href='css/basic.css'>
<link rel='stylesheet' href='css/a1-wfonts.css'>
<link rel='stylesheet' href='css/common.css'>

<script src='js/jquery-1.9.1.min.js'></script>
<script src='js/respond.min.js'></script>
<script id="TypeEngine" type='text/javascript' src="js/hy-1.1.js?client_c=4937128194"></script>

<?php
if(is_file($css_file) && filesize($css_file) >0)
{
	echo '<link rel="stylesheet" href="'.$css_file.'">';
}

if(is_file($js_file) && filesize($js_file) > 0)
{
	echo '<script type="text/javascript" src="'.$js_file.'"></script>';
}
?>
<title><?php echo $page_title; ?></title>
</head>