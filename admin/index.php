<?php
$page_title = 'ADAS 어드민';
include_once('./init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<div class='root-in'>
			<div class='cols'>
				<!-- <?php include_once($GP -> INC.'gnb.php'); ?> -->
				<div class='col-2'>
					<div class='col-1'>
						<div class='left-box'>
							<h1><a href='/'><img src='img/logo.png' alt='ADAS ONE 로고'></a></h1>
							<div class='dep2-back'></div>
							<ul id='gnb' class='gnb'>
								<li class='dep1-row'>
									<a href='event.php' class='dep1'>일반 게시판</a>
									<ul class='dep2-group'>
										<li><a href='event.php' class='dep2'>이벤트</a></li>
										<li><a href='notice.php' class='dep2'>공지사항</a></li>
										<li><a href='faq.php' class='dep2'>FAQ</a></li>
									</ul>
								</li>
								<li class='dep1-row'>
									<a href='qna.php' class='dep1'>문의 게시판</a>
									<ul class='dep2-group sr-only'>
										<li><a href='qna.php' class='dep2'>Q&amp;A</a></li>
										<li><a href='sales.php' class='dep2'>영업 및 제휴 문의</a></li>
									</ul>
								</li>
								<li class='dep1-row'>
									<a href='download.php' class='dep1'>다운로드</a>
								</li>
							</ul>
						</div>
						<div class='body' id='body'>
							<div class='content-head'>
								<h2>WELCOME! ADAS ONE ADMIN MODE</h2>
								<p>게시물 및 메일링 관련 내용을 관리하실수 있습니다<br />해당 관리자 페이지의 메인 관리자는 <span>adasone@hanyang.co.kr</span>입니다</p>
							</div>
							<div class='content-row'>
								<h4>최근 게시물(관리자)</h4>
								<table>
									<colgroup>
										<col style='width:10%;'>
										<col style='width:60%;'>
										<col style='width:10%;'>
										<col style='width:20%;'>
									</colgroup>
									<thead>
										<tr>
											<th scope='col'>게시판 구분</th>
											<th scope='col'>제 목</th>
											<th scope='col'>작 성 자 </th>
											<th scope='col'>등록일자</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href='notice.php'>공지사항</a></td>
											<td><a href=''>홈페이지가 리뉴얼 되었습니다</a></td>
											<td>관리자</td>
											<td>2015.07.20</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class='content-row'>
								<h4>최근 게시물(일반)</h4>
								<table>
									<colgroup>
										<col style='width:10%;'>
										<col style='width:60%;'>
										<col style='width:10%;'>
										<col style='width:20%;'>
									</colgroup>
									<thead>
										<tr>
											<th scope='col'>게시판 구분</th>
											<th scope='col'>제 목</th>
											<th scope='col'>작 성 자 </th>
											<th scope='col'>등록일자</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href='sales.php'>영업</a></td>
											<td><a href=''>전국총판가능, 회신주세요</a></td>
											<td>세일즈</td>
											<td>2015.07.21</td>
										</tr>
										<tr>
											<td><a href='qna.php'>Qna</a></td>
											<td><a href=''>꼭 대리점에서 설치를 해야하나요?</a></td>
											<td>궁금</td>
											<td>2015.07.24</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class='content-row'>
								<h4><a href='download.php'>다운로드</a></h4>
								<table>
									<colgroup>
										<col style='width:30%;'>
										<col style='width:30%;'>
										<col style='width:20%;'>
										<col style='width:20%;'>
									</colgroup>
									<thead>
										<tr>
											<th scope='col'>DEVICE</th>
											<th scope='col'>파 일 명</th>
											<th scope='col'>버 전</th>
											<th scope='col'>등록일자</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>SM-100 Device</td>
											<td>ake_1533_jad.apk</td>
											<td>V1.1.0</td>
											<td>2015.07.10</td>
										</tr>
										<tr>
											<td>PC Viewer</td>
											<td>ake_1533_jad.apk?</td>
											<td>V 1.1.0</td>
											<td>2015.05.20</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>