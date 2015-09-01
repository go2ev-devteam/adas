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
						<p>(우)137-842 서울특별시 서초구 방배로 114 (방배동 907-1) 소망빌딩 3층<br />
							대표번호 02-2279-1400<br />임베디드연구소 02-598-0050</p>
						<h4>교통편</h4>
						<h5>* 승용차 이용 시</h5>
						<ul>
							<li>1) 경부고속도로 : 판교IC(톨게이트) 차출 후 좌회전 → 약 700m 직진하여 사거리에서 우회전(SK주유소 옆)</li>
							<li>2) 분당-수서간 도시고속화도로 : 성남아트센터 방면 지하차도 옆길 → 벌말사거리에서 우회전 → GS주유소 삼거리에서 판교역 방면으로 좌회전</li>
							<li>3) 인근 시설 : 스타팅광동주유소, 에이치스퀘어</li>
						</ul>
						<h5>* 대중교통 이용시</h5>
						<ul>
							<li>1) 지하철 : 2호선 방배역 4번출구 100m / 7호선 내방역 2번출구 300m</li>
							<li>2) 버스 :  142, 148, 406, 4319  방배역(구방림시장, #22-229) 정거장 하차  </li>
						</ul>
						<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.exp&region=KR"></script>
						<div class='map' id='google_map'>
							<img src='../img/about/map-fs8.png' alt='임베디디비전 연구소 위치'>
							<!--37.484365, 126.996078-->
						</div>
						<script type="text/javascript">
						$(document).ready(function()
						{

						})
						</script>
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