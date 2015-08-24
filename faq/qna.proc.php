<?php
include_once('../_init.php');
include_once($GP -> INC.'dbconn.php');

if(isset($_POST['submit']))
{
	foreach($_POST as $key => $value)
	{
		$$key = mysqli_real_escape_string(trim($value));
		if(empty($_POST[$key]))
		{
			if(preg_match('/tel_0\d/',$key)!=1)
			{
				header('Location:'.$GP -> WEBROOT.'faq/qna.php');
				return;
			}
		}
	}

	$qry = "INSERT INTO `qna` (u_name, u_email, biz_name, country_name, mobile_01, mobile_02, mobile_03, tel_01, tel_02, tel_03, qna_post, qna_date)
	VALUES('$u_name','$u_email', '$biz_name', '$country_name', '$mobile_01', '$mobile_02', '$mobile_03', '$tel_01', '$tel_02', '$tel_03', '$qna_post', NOW())";
	$res = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
	if($res)
	{
		header('Location:'.$GP -> WEBROOT.'faq/qna.php');
	}
	mysqli_close($dbc);
}
?>