<?php
$page_title = '상세 보기';
include_once('../_init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<div class='root-in'>
			<div class='cols'>
				<?php include_once($GP -> INC.'gnb.php');

				foreach ($_GET as $key => $value) 
				{
					if(isset($_GET[$key]) && !empty($_GET[$key]))
					{
						$$key = $value;
					}
				}

				include_once($GP -> INC.'dbconn.php');
				$qry = "SELECT * FROM $cate WHERE `idx`='$idx'";
				$result = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
				if(mysqli_num_rows($result)>=1)
				{
					$row = mysqli_fetch_assoc($result);
					$tit = $row[$cate.'_tit'];
					$content = $row[$cate.'_content'];
					$date = $row[$cate.'_date'];
				}
				?>
				<div class='col-2 view' id='body'>
					<?php include_once($GP -> INC.'content.head.php'); ?>
					<div class='content-row-group'>
						<div class='content-row'>
							<h3><?php echo $tit; ?></h3>
							<div class='date-box'>
								<span>등록일 <?php echo $date;?></span>
							</div>
						</div>
						<div class='content-row'>
							<div>
								<?php
								echo $content;
								?>
							</div>
						</div>
					</div>
					<div class='content-foot'>
						<a href='<?php echo "remove.php?idx=$idx&cate=$cate&page=$page";?>' class='btn btn-remove'>삭 제</a>
						<a href='<?php echo "edit.php?idx=$idx&cate=$cate&page=$page";?>' class='btn btn-edit'>수정하기</a>
						<a href='<?php echo "board.php?cate=$cate&page=$page";?>' class='btn btn-go-list'>목록으로</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>