<?php
$page_title = '회사소개';
include_once('../_init.php');
include_once($GP -> INC.'doc.head.php');
?>
<body>
	<div class='root'>
		<?php 
		include($GP -> INC.'accessibility.php');
		include($GP -> INC.'head.php');
		?>
		<!--↑↑ Header ↑↑-->
		<!--↓↓ Body & Content ↓↓-->
		<div class='body' id='body'>
			<div class='contents intro' id='contents'>
				<div class='content-head'>
					<!-- <div class='gutter'> -->
						<div class='top-wide-img'></div>
					<!-- </div> -->
				</div>
				<div class='content-row'>
					<div class='gutter'>
						<img src='../img/about/intro-fs8.png'>
					</div>
				</div>
			</div>
		</div>
		<!--↑↑ Body & Content ↑↑-->
		<!--↓↓ Foot ↓↓-->
		<?php include($GP -> INC.'foot.php'); ?>
		<!--↑↑ Foot ↑↑-->
	</div>
</body>
</html>