<?php
$page_title = '상세 보기';
include_once('../init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<?php
		if(isset($_GET['cate']) && !empty($_GET['cate']))
		{
			$cate = trim($_GET['cate']);
		}

		if(isset($_GET['idx']) && !empty($_GET['idx']))
		{
			$idx = trim($_GET['idx']);
		}
		include_once($GP -> INC.'dbconn.php');
		$qry = "SELECT * FROM $cate WHERE `idx`='$idx'";
		$result = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
		if(mysqli_num_rows($result)>=1)
		{
			$row = mysqli_fetch_assoc($result);
			$tit = $row[$cate.'_tit'];
			$content = $row[$cate.'_content'];
			$date 
		}
		?>
	</div>
</body>
</html>