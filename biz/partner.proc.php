<?php
header('Content-type: text/html; charset=UTF-8');
include_once('../_init.php');
include_once($GP -> INC.'dbconn.php');

if(isset($_POST['submit']))
{
	foreach($_POST as $key => $value)
	{
		$$key = mysqli_real_escape_string($dbc, trim($value));
		if(empty($_POST[$key]))
		{
			if(preg_match('/fax_0\d/',$key)!=1)
			{
				echo '<script>alert("문의사항이 누락되었습니다");window.location.href="'.$GP -> WEBROOT.'biz/partner.php";</script>';
				return;
			}
		}
	}

	$qry = "INSERT INTO `biz` (u_name, u_email, biz_name, country_name, mobile_01, mobile_02, mobile_03, fax_01, fax_02, fax_03, biz_tit, biz_post, biz_date)
	VALUES('$u_name','$u_email', '$biz_name', '$country_name', '$mobile_01', '$mobile_02', '$mobile_03', '$fax_01', '$fax_02', '$fax_03', '$biz_tit', '$biz_post', NOW())";
	$res = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
	if($res)
	{
		$to = 'volca4@naver.com';
		$charset = 'UTF-8';
		$subject = "=?".$charset."?B?".base64_encode($biz_tit)."?=";
		$from  = "=?".$charset."?B?".base64_encode($u_name)."?=<$u_email>\r\n";

		$headers ='MIME-Version: 1.0'."\r\n";
		$headers.='Content-type: text/html; charset=UTF-8'."\r\n";
		$headers.='From: '.$from."\r\n";

		mail($to, $subject, $biz_post, $headers);

		header('Location:'.$GP -> WEBROOT.'biz/partner.end.php');
	}
	mysqli_close($dbc);
	exit;
}
?>