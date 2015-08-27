<?php
$page_title = 'FAQ';
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
		<div class='body faq' id='body'>
			<div class='contents' id='contents'>
				<h2>FAQ</h2>
				<div class='content-head'>
					<div class='gutter'>
						<h3>자주 찾는 질문 TOP 20</h3>
						<span class='h3-comment'>제품사용에 필요한 설치메뉴얼, PC뷰어, 어플리케이션 등을 다운받을 수 있습니다.<br />동영상 재생 관련 문제가 생겼을 시에는 FAQ를 확인하여 주세요. </span>
					</div>
				</div>
				<div class='content-row first-row'>
						<div class='gutter'>
							<table class='table-basic notice-table'>
								<colgroup><col style='width:15%;'><col style='width:70%;'><col style='width:15%;'></colgroup>
								<thead>
									<tr>
										<th scope='col'>번호</th>
										<th scope='col'>제목</th>
										<th scope='col'>등록일자</th>
									</tr>
								</thead>
								<tbody>
									<?php
									include_once($GP -> INC.'dbconn.php');

									if(isset($_GET['page']) && !empty($_GET['page']))
									{
										$page = $_GET['page'];
									}
									else
									{
										$page = 1;
									}

									$cate = 'faq';
									$qry = "SELECT * FROM faq ORDER BY `idx` DESC";
									$res = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
									$str = '';

									$page_range_start = ($page - 1) * LIST_NUM_FOR_PAGE;
									$page_range_end = $page_range_start + LIST_NUM_FOR_PAGE;
									for($i = $page_range_start; $i < $page_range_end; ++$i) 
									{
										if(mysqli_data_seek($res, $i))
										{
											$row = mysqli_fetch_assoc($res);

											$str.='<tr>';
											$str.='<td>'.$row['idx'].'</td>';
											$str.='<td class="list-tit"><a href="view.php?idx='.$row['idx'].'&cate='.$cate.'&page='.$page.'">'.$row['faq_tit'].'</td>';
											$str.='<td class="reg-date">'.$row['faq_date'].'</td>';
											$str.='</tr>';
										}
									}
									echo $str;
									?>
								</tbody>
							</table>
							<div class='pagination'>
								<?php
								$prev_page_num = $page - 1;
								$prev10_page_num = $page - 10;
								$prev_page_num = ($prev_page_num <= 0)? 1 : $prev_page_num;
								$prev10_page_num = ($prev10_page_num <= 0)? 1 : $prev10_page_num;

								echo '<a href="'.$GP -> WEBROOT.'board/board.php?cate='.$cate.'&page='.$prev10_page_num.'" class="prev10 btn-icon" title="10페이지 이전으로">10페이지 이전으로</a>';
								echo '<a href="'.$GP -> WEBROOT.'board/board.php?cate='.$cate.'&page='.$prev_page_num.'" class="prev btn-icon" title="이전 페이지로">이전 페이지로</a>';

								$total_row_len = 0;
								if(mysqli_num_rows($res) > 0)
								{
									$total_row_len = mysqli_num_rows($res);
								}
								$page_len = ceil($total_row_len / LIST_NUM_FOR_PAGE);
								for($i = 1;$i <= $page_len;++$i)
								{
									echo '<a href="'.$GP -> WEBROOT.'board/board.php?cate='.$cate.'&page='.$i.'" class="'.(($page!=$i)? '':'current').'">'.$i.'</a>';
								}
								$next_page_num = $page + 1;
								$next10_page_num = $page + 10;
								$next_page_num = ($next_page_num >= $page_len)? $page_len : $next_page_num;
								$next10_page_num = ($next10_page_num >= $page_len)? $page_len : $next10_page_num;

								echo '<a href="'.$GP -> WEBROOT.'board/board.php?cate='.$cate.'&page='.$next_page_num.'" class="next btn-icon" title="다음 목록 페이지로">다음 페이지로</a>';
								echo '<a href="'.$GP -> WEBROOT.'board/board.php?cate='.$cate.'&page='.$next10_page_num.'" class="next10 btn-icon" title="10페이지 다음으로">다음 10페이지로</a>';

								?>
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