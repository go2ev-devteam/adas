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
					<div class='gutter'>
						<h2>- ADAS ONE -</h2>
						<div class='h2-comment'>안전운전을 위한 ADAS·E-Call·OBD를 모두 담은 <span>Smart Car Solution</span></div>
					</div>
				</div>
				<div class='content-row first-row'>
					<div class='gutter'>
						<h3>한양의 기술로 탄생한<span>Smart Car Solution<strong style='color: #df2d2d;'> ADAS ONE</strong></span></h3>
						<div class='h3-comment'>
							ADAS ONE은 ㈜한양정보통신 신규사업부문인 임베디드비전 사업부에서 개발, 출시하는 프리미엄 Smart Car Solution 제품의 전략 브랜드명으로서 핵심구현 기술인 안전운전 보조 시스템, 즉 ADAS(Advanced Driving Assistance System)를 자체 구현 알고리즘으로 최상의 품질로 지원해 운전자에게 보다 안락하고 안전한 운전주행 환경을 제공하고자 하는 의미를 담고 있습니다.
						</div>
						<img src='../img/about/adasone_01-fs8.png' alt='' style='width: 100%;'>
						<div class='h3-comment'>
							나아가 ADAS ONE이라는 브랜드 의미는 한양정보통신의 R&D 역량을 집중하여 차별화된 안전운전기능을 구현하는 프리미엄 Smart Car Solution 단말기기로 전세계 차량주행안전제품 시장을 최고의 품질로 선도하고자 한다는 가치이념을 실현하기 위한 한양정보통신 임베디드 사업부의 열정을 의미합니다.  
						</div>
					</div>
				</div>
				<div class='content-row func'>
					<div class='gutter'>
						<h3><span class='big-text'>UI</span><span>로 보는</span><strong> ADAS 주요기능</strong></h3>
						<div class='func-row'>
							<dl>
								<dt><img src='../img/about/func_01.png' alt='FCW'><span>FCW</span></dt>
								<dd>
									Mobileye FCW는 전방 차량과의 상대속도를 측정해 충돌까지 시간(TTC)을 산출하며,충돌이 발생하기 MAX 2.7초 전 운전자에게 경고합니다.
								</dd>
							</dl>
							<dl>
								<dt><img src='../img/about/func_02.png' alt='LDW'><span>LDW</span></dt>
								<dd>
									Mobileye는 방향 등을 사용하지 않고 차선을 이탈할 경우, 경고를 발생합니다. 55km/h 이상에서 동작하며 차량이 차선 표시를 가로지르기 최대 0.5초전에 LDW 경고를 발생합니다.
								</dd>
							</dl>
							<dl>
								<dt><img src='../img/about/func_03.png' alt='E-call'><span>E-call</span></dt>
								<dd>
									사고시 등록된 연락처 및 보험사로 SMS가 발송되어 사고지점 위치와 연락처가 전달됩니다. 
								</dd>
							</dl>
							<dl>
								<dt><img src='../img/about/func_04.png' alt='OBD'><span>OBD</span></dt>
								<dd>
									자동차의 시동을 걸 때 자동으로 운행기록이 저장되는 시스템으로 차량의 문제를 운전자가 쉽게 이해할 수 있도록 리스트 형태로 게시합니다.
								</dd>
							</dl>
						</div>
					</div>
				</div>
				<div class='content-row feat'>
					<div class='gutter'>
						<h3>ADAS는 <strong>안전하고, 편리한 도로문화</strong>를 만듭니다.</h3>
						<div class='h3-comment'>
							ADAS의 첨단 기술은 운전자가 직관적으로 위험을 감지하고 반응함을 넘어서, 자동차 스스로 위험을 방어하고 예방할 수 있는 시스템을 목표로 하고 있습니다. 음주운전, 졸음운전, 긴급상황 등을 감지하고 자동차 스스로 판단하는 인공지능 운전 시스템을 오류 없이 작동할 수 있도록 만드는 한양정보시스템이 되겠습니다. 
						</div>
						<img src="../img/about/tech_img_02-fs8.png" alt=''>
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