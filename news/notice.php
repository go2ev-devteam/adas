<?php
$page_title = 'ADASONE 공지사항';
include_once('../_init.php');
include_once($GP -> INC.'doc.head.php');
?>
<body>
	<div class='root'>
		<?php 
		include_once($GP -> INC.'accessibility.php');
		include_once($GP -> INC.'head.php');
		?>
		<!--↑↑ Header ↑↑-->
		<!--↓↓ Body ↓↓-->
		<div class='body notice' id='body'>
			<div class='gutter'>
				<div class='contents' id='contents'>
					<!-- <ul class='bread-crumb'>
						<li><a href='index.php' class='crumb-home'>HOME &gt; </a></li>
						<li><a href='index.php'>NEWS &gt; </a></li>
						<li><a href='index.php'>공지사항</a></li>
					</ul> -->
					<h3>공지사항</h3>
					<div class='content-head'>
						<div class='gutter'>
							<img src='../img/news/thumb_top.png' alt=''>
							<div class='notice-top-text'>
								<h4>Under a lover's sky I'm gonna be with you</h4>
								<span>2015.07.03</span>
								<span>And no one's gonna be around<br />
									If you think that you won't fall<br />
									Well just wait until, 'till the sun goes down<br />
									Underneath the starlight starlight<br />
									There's a magical feeling so right<br />
									It will steal your heart tonight<br />
								</span>
							</div>
						</div>
					</div>
					<div class='content-row'>
						<div class='gutter'>
							<table class='table-basic notice-table'>
								<colgroup><col style='width:10%;'><col style='width:75%;'><col style='width:15%;'></colgroup>
								<thead>
									<tr>
										<th scope='col'>번호</th>
										<th scope='col'>제목</th>
										<th scope='col'>등록일자</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>20</td>
										<td class='list-tit'><a href=''>시스템 점검에 따른 온라인 쇼핑몰 사이트 이용 제한 안내</a></td>
										<td class='reg-date'>2015-06-30</td>
									</tr>
									<tr>
										<td>19</td>
										<td class='list-tit'><a href=''>‘SM-100’ 출시 및 CES 2016 전시 참가 안내</a></td>
										<td class='reg-date'>2015-06-19</td>
									</tr>
									<tr>
										<td>18</td>
										<td class='list-tit'><a href=''>모바일 신규 서비스 오픈 및 시스템 점검에 따른 일시 제한 안내</a></td>
										<td class='reg-date'>2015-06-05</td>
									</tr>
									<tr>
										<td>17</td>
										<td class='list-tit'><a href=''>한양정보통신 임베디드 비전연구소 </a></td>
										<td class='reg-date'>2015-05-21</td>
									</tr>
									<tr>
										<td>16</td>
										<td class='list-tit'><a href=''>시스템 점검에 따른 온라인 쇼핑몰 사이트 이용 제한 안내</a></td>
										<td class='reg-date'>2015-06-30</td>
									</tr>
									<tr>
										<td>15</td>
										<td class='list-tit'><a href=''>‘SM-100’ 출시 및 CES 2016 전시 참가 안내</a></td>
										<td class='reg-date'>2015-06-19</td>
									</tr>
									<tr>
										<td>14</td>
										<td class='list-tit'><a href=''>모바일 신규 서비스 오픈 및 시스템 점검에 따른 일시 제한 안내</a></td>
										<td class='reg-date'>2015-05-10</td>
									</tr>
									<tr>
										<td>13</td>
										<td class='list-tit'><a href=''>이런저런 생각에 불러본 너 나올줄 몰랐어 간지러운 바람 웃고있는 우리 밤하늘의 별 취한듯한 너 치얼스 비어</a></td>
										<td class='reg-date'>2015-05-08</td>
									</tr>
									<tr>
										<td>12</td>
										<td class='list-tit'><a href=''>모바일 신규 서비스 오픈 및 시스템 점검에 따른 일시 제한 안내</a></td>
										<td class='reg-date'>2015-06-05</td>
									</tr>
									<tr>
										<td>11</td>
										<td class='list-tit'><a href=''>2015년 4월 상품 변경 안내</a></td>
										<td class='reg-date'>2015-04-30</td>
									</tr>
								</tbody>
							</table>
							<div class='pagination'>
								<a href='' class='prev10 btn-icon'>10페이지 전으로</a>
								<a href='' class='prev btn-icon'>이전 페이지로</a>
								<a href='' class='current'>1</a>
								<a href='' class='current'>2</a>
								<a href='' class='current'>3</a>
								<a href='' class='current'>4</a>
								<a href='' class='current'>5</a>
								<a href='' class='current'>6</a>
								<a href='' class='current'>7</a>
								<a href='' class='current'>8</a>
								<a href='' class='current'>9</a>
								<a href='' class='next btn-icon'>다음 페이지로</a>
								<a href='' class='next10 btn-icon'>다음 10페이지</a>
							</div>
						</div>
					</div>
				</div>
				<!--↑↑ Contents ↑↑-->
			</div>
		</div>
		<!--↑↑ Body ↑↑-->
		<?php include_once($GP -> INC.'foot.php'); ?>
		<!--↑↑ Foot ↑↑-->
	</div>
</body>
</html>