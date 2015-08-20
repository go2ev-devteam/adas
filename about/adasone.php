<?php
$page_title = 'ADAS ONE';
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
		<div class='body adasone' id='body'>
			<div class='contents' id='contents'>
				<div class='content-head'>
					<div class='top-wide-image'></div>
				</div>
				<div class='content-row'>
					<div class='gutter'>
						<img src='../img/about/adas-fs8.png'>
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