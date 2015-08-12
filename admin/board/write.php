<?php
$page_title = '관리자 : FAQ 글쓰기';
include_once('../init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<div class='root-in'>
			<div class='cols'>
				<?php include_once($GP -> INC.'gnb.php'); ?>
				<div class='col-2' id='body'>
					<div class='content-row'>
						<form name='nse' action='add.post.php' method='post'>
							<textarea name='ir1' id='ir1' class='edit-post'></textarea>
							<input type='hidden' name='cate' value='<?php echo $_GET["cate"]; ?>'>
							<input type='submit' value='완료'>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>