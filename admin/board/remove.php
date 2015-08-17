<?php
include_once('../_init.php');
include_once($GP -> INC.'dbconn.php');

if(isset($_GET['idx']) && !empty($_GET['idx']))
{
	$idx = $_GET['idx'];
}
foreach ($_GET as $key => $value) 
{
	if(isset($_GET) && !empty($_GET))
	{
		$$key = $value;
	}
}

if(is_array($idx))
{
	foreach ($idx as $key => $value) 
	{

	}
}
else
{
	$qry = "DELETE FROM $cate WHERE idx='$idx'";
	$res = mysqli_query($dbc, $qry)or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
	if($res)
	{
		header('Location:'.$GP -> WEBROOT.'board/board.php?cate='.$cate.'&page='.$page);
		return;
	}
	else
	{
		echo '<p>글 삭제 실패</p>';
		return;
	}
}
mysqli_close($dbc);
?>