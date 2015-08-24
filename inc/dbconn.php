<?php
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME) or die('<p>DB Connect Failed11 </p>');
mysqli_query($dbc, "SET NAMES utf8");
?>