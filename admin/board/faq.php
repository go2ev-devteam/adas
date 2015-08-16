<?php
$page_title = '관리자 : FAQ 게시판';
include_once('../init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<div class='root-in'>
			<div class='cols'>
				<?php include_once($GP -> INC.'gnb.php');?>
				<div class='col-2' id='body'>
					<div class='content-head'>
						<h2>FAQ 게시판</h2>
						<p>해당 관리자 페이지의 메인 관리자는 <span>adasone@hanyang.co.kr</span>입니다</p>
					</div>
					<div class='content-row'>
						<a href='write.php?cate=faq' class='btn write-link'>글쓰기</a>
						<table>
							<colgroup>
								<col style='width:5%;'>
								<col style='width:5%;'>
								<col style='width:50%;'>
								<col style='width:15%;'>
								<col style='width:17%;'>
								<col style='width:10%;'>
							</colgroup>
							<thead>
								<tr>
									<th scope='col'></th>
									<th scope='col'>번 호</th>
									<th scope='col'>제 목</th>
									<th scope='col'>작 성 자 </th>
									<th scope='col'>등록일자</th>
									<th scope='col'>조회수</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type='checkbox' name='dels[]' value='<?php echo "";?>'></td>
									<td>1</td>
									<td class='item-tit tal'><a href=''>홈페이지가 리뉴얼 되었습니다</a></td>
									<td>관리자</td>
									<td>2015.07.20</td>
									<td>10</td>
								</tr>
							</tbody>
						</table>
						<div class='pagination'>
							<a href='' class='prev10 btn-icon' title='10개 이전 페이지로'>10페이지 전으로</a>
							<a href='' class='prev btn-icon' title='이전 페이지로'>이전 페이지로</a>
							<a href='' class='current'>1</a>
							<a href=''>2</a>
							<a href=''>3</a>
							<a href=''>4</a>
							<a href=''>5</a>
							<a href=''>6</a>
							<a href=''>7</a>
							<a href=''>8</a>
							<a href=''>9</a>
							<a href='' class='next btn-icon' title='다음 목록 페이지로'>다음 페이지로</a>
							<a href='' class='next10 btn-icon' title='10개 다음 페이지로'>다음 10페이지</a>
						</div>
						<a href='write.php?cate=faq' class='btn write-link'>글쓰기</a>
						<button type='button' class='btn btn-remove'>삭 제</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>