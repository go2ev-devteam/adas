<?php
if(isset($_GET['cate']) && !empty($_GET['cate']))
{
	$cate = $_GET['cate'];
}
$page_title = '관리자 : '.$cate.' 게시판';

include_once('../_init.php');
include_once($GP -> INC.'admindoc.head.php');
?>
<body>
	<div class='root'>
		<div class='root-in'>
			<div class='cols'>
				<?php include_once($GP -> INC.'gnb.php');?>
				<div class='col-2' id='body'>
					<?php include_once($GP -> INC.'content.head.php'); ?>
					<div class='content-row-group'>
						<div class='content-row'>
							<a href='<?php echo "write.php?cate=$cate";?>' class='btn write-link'>글쓰기</a>
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
											$str.='<td><input type="checkbox" name="idx[]" value="'.$row['idx'].'"></td>';
											$str.='<td>'.$row['idx'].'</td>';
											$str.='<td class="item-tit tal"><a href="view.php?idx='.$row['idx'].'&cate='.$cate.'&page='.$page.'">'.$row[$cate.'_tit'].'</td>';
											$str.='<td>관리자</td>';
											$str.='<td>'.$row[$cate.'_date'].'</td>';
											$str.='<td>'.$row['read_cnt'].'</td>';
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
							<a href='<?php echo "write.php?cate=$cate"; ?>' class='btn write-link'>글쓰기</a>
							<?php 
							if(isset($idx) && !empty($idx))
							{
								echo "<button onclick='remove.php?idx=$idx&cate=$cate&page=$page' role='button' class='btn btn-remove'>삭제</button>";
							}
							else
							{
								echo "<button onclick='remove.php?cate=$cate&page=$page' role='button' class='btn btn-remove'>삭제</button>";
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>