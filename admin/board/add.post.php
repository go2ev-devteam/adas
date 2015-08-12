<?php
include_once($GP -> INC.'dbconn.php');

if(isset($_POST['submit']))
{
	foreach($_POST as $key => $value)
	{
		$$key = mysqli_real_escape_string(trim($value));
		if(empty($_POST[$key]))
		{
			echo 'alert("값이 누락 되었습니다")';
			return
		}
	};

	$qry = "INSERT INTO `$cate`("
}
?>