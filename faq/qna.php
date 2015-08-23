<?php
$page_title = 'Q&A';
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
						<h3>문의를 남겨주시면 담당자 확인후 연락드리겠습니다.</h3>
						<span class='h3-comment'>제품 구입관련 프로모션 등에 대한 문의를 남겨주시면 담당자를 통해 빠른 답변 드리겠습니다.<br />동영상 재생 관련 문제가 생겼을 시에는 FAQ를 확인하여 주세요. </span>
					</div>
				</div>
				<div class='content-row first-row'>
					<div class='gutter'>
						<span class='row-comment'>* 표시는 필수 입력 사항입니다</span>
						<form method='post' action='prog.qna.php'>
							<fieldset>
								<span><label for='u_name'>이 름</label><input type='text' name='u_name' id='u_name' style='width: 244px;'></span>
								<span><label for='email'>이메일</label><input type='text' name='email' id='email' style='width: 244px;'></span>
							</fieldset>
							<fieldset>
								<span><label for='biz_name'>회사명</label><input type='text' name='biz_name' id='biz_name' style='width: 244px;'></span>
								<span><label for='country'>국가</label><input type='text' name='country' id='country' style='width: 244px;'></span>
							</fieldset>
							<fieldset>
								<span>
									<label for='mobile_01'>연락처</label><input type='text' name='mobile_01' id='mobile_01' maxlength='3' style='width: 80px;'> -
									<label for='mobile_02' class='sr-only'>핸드폰 두번째번호</label><input type='text' name='mobile_02' id='mobile_02' maxlength='4' style='width: 80px;'> -
									<label for='mobile_03' class='sr-only'>핸드폰 세번째번호</label><input type='text' name='mobile_03' id='mobile_03' maxlength='4' style='width: 80px;'>
								</span>
								<span>
									<label for='tel_01'>유선전화</label><input type='text' name='tel_01' id='tel_01' maxlength='3' style='width: 80px;'> -
									<label for='tel_02' class='sr-only'>유선전화중간번호</label><input type='text' name='tel_02' id='tel_02' maxlength='4' style='width: 80px;'> -
									<label for='tel_02' class='sr-only'>유선전화중간번호</label><input type='text' name='tel_03' id='tel_03' maxlength='4' style='width: 80px;'>
								</span>
							</fieldset>
							<fieldset class='text-row'>
								<span>
									<label for='text'>내용</label>
									<textarea>
									</textarea>
								</span>
							</fieldset>
							<input type='submit' name='submit' id='btn_submit' class='btn btn-submit' value='문의하기'>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php include_once($GP -> INC.'foot.php'); ?>
		<!--↑↑ Foot ↑↑-->
	</div>
</body>
</html>