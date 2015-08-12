<?php
if(isset($_GET['cate']) && !empty($_GET['cate']))
{
	$cate = $_GET['cate'];
}
$page_title = '관리자 : '.$cate.' 게시판';

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
						<h2><?php echo strtoupper($cate);?> 게시판</h2>
						<p>해당 관리자 페이지의 메인 관리자는 <span>adasone@hanyang.co.kr</span>입니다</p>
					</div>
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

								$qry = "SELECT * FROM $cate ORDER BY `idx` DESC";
								$res = mysqli_query($dbc, $qry) or die('<p>Invalid Query '.mysqli_errno($dbc).' : '.mysqli_error($dbc).'</p>');
								$str = '';
								$row_tit = $cate.'_tit';
								while($row = mysqli_fetch_assoc($res))
								{
									$str.='<tr>';
									$str.='<td><input type="checkbox" name="dels[]" value="'.$row['idx'].'"></td>';
									$str.='<td>'.$row['idx'].'</td>';
									$str.='<td class="item-tit tal"><a href="view.php?idx='.$row['idx'].'&cate='.$cate.'">'.$row[$cate.'_tit'].'</td>';
									$str.='<td>관리자</td>';
									$str.='<td>'.$row[$cate.'_date'].'</td>';
									$str.='<td>'.$row['read_cnt'].'</td>';
									$str.='</tr>';
								}
								echo $str;
								?>
							</tbody>
						</table>
						<div class='pagination'>
							<a href='' class='prev10 btn-icon' title='10개 이전 페이지로'>10페이지 전으로</a>
							<a href='' class='prev btn-icon' title='이전 페이지로'>이전 페이지로</a>
							<?php
							if(mysqli_data_seek($res, 0))
							{
								while($row = mysqli_fetch_assoc($res))
								{
									echo '<a href="board.php?page_num='.$row['idx'].'">'.$row['idx'].'</a>';
								}
								
							}
							// <a href='' class='current'>1</a>
							// <a href=''>2</a>
							// <a href=''>3</a>
							// <a href=''>4</a>
							// <a href=''>5</a>
							// <a href=''>6</a>
							// <a href=''>7</a>
							// <a href=''>8</a>
							// <a href=''>9</a>
							?>
							<a href='' class='next btn-icon' title='다음 목록 페이지로'>다음 페이지로</a>
							<a href='' class='next10 btn-icon' title='10개 다음 페이지로'>다음 10페이지</a>
						</div>
						<a href="<?php echo 'write.php?cate='.$cate; ?>" class='btn write-link'>글쓰기</a>
						<button type='button' class='btn btn-remove'>삭제</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>