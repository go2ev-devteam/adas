<?php
$page_title = '영업 및 제휴 문의';
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
				<h2>영업 및 제휴 문의</h2>
				<div class='content-head'>
					<div class='gutter'>
						<h3>문의를 남겨주시면 담당자 확인후 연락드리겠습니다.</h3>
						<span class='h3-comment'>B2B 거래를 원하시는 클라이언트께서는 아래의 항목을 작성 후 접수 하여 주시길 바랍니다.<br />담당자 확인 후 연락 드리겠습니다. 감사합니다</span>
					</div>
				</div>
				<div class='content-row first-row'>
					<div class='gutter'>
						<span class='row-comment'>* 표시는 필수 입력 사항입니다</span>
						<form method='post' action='partner.proc.php'>
							<fieldset>
								<span><label for='u_name'>이 름</label><input type='text' name='u_name' id='u_name' style='width: 244px;'></span>
								<span><label for='u_email'>이메일</label><input type='text' name='u_email' id='u_email' style='width: 244px;'></span>
							</fieldset>
							<fieldset>
								<span><label for='biz_name'>회사명</label><input type='text' name='biz_name' id='biz_name' style='width: 244px;'></span>
								<span><label for='country_name'>국가</label><input type='text' name='country_name' id='country_name' style='width: 244px;'></span>
							</fieldset>
							<fieldset>
								<span>
									<label for='mobile_01'>연락처</label><input type='text' name='mobile_01' id='mobile_01' maxlength='3' style='width: 80px;'> -
									<label for='mobile_02' class='sr-only'>핸드폰 두번째번호</label><input type='text' name='mobile_02' id='mobile_02' maxlength='4' style='width: 80px;'> -
									<label for='mobile_03' class='sr-only'>핸드폰 세번째번호</label><input type='text' name='mobile_03' id='mobile_03' maxlength='4' style='width: 80px;'>
								</span>
								<span>
									<label for='tel_01'>팩스</label><input type='text' name='tel_01' id='tel_01' maxlength='3' style='width: 80px;'> -
									<label for='tel_02' class='sr-only'>팩스중간번호</label><input type='text' name='tel_02' id='tel_02' maxlength='4' style='width: 80px;'> -
									<label for='tel_02' class='sr-only'>팩스마지막번호</label><input type='text' name='tel_03' id='tel_03' maxlength='4' style='width: 80px;'>
								</span>
							</fieldset>
							<fieldset class='qna-tit-row'>
								<span>
									<label for='qna_tit'>제목</label><input type='text' name='qna_tit' id='qna_tit' class='qna-tit'>
								</span>
							</fieldset>
							<fieldset class='text-row'>
								<span>
									<label for='qna_post'>내용</label>
									<textarea name='qna_post' id='qna_post'>
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