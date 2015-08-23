<?php
$page_title = '다운로드';
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
		<div class='body download' id='body'>
			<div class='contents' id='contents'>
				<h2>DOWNLOADS</h2>
				<div class='content-head'>
					<div class='gutter'>
						<h3>제품사용에 필요한 메뉴얼 및 프로그램을 다운 받으세요.</h3>
						<span class='h3-comment'>제품사용에 필요한 설치메뉴얼, PC뷰어, 어플리케이션 등을 다운받을 수 있습니다.<br />동영상 재생 관련 문제가 생겼을 시에는 FAQ를 확인하여 주세요. </span>
					</div>
				</div>
				<div class='content-row first-row'>
					<div class='gutter'>
						<ul class='downloads'>
							<li>
								<h4>Manual Download</h4>
								<a class='file' href='download/menual.sm100.zip' title='SM100 메뉴얼'>SM100 Menual Downloads</a>
								<a class='file' href='download/menual.tk1.zip' title='TK1 Manual Downloads'>TK1 Manual Downloads</a>
							</li>
							<li>
								<h4>firmware download</h4>
								<a class='file' href='download/firmware.sm100.zip' title='Firmware SM 100'>SM-100 FIRM Wnloads</a>
								<a class='file' href='download/firmware.tk1.zip' title='Firmware TK1'>TK 1 Firm Downloads</a>
							</li>
							<li>
								<h4>BROCHURE DOWNLOAD</h4>
								<a class='file' href='download/brouchure.sm100.zip' title='Brouchure SM 100'>SM-100 Brochure Downloads</a>
								<a class='file' href='download/brouchure.adas.zip' title='Brouchure TK1'>ADAS ONE Brouchure Downloads</a>
							</li>
							<li>
								<h4>PC VIEWER DOWNLOAD</h4>
								<a class='file' href='download/viewer.adas.zip' title='Viewer ADAS ONE'>ADAS ONE PC Viewer Download</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<!--↑↑ Body & Content ↑↑-->
		</div>
		<!--↓↓ Foot ↓↓-->
		<?php include($GP -> INC.'foot.php'); ?>
		<!--↑↑ Foot ↑↑-->
	</div>
</body>
</html>