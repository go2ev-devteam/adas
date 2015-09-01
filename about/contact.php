<?php
$page_title = '찾아오시는 길';
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
		<div class='body contact' id='body'>
			<div class='contents' id='contents'>
				<div class='content-head'>
					<div class='gutter'>
						<h3>한양정보통신<span>본사 찾아 오시는 길</span></h3>
					</div>
				</div>
				<div class='content-row'>
					<div class='gutter'>
						<h4>주소</h4>
						<p class='addr'>(우)137-842 서울특별시 서초구 방배로 114 (방배동 907-1) 소망빌딩 3층<br />
							대표번호 02-2279-1400<span>임베디드연구소 02-598-0050</span></p>
						<h4>교통편</h4>
						<h5>* 승용차 이용 시</h5>
						<ul>
							<li>1) 올림픽대로 이용시, 동작대교 남단으로 빠져 이수교차로에서 내방역 방면으로 2.6km 직진 후 방배서리풀 e-편한세상 아파트 정문앞 삼거리에서 좌회전 후, 아파트 앞 좌회전 후, 막다른 골목에서 좌회전, 좌측으로 지하주차장 이용</li>
						</ul>
						<h5>* 대중교통 이용시</h5>
						<ul>
							<li>1) 지하철 : 2호선 방배역 4번출구 100m / 7호선 내방역 2번출구 300m</li>
							<li>2) 버스 :  142, 148, 406, 4319  방배역(구방림시장, #22-229) 정거장 하차  </li>
						</ul>
						<div class='map'>
							<img src='../img/about/map-fs8.png' alt='임베디디비전 연구소 위치'>
						</div>
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