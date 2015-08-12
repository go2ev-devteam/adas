<?php
include_once('../init.php');
include_once($GP -> INC.'dbconn.php');

if(isset($_POST['submit']))
{
	foreach($_POST as $key => $value)
	{
		$$key = mysqli_real_escape_string($dbc, trim($value));
		if(empty($_POST[$key]))
		{
			header('Location:'.$GP -> WEBROOT.'board/write.php?cate='.$cate);
			return;
		}
	};
	$col_tit = $cate.'_tit';
	$col_content = $cate.'_content';
	$col_date = $cate.'_date';

	$qry = "INSERT INTO $cate ($col_tit, $col_content, $col_date) VALUES('$title', '$ir1', NOW())";
	$res = mysqli_query($dbc, $qry) or die('<p>InValid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
	if($res)
	{
		header('Location:'.$GP -> WEBROOT.'board/board.php?cate='.$cate);
	}
	else
	{
		echo '<script type="text/javascript">alert("글 등록 실패");</script>';
		header('Location:'.$GP -> WEBROOT.'board/write.php?cate='.$cate);
		return;
	}
}
?>