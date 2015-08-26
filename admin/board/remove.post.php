<?php
include_once('../_init.php');
include_once($GP -> INC.'dbconn.php');

if(isset($_POST['idxs']) && !empty($_POST['idxs']))
{
	$idxs = $_POST['idxs'];
	$page = $_POST['page'];
	$cate = $_POST['cate'];

	$qry = "DELETE FROM $cate WHERE idx IN ($idxs)";
	$res = mysqli_query($dbc, $qry) or die('<p>Invalid Query'.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
	if($res)
	{
		mysqli_close($dbc);
		return;
	}
};

?>