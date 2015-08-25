<?php
/*	config.php 내부 선언 상수 
*	DB_HOST, DB_USER, DB_PW, DB_NAME
*
*/
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME) or die('<p>DB Connection Failed -'.mysqli_errno().' : '.mysqli_error().'</p>');
mysqli_query($dbc,"SET NAMES utf8");
?>