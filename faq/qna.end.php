<?php
$page_title = 'Q&A 접수 완료';
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
		<div class='body qna' id='body'>
			<div class='contents' id='contents'>
				<h2>Q&amp;A</h2>
				<div class='content-head'>
					<div class='gutter'>
						<h3>문의가 접수되었습니다.</h3>
						<span class='h3-comment'>빠른 시일내에 답변을 드리도록 하겠습니다.</span>
					</div>
				</div>
			</div>
		</div>
		<?php include_once($GP -> INC.'foot.php'); ?>
		<!--↑↑ Foot ↑↑-->
	</div>
</body>
</html>