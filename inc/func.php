<?php
function is_https()
{
	if(isset($_SERVER['HTTPS'])!=='off' && $_SERVER['SERVER_PORT']=='443' && isset($_SERVER))
	{
		return true;
	}
	else 
	{
		return false;
	}
}

function getURL()
{
	return $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
}
?>