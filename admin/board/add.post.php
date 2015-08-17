<?php
include_once('../_init.php');
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
	$cate_tit = $cate.'_tit';
	$cate_content = $cate.'_content';
	$cate_date = $cate.'_date';

	$qry = "INSERT INTO $cate ($cate_tit, $cate_content, $cate_date) VALUES('$title', '$ir1', NOW())";
	$res = mysqli_query($dbc, $qry) or die('<p>InValid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
	if($res)
	{
		header('Location:'.$GP -> WEBROOT.'board/board.php?cate='.$cate.'&page=1');
	}
	else
	{
		echo '<script type="text/javascript">alert("글 등록 실패");</script>';
		header('Location:'.$GP -> WEBROOT.'board/write.php?cate='.$cate);
		return;
	}
}
else if(isset($_POST['update-post']))
{
	foreach($_POST as $key => $value)
	{
		$$key = mysqli_real_escape_string($dbc, trim($value));
		if(empty($_POST[$key]))
		{
			header('Location:'.$GP -> WEBROOT.'board/edit.php?cate='.$cate.'&page='.$page.'&idx='.$idx);
			return;
		}
	};
	$cate_tit = $cate.'_tit';
	$cate_content = $cate.'_content';
	$cate_date = $cate.'_date';

	$qry = "UPDATE $cate SET $cate_tit = '$title', $cate_content = '$ir1', $cate_date = NOW() WHERE idx ='$idx'";
	$res = mysqli_query($dbc, $qry)or die('<p>InValid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
	if($res)
	{
		header('Location:'.$GP -> WEBROOT.'board/view.php?cate='.$cate.'&page='.$page.'&idx='.$idx);
	}
	else
	{
		echo '<script type="text/javascript">alert("글 수정 실패");</script>';
		header('Location:'.$GP -> WEBROOT.'board/edit.php?cate='.$cate.'&page='.$page.'&idx='.$idx);
		return;
	}
}
mysqli_close($dbc);
?>