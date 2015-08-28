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
					<h2>공지사항</h2>
					<div class='content-head'>
						<div class='gutter'>
							<img src='../img/news/thumb_top.png' alt=''>
							<div class='h3-box'>
								<h3>Under a lover's sky I'm gonna...</h3>
								<div class='h3-comment'>
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

									$cate = 'notice';
									$qry = "SELECT * FROM $cate ORDER BY `idx` DESC";
									$res = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
									$str = '';

									$row_tit = $cate.'_tit';
									$page_range_start = ($page - 1) * LIST_NUM_FOR_PAGE;
									$page_range_end = $page_range_start + LIST_NUM_FOR_PAGE;
									for($i = $page_range_start; $i < $page_range_end; ++$i) 
									{
										if(mysqli_data_seek($res, $i))
										{
											$row = mysqli_fetch_assoc($res);

											$str.='<tr>';
											$str.='<td>'.$row['idx'].'</td>';
											$str.='<td class="list-tit"><a href="news.view.php?idx='.$row['idx'].'&cate='.$cate.'&page='.$page.'">'.$row[$cate.'_tit'].'</td>';
											$str.='<td class="reg-date">'.$row[$cate.'_date'].'</td>';
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

								echo '<a href="'.$GP -> WEBROOT.'news/notice.php?cate='.$cate.'&page='.$prev10_page_num.'" class="prev10 btn-icon" title="10페이지 이전으로">10페이지 이전으로</a>';
								echo '<a href="'.$GP -> WEBROOT.'news/notice.php?cate='.$cate.'&page='.$prev_page_num.'" class="prev btn-icon" title="이전 페이지로">이전 페이지로</a>';

								$total_row_len = 0;
								if(mysqli_num_rows($res) > 0)
								{
									$total_row_len = mysqli_num_rows($res);
								}
								$page_len = ceil($total_row_len / LIST_NUM_FOR_PAGE);
								for($i = 1;$i <= $page_len;++$i)
								{
									echo '<a href="'.$GP -> WEBROOT.'news/notice.php?cate='.$cate.'&page='.$i.'" class="'.(($page!=$i)? '':'current').'">'.$i.'</a>';
								}
								$next_page_num = $page + 1;
								$next10_page_num = $page + 10;
								$next_page_num = ($next_page_num >= $page_len)? $page_len : $next_page_num;
								$next10_page_num = ($next10_page_num >= $page_len)? $page_len : $next10_page_num;

								echo '<a href="'.$GP -> WEBROOT.'news/notice.php?cate='.$cate.'&page='.$next_page_num.'" class="next btn-icon" title="다음 목록 페이지로">다음 페이지로</a>';
								echo '<a href="'.$GP -> WEBROOT.'news/notice.php?cate='.$cate.'&page='.$next10_page_num.'" class="next10 btn-icon" title="10페이지 다음으로">다음 10페이지로</a>';

								?>
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