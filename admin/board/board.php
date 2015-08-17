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
							<a href="<?php echo 'write.php?cate='.$cate;?>" class='btn write-link'>글쓰기</a>
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

									$cur_page = ($page - 1) * LIST_NUM_FOR_PAGE;
									$cur_page_end = $cur_page + LIST_NUM_FOR_PAGE;
									for($i = $cur_page; $i < $cur_page_end; ++$i) 
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
								<a href='' class='prev10 btn-icon' title='10개 이전 페이지로'>10페이지 전으로</a>
								<a href='' class='prev btn-icon' title='이전 페이지로'>이전 페이지로</a>
								<?php
								$row_len = 0;
								if(mysqli_num_rows($res) > 0)
								{
									$row_len = mysqli_num_rows($res);
								}
								// $page_len = 5;
								$page_len = ceil($row_len / LIST_NUM_FOR_PAGE);
								// var_dump(round($row_len / 10));
								for($i = 1;$i <= $page_len;++$i)
								{
									echo '<a href="'.$GP -> WEBROOT.'board/board.php?cate='.$cate.'&page='.$i.'" class="'.(($page!=$i)? '':'current').'">'.$i.'</a>';
								}
								?>
								<a href='' class='next btn-icon' title='다음 목록 페이지로'>다음 페이지로</a>
								<a href='' class='next10 btn-icon' title='10개 다음 페이지로'>다음 10페이지</a>
							</div>
							<a href="<?php echo 'write.php?cate=$cate'; ?>" class='btn write-link'>글쓰기</a>
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